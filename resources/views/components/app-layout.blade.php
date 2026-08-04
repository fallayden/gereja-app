@props(['title' => 'GBIA GRAMMATA'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website profil dan portal jemaat GBIA GRAMMATA">
    <title>{{ $title }} — Website Gereja</title>

    <!-- Google Fonts: Merriweather (serif) & Inter (sans-serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body bg-neutral text-slate-800 antialiased min-h-screen flex flex-col justify-between">

    <x-navbar />

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>
