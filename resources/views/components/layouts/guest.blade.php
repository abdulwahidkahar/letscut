<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Guest Page' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900">

{{-- Konten utama komponen Livewire akan dirender di sini --}}
<main class="min-h-screen flex flex-col items-center justify-center">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
