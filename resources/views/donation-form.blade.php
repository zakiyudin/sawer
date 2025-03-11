<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">
    <div class="bg-gray-100">
        <div class="flex justify-center items-center w-full">
            <form action="{{ route('donation.store') }}" method="POST" class="w-full max-w-2xl">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="flex justify-between items-center gap-x-6">
                            <div class="mt-10">
                                <h2 class="text-base/7 font-semibold text-gray-900">
                                    Kamu akan mengirimkan dukungan pada {{ $user->username }}
                                </h2>
                                <p class="mt-1 text-sm/6 text-gray-600">
                                    Silahkan lengkapi data dibawah ini!
                                </p>
                            </div>

                            @guest
                                <a href="{{ route('login') }}"
                                    class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg shadow-md hover:bg-indigo-700 transition"
                                >Login</a>
                            @endguest
                        </div>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-full">
                                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" required
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900
                                            outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400
                                            focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            value="{{ Auth::check() ? Auth::user()->name : old('name') }}"
                                            @if (Auth::check())
                                                readonly
                                            @endif
                                        >
                                    </div>
                                </div>

                                <div class="sm:col-span-full">
                                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                                    <div class="mt-2">
                                        <input type="email" name="email" id="email" required
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900
                                            outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400
                                            focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
                                            @if (Auth::check())
                                                readonly
                                            @endif
                                        >
                                    </div>
                                </div>

                                <div class="sm:col-span-full">
                                    <label for="amount" class="block text-sm/6 font-medium text-gray-900">Nominal</label>
                                    <div class="mt-2">
                                        <input type="number" name="amount" id="amount" required
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900
                                            outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400
                                            focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        >
                                    </div>
                                </div>

                                <div class="sm:col-span-full">
                                    <label for="amount" class="block text-sm/6 font-medium text-gray-900">Pesan</label>
                                    <div class="mt-2">
                                        <textarea type="text" name="message" id="message" required
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900
                                            outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400
                                            focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mt-1 flex items-center justify-end gap-x-6">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2"    
                                >
                                Kirim
                                </button>
                            </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>
</html>
