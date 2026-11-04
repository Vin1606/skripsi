{{-- ====================================================================== --}}
{{-- KERANGKA UTAMA HALAMAN (LAYOUT)                                        --}}
{{-- File ini mengatur bagian kepala website (font, judul tab, ikon)        --}}
{{-- serta membungkus Menu Atas (Navbar), Isi Halaman, dan Kaki (Footer).   --}}
{{-- ====================================================================== --}}

{{-- Judul bawaan pada tab browser jika halaman tidak mengirim judul khusus --}}
@props(['title' => 'Real Indonesia Satu'])

<!DOCTYPE html>
{{-- Class "scroll-smooth" membuat halaman bergeser halus otomatis (murni CSS tanpa JavaScript) --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul yang tampil di tab browser --}}
    <title>{{ $title }}</title>

    {{-- Ikon kecil di tab browser (Favicon) - file ada di public/images/logo.png --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    {{-- Pengaturan huruf/font dari Google Fonts (Jost untuk judul, Roboto untuk teks biasa) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    {{-- Memanggil file desain (CSS Tailwind) dan interaktivitas (JavaScript) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative flex min-h-screen flex-col bg-white font-roboto text-slate-800 antialiased">

    {{-- 1. Menu Navigasi Atas (file: resources/views/components/navbar.blade.php) --}}
    <x-navbar />

    {{-- 2. Isi Utama Halaman (otomatis diisi oleh konten dari halaman seperti index.blade.php) --}}
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- 3. Bagian Paling Bawah / Hak Cipta (file: resources/views/components/footer.blade.php) --}}
    <x-footer />

</body>

</html>
