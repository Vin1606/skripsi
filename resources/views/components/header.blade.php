{{-- ====================================================================== --}}
{{-- BAGIAN KEPALA WEBSITE (HEAD)                                           --}}
{{-- File ini mewakili seluruh isi <head> pada halaman web:                 --}}
{{-- meta tag, judul tab browser (title), ikon (favicon), font, dan CSS/JS. --}}
{{-- ====================================================================== --}}

@props(['title' => 'Real Indonesia Satu'])

<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul yang tampil di tab browser --}}
    <title>{{ $title }}</title>

    {{-- Ikon kecil di tab browser (Favicon) - file ada di public/images/logo.png --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    {{-- Pengaturan huruf/font dari Google Fonts (Jost untuk judul, Roboto untuk teks biasa) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    {{-- Memanggil file desain (CSS Tailwind) dan interaktivitas (JavaScript) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</header>
