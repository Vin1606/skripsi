{{-- ====================================================================== --}}
{{-- HALAMAN LOGIN (SISTEM INVENTORY PT REAL INDONESIA SATU)                --}}
{{-- File ini menampilkan formulir masuk (Login) untuk Admin / Staf.        --}}
{{-- ====================================================================== --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-header title="Login - Real Indonesia Satu" />

<body
    class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10 font-roboto text-slate-800 antialiased"
    style="background: linear-gradient(90deg, #ffffff 0%, #f0f0f0 40%, rgb(236, 236, 236) 100%);">

    {{-- ================================================================== --}}
    {{-- 1. GAMBAR LATAR BELAKANG GUNUNG (SAMA DENGAN HALAMAN UTAMA)        --}}
    {{-- ================================================================== --}}
    <div class="pointer-events-none absolute inset-0 bg-cover bg-bottom bg-no-repeat opacity-80"
        style="background-image: url('{{ asset('images/hero-mountains.svg') }}')">
    </div>

    {{-- ================================================================== --}}
    {{-- 2. KOTAK KARTU FORMULIR LOGIN DI TENGAH LAYAR                      --}}
    {{-- ================================================================== --}}
    <div
        class="relative z-10 w-full max-w-md rounded-2xl border border-white/60 bg-white/95 p-8 shadow-xl backdrop-blur-sm sm:p-10">

        {{-- Bagian Atas Kartu: Logo & Judul Halaman Login --}}
        <div class="flex flex-col items-center text-center">
            <a href="{{ route('company.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PT Real Indonesia Satu"
                    class="h-20 w-auto object-contain">
            </a>

            <h1 class="mt-4 font-jost text-2xl font-semibold uppercase tracking-[0.15em] text-[#2f5d1e]">
                Portal Login
            </h1>

            <p class="mt-1 text-[13px] tracking-[0.02em] text-slate-500">
                Sistem Inventory Barang Real Indonesia Satu
            </p>
        </div>

        {{-- Pesan Sukses Setelah Registrasi Berhasil --}}
        @if (session('success'))
            <div class="mt-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-[13px] text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan Peringatan Jika Login Gagal (Jika Nanti Dihubungkan ke Database) --}}
        @if ($errors->any())
            <div class="mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-[13px] text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- ============================================================== --}}
        {{-- 3. FORMULIR ISIAN EMAIL & PASSWORD                             --}}
        {{-- ============================================================== --}}
        <form action="{{ route('login') }}" method="POST" class="mt-7 space-y-5 text-[14px]">
            @csrf

            {{-- Kolom Isian: Email / Username --}}
            <div>
                <label for="email" class="block font-medium text-slate-700">
                    Email <span class="text-red-600">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="Masukkan email staf / admin"
                    class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
            </div>

            {{-- Kolom Isian: Password (Kata Sandi) --}}
            <div>
                <label for="password" class="block font-medium text-slate-700">
                    Password <span class="text-red-600">*</span>
                </label>
                <div class="relative mt-1.5">
                    <input type="password" id="password" name="password" required placeholder="Masukkan password"
                        class="w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 pr-10 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                </div>
            </div>

            {{-- Baris Centang "Ingat Saya" --}}
            <div class="flex items-center justify-between text-[13px]">
                <label class="flex cursor-pointer items-center gap-2 text-slate-600">
                    <input type="checkbox" name="remember"
                        class="h-4 w-4 rounded border-neutral-300 text-[#6a9f3a] focus:ring-[#6a9f3a]">
                    <span>Ingat Saya</span>
                </label>
            </div>

            {{-- Tombol Masuk (Login) --}}
            <div class="pt-1">
                <button type="submit"
                    class="w-full cursor-pointer rounded-lg bg-[#6a9f3a] py-2.5 font-jost text-[15px] font-medium uppercase tracking-[0.15em] text-white transition hover:bg-[#587f30]">
                    Login
                </button>
            </div>

            {{-- Tautan ke Halaman Register --}}
            <p class="pt-1 text-center text-[13px] text-slate-600">
                Belum memiliki akun?
                <a href="{{ route('register') }}"
                    class="font-medium text-[#2f5d1e] hover:text-[#6a9f3a] hover:underline">
                    Daftar di sini
                </a>
            </p>
        </form>
    </div>
</body>

</html>
