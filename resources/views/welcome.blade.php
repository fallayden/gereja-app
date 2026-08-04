<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Situs Gereja Solid</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-800 flex items-center justify-center min-h-screen">
        <div class="text-center p-8 bg-white rounded-xl shadow-lg max-w-lg border border-gray-100">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">Selamat Datang</h1>
            <p class="text-lg text-gray-600 mb-6">
                Situs web gereja sedang dalam tahap pengembangan. Fondasi Laravel, Tailwind CSS, dan Filament telah berhasil dipasang!
            </p>
            <div class="inline-block px-6 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700 transition">
                Sukses Diinisialisasi
            </div>
            
            <div class="mt-8 pt-4 border-t border-gray-100">
                <a href="/admin" class="text-sm text-blue-500 hover:underline">Masuk ke Dashboard Admin &rarr;</a>
            </div>
        </div>
    </body>
</html>
