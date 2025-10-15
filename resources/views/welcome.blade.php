<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Classic Barber - Barbershop Terbaik di Sukabumi</title>

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.ico" sizes="any">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tailwind Custom Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Anton', 'sans-serif'],
                        display: ['Anton', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <style>
        /* Hero Background */
        .hero-bg {
            background-image: url('/images/hero.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-zinc-50 text-neutral-800 antialiased font-sans">

{{-- Navbar --}}
<nav class="sticky top-0 w-full bg-black backdrop-blur-md text-white z-50 shadow-lg">
    <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-6">
        <h1 class="text-3xl font-display tracking-wide">LETSCUT</h1>
        <ul class="hidden md:flex items-center gap-8 text-sm uppercase tracking-wider">
            <li><a href="#home" class="hover:text-yellow-400 transition-colors">Beranda</a></li>
            <li><a href="#services" class="hover:text-yellow-400 transition-colors">Layanan</a></li>
            <li><a href="#team" class="hover:text-yellow-400 transition-colors">Tim Kami</a></li>
            <li><a href="#contact" class="hover:text-yellow-400 transition-colors">Kontak</a></li>
        </ul>
        <a href="/bookings" class="bg-yellow-500 hover:bg-yellow-600 text-black px-5 py-2 rounded-lg font-medium transition-all shadow-md">
            Booking
        </a>
    </div>
</nav>

{{-- Hero Section --}}
<section id="home" class="hero-bg min-h-screen flex items-center justify-center relative text-white">
    <div class="bg-black/60 absolute inset-0"></div>
    <div class="relative z-10 text-center px-6">
        <h2 class="text-5xl md:text-7xl font-display mb-4 leading-tight uppercase">Potongan Rambut Klasik, <br> Gaya Modern</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">
            Dapatkan pengalaman grooming terbaik di tempat <br>yang mengutamakan gaya, ketelitian, dan kenyamanan.
        </p>
        <a href="/bookings" class="bg-yellow-500 hover:bg-yellow-600 text-black px-8 py-3 rounded-lg text-lg font-medium transition-all shadow-lg">
            Booking Antrian
        </a>
    </div>
</section>

{{-- Services Section --}}
<section id="services" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h3 class="text-4xl font-display mb-2 uppercase">Layanan Kami</h3>
        <p class="text-neutral-500 mb-12">Kualitas dan kepuasan adalah prioritas utama kami.</p>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="group bg-zinc-50 p-6 border rounded-xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://placehold.co/600x400/000/FFF/png?text=Haircut" alt="Haircut" class="rounded-lg mb-4 w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105" />
                <h4 class="font-display text-xl mb-2 uppercase">Classic Haircut</h4>
                <p class="text-neutral-600 text-sm">Potongan klasik dengan detail rapi dan profesional.</p>
            </div>
            <div class="group bg-zinc-50 p-6 border rounded-xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://placehold.co/600x400/000/FFF/png?text=Shave" alt="Shaving" class="rounded-lg mb-4 w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105" />
                <h4 class="font-display text-xl mb-2 uppercase">Hot Towel Shave</h4>
                <p class="text-neutral-600 text-sm">Rasakan sensasi bercukur dengan handuk panas dan pisau cukur tradisional.</p>
            </div>
            <div class="group bg-zinc-50 p-6 border rounded-xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://placehold.co/600x400/000/FFF/png?text=Beard+Trim" alt="Beard Trim" class="rounded-lg mb-4 w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105" />
                <h4 class="font-display text-xl mb-2 uppercase">Beard Trim</h4>
                <p class="text-neutral-600 text-sm">Rapikan janggutmu agar tampil maskulin dan terawat.</p>
            </div>
        </div>
    </div>
</section>

{{-- Team Section --}}
<section id="team" class="py-20 bg-zinc-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h3 class="text-4xl font-display mb-2 uppercase">Tim Profesional Kami</h3>
        <p class="text-neutral-500 mb-12">Bertemu dengan para ahli di bidangnya.</p>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <img src="/images/team-1.png" alt="Barber A" class="rounded-full mb-4 w-40 h-40 object-cover mx-auto shadow-lg" />
                <h4 class="font-display text-xl mb-1 uppercase">Tuan Barber</h4>
                <p class="text-yellow-600 text-sm">Spesialis Rambut Klasik</p>
            </div>
            <div class="text-center">
                <img src="https://placehold.co/400x400/000/FFF/png?text=Barber+2" alt="Barber B" class="rounded-full mb-4 w-40 h-40 object-cover mx-auto shadow-lg" />
                <h4 class="font-display text-xl mb-1 uppercase">Ujang a.k.a Kang Ujang</h4>
                <p class="text-yellow-600 text-sm">Ahli Cukur & Janggut</p>
            </div>
            <div class="text-center">
                <img src="https://placehold.co/400x400/000/FFF/png?text=Barber+3" alt="Barber C" class="rounded-full mb-4 w-40 h-40 object-cover mx-auto shadow-lg" />
                <h4 class="font-display text-xl mb-1 uppercase">Deden a.k.a Wa Deden</h4>
                <p class="text-yellow-600 text-sm">Gaya Modern & Kreatif</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA Booking --}}
<section id="contact" class="py-20 bg-yellow-500 text-black text-center flex flex-col items-center justify-center">
    <h3 class="text-4xl font-display mb-4 uppercase">Siap Untuk Tampilan Baru?</h3>
    <p class="mb-8 max-w-md">
        Booking jadwalmu sekarang dan rasakan pengalaman barbershop terbaik di kota!
    </p>
    <a href="/bookings" class="bg-black hover:bg-neutral-800 text-white px-8 py-3 rounded-lg text-lg font-medium transition-all shadow-lg">
        Lihat Jadwal & Booking
    </a>
</section>

{{-- Footer --}}
<footer class="bg-black text-neutral-400 text-center py-8">
    <p class="text-sm">© {{ date('Y') }} LETSCUT Barber. 2025 <strong>Takalar</strong>.</p>
</footer>

</body>
</html>
