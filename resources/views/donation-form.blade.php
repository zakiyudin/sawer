{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    @vite('resources/css/app.css', 'resources/js/app.js')
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
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2"
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
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi - Mirip Saweria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-500 to-purple-600">

    <div class="w-full max-w-lg bg-white p-6 rounded-2xl shadow-xl">
        <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Dukung Kreator</h2>

        <!-- Avatar & Nama Kreator -->
        <div class="text-center mb-4">
            <img src="https://via.placeholder.com/80" alt="Avatar" class="w-20 h-20 mx-auto rounded-full border-4 border-indigo-500">
            <p class="text-gray-700 font-medium mt-2">Zaki Kamil</p>
        </div>

        <form action="#" method="POST" class="space-y-4">
            <!-- Input Nama -->
            <div>
                <label class="block text-gray-700 font-medium">Nama</label>
                <input type="text" placeholder="Nama Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400">
            </div>

            <!-- Input Email -->
            <div>
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" placeholder="Email Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400">
            </div>

            <!-- Pilihan Nominal Donasi -->
            <div>
                <label class="block text-gray-700 font-medium">Nominal Donasi</label>
                <div class="grid grid-cols-3 gap-2">
                    <button type="button" class="bg-gray-200 text-gray-700 p-3 rounded-lg hover:bg-indigo-500 hover:text-white transition">10K</button>
                    <button type="button" class="bg-gray-200 text-gray-700 p-3 rounded-lg hover:bg-indigo-500 hover:text-white transition">25K</button>
                    <button type="button" class="bg-gray-200 text-gray-700 p-3 rounded-lg hover:bg-indigo-500 hover:text-white transition">50K</button>
                </div>
                <input type="number" placeholder="Atau masukkan jumlah" class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400">
            </div>

            <!-- Input Pesan -->
            <div>
                <label class="block text-gray-700 font-medium">Pesan (Opsional)</label>
                <textarea placeholder="Tambahkan pesan..." class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400"></textarea>
            </div>

            <!-- Tombol Donasi -->
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                Dukung Sekarang 🚀
            </button>
        </form>
    </div>

</body>
</html>

