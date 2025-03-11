<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sawer</title>

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body class="font-sans antialiased">
    <div class="bg-gray-100">
        <div class="flex justify-center items-center h-screen w-full flex-col space-y-4 gap-3">
            <h1>Terima kasih atas donasi anda</h1>
            <p>Donasi untuk {{ $donation->user->username }} telah berhasil.</p>
            <a href="{{ url('/') }}"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs
                hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
            >Kembali ke beranda</a>
        </div>
    </div>
</body>
</html>