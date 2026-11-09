{{-- ====================================================================== --}}
{{-- HALAMAN REGISTRASI (SISTEM INVENTORY PT REAL INDONESIA SATU)           --}}
{{-- File ini menampilkan formulir pendaftaran akun baru untuk Admin / Staf. --}}
{{-- ====================================================================== --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul yang tampil di tab browser --}}
    <title>Register - Real Indonesia Satu</title>

    {{-- Ikon kecil di tab browser (Favicon) --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    {{-- Pengaturan huruf/font dari Google Fonts (Jost & Roboto) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    {{-- Memanggil file desain (CSS Tailwind) dan interaktivitas (JavaScript) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="relative flex min-h-screen items-center justify-center overflow-x-hidden bg-[linear-gradient(90deg,#ffffff_0%,#dcefee_40%,#c3e5e5_100%)] px-4 py-10 font-roboto text-slate-800 antialiased">

    {{-- ================================================================== --}}
    {{-- 1. GAMBAR LATAR BELAKANG GUNUNG (SAMA DENGAN HALAMAN LOGIN)        --}}
    {{-- ================================================================== --}}
    <div class="pointer-events-none absolute inset-0 bg-cover bg-bottom bg-no-repeat opacity-80"
        style="background-image: url('{{ asset('images/hero-mountains.svg') }}')">
    </div>

    {{-- ================================================================== --}}
    {{-- 2. KOTAK KARTU FORMULIR REGISTRASI DI TENGAH LAYAR                 --}}
    {{-- ================================================================== --}}
    <div
        class="relative z-10 w-full max-w-md rounded-2xl border border-white/60 bg-white/95 p-8 shadow-xl backdrop-blur-sm sm:p-10">

        {{-- Bagian Atas Kartu: Logo & Judul Halaman Registrasi --}}
        <div class="flex flex-col items-center text-center">
            <a href="{{ route('company.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PT Real Indonesia Satu"
                    class="h-20 w-auto object-contain">
            </a>

            <h1 class="mt-4 font-jost text-2xl font-semibold uppercase tracking-[0.15em] text-[#2f5d1e]">
                Registrasi Akun
            </h1>

            <p class="mt-1 text-[13px] text-slate-500 tracking-[0.02em]">
                Sistem Inventory Barang Real Indonesia Satu
            </p>
        </div>

        {{-- ============================================================== --}}
        {{-- 3. FORMULIR ISIAN PENDAFTARAN PENGGUNA BARU                    --}}
        {{-- ============================================================== --}}
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
            class="mt-7 space-y-4 text-[14px]">
            @csrf

            {{-- Kolom Isian: Nama Lengkap --}}
            <div>
                <label for="name" class="block font-medium text-slate-700">
                    Nama Lengkap <span class="text-red-600">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    placeholder="Masukkan nama lengkap"
                    class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                @error('name')
                    <p class="mt-1 text-[13px] text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kolom Isian: Email --}}
            <div>
                <label for="email" class="block font-medium text-slate-700">
                    Email <span class="text-red-600">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    placeholder="Masukkan email staf / admin"
                    class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                @error('email')
                    <p class="mt-1 text-[13px] text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kolom Isian: Password (Kata Sandi) --}}
            <div>
                <label for="password" class="block font-medium text-slate-700">
                    Password <span class="text-red-600">*</span>
                </label>
                <div class="relative mt-1.5">
                    <input type="password" id="password" name="password" required minlength="8"
                        placeholder="Min. 8 karakter (huruf kapital & simbol)"
                        class="w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 pr-10 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                    @error('password')
                        <p class="mt-1 text-[13px] text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Tombol Daftar (Register) --}}
            <div class="pt-2">
                <button type="submit"
                    class="w-full cursor-pointer rounded-lg bg-[#6a9f3a] py-2.5 font-jost text-[15px] font-medium uppercase tracking-[0.15em] text-white transition hover:bg-[#587f30]">
                    Daftar Sekarang
                </button>
            </div>

            {{-- Tautan ke Halaman Login --}}
            <p class="pt-1 text-center text-[13px] text-slate-600">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="font-medium text-[#2f5d1e] hover:text-[#6a9f3a] hover:underline">
                    Login di sini
                </a>
            </p>
        </form>
    </div>
</body>

</html>
