<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Guest Page' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-50 text-gray-900">

{{-- Konten utama komponen Livewire akan dirender di sini --}}
<main class="min-h-screen flex flex-col items-center justify-center bg-black">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
