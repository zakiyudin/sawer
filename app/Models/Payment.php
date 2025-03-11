<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'donation_id',
        'payment_id',
        'payment_method',
        'status',
        'payment_url'
    ];


    /**
     * Get the user that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function donation(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
