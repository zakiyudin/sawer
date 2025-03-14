<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\InvoiceItem;

class DonationController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }

    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('donation-form', compact('user'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $donation = Donation::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $request->amount,
                'message' => $request->message
            ]);

            $invoiceItems = new InvoiceItem([
                'name' => 'Donation',
                'price' => $request->amount,
                'quantity' => 1
            ]);

            $createInvoice = new CreateInvoiceRequest([
                'external_id' => 'donation-' . $request->id,
                'payer_email' => $request->email,
                'amount' => $request->amount,
                'items' => [$invoiceItems],
                'invoice_duration' => 24,
                'success_redirect_url' => route('donation.success', ['id' => $donation->id])
            ]);

            $api = new InvoiceApi();
            $generateInvoice = $api->createInvoice($createInvoice);

            $payment = Payment::create([
                'donation_id' => $donation->id,
                'payment_id' => $generateInvoice['id'],
                'payment_method' => 'Xendit',
                'status' => 'pending',
                'payment_url' => $generateInvoice['invoice_url'],
            ]);

            DB::commit();

            return redirect($payment->payment_url);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'failed to create donation');
        }
    }

    public function callbackXendit(Request $request)
    {
        $getToken = $request->header('x-callback-token');
        $callbackToken = env('XENDIT_CALLBACK_TOKEN');

        if (!$callbackToken || $getToken !== $callbackToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $payment = Payment::where('payment_id', $request->id)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 400);
        }

        $payment->update([
            'status' => $request->status === 'PAID' ? 'completed' : 'failed'
        ]);

        if ($request->status === 'PAID') {
            $donation = Donation::find($payment->donation_id);
            $donation->update([
                'status' => 'completed'
            ]);
        }

        return response()->json(['message' => 'Payment updated']);
    }

    public function success($id)
    {
        $donation = Donation::find($id);
        return view('success', compact('donation'));
    }
}
