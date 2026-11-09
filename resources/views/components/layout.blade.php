{{-- ====================================================================== --}}
{{-- KERANGKA UTAMA HALAMAN (LAYOUT)                                        --}}
{{-- Menggunakan sistem "Locked App Shell" (h-screen overflow-hidden):      --}}
{{--   - <x-navbar> (Kop Perusahaan) diam/tetap di atas (tidak ikut scroll) --}}
{{--   - <x-sidebar> (Menu Samping) diam/tetap di kiri (tidak ikut scroll)  --}}
{{--   - Hanya area <main> (isi halaman) di sebelah kanan yang bisa scroll. --}}
{{-- ====================================================================== --}}

@props([
    'title' => 'Real Indonesia Satu',
    'scrollable' => true,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- 1. Bagian Kepala HTML (<head>) (file: resources/views/components/header.blade.php) --}}
<x-header :title="$title" />

<body class="flex h-screen flex-col overflow-hidden bg-slate-50 font-roboto text-slate-800 antialiased">

    {{-- 2. Kop Perusahaan / Navbar Atas — Tetap/Diam di Atas --}}
    <x-navbar />

    {{-- 3. Pembungkus Bawah: Sidebar Tetap di Kiri + Area Konten di Kanan --}}
    <div class="relative flex min-h-0 flex-1 overflow-hidden">

        {{-- Menu Samping / Sidebar — Tetap/Diam di Kiri --}}
        <x-sidebar />

        {{-- Area Konten Utama --}}
        <div id="beranda"
            class="flex min-w-0 flex-1 flex-col {{ $scrollable ? 'overflow-y-auto scroll-smooth' : 'overflow-hidden' }}">
            <main class="flex min-h-0 flex-1 flex-col">
                {{ $slot }}
            </main>

            {{-- 4. Bagian Paling Bawah / Hak Cipta --}}
            <x-footer />
        </div>

    </div>

</body>

</html>
