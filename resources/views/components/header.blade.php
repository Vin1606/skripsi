{{-- ====================================================================== --}}
{{-- BANNER UTAMA HALAMAN DEPAN (HEADER / HERO)                             --}}
{{-- Bagian paling atas halaman yang menampilkan gambar gunung & judul besar --}}
{{-- ====================================================================== --}}

{{-- Teks bawaan banner utama (bisa langsung diubah di sini) --}}
@props([
    'title' => 'Real Indonesia Satu', // Judul utama ukuran besar
    'subtitle' => 'Your Professional Pest Control Services', // Subjudul di bawah judul utama
    'buttonText' => 'Contact Us', // Teks pada tombol kontak
    'buttonHref' => '#kontak', // Tujuan saat tombol Contact Us diklik
    'loginText' => 'Login', // Teks pada tombol Login di samping Contact Us
])

<header id="beranda"
    class="relative min-h-screen overflow-hidden bg-[linear-gradient(90deg,#ffffff_0%,#dcefee_40%,#c3e5e5_100%)]">

    {{-- Gambar Latar Belakang: Ilustrasi gunung, danau, hutan, dan awan --}}
    {{-- Ganti file di folder public/images/hero-mountains.svg jika ingin mengubah gambar latar --}}
    <div class="absolute inset-0 bg-cover bg-bottom bg-no-repeat"
        style="background-image: url('{{ asset('images/hero-mountains.svg') }}')">
    </div>

    {{-- Kotak Teks & Tombol di Tengah Banner --}}
    <div class="relative z-10 flex flex-col items-center px-6 pt-[32vh] text-center">

        {{-- Judul Besar Perusahaan --}}
        <h1 class="font-jost text-[30px] font-medium uppercase tracking-[0.3em] text-[#057020]">
            {{ $title }}
        </h1>

        {{-- Subjudul / Slogan Perusahaan --}}
        <p class="mt-1 font-jost text-[18px] uppercase tracking-[0.3em] text-[#000000]">
            {{ $subtitle }}
        </p>

        {{-- Baris Tombol Berdampingan: "Contact Us" (Kiri) dan "Login" (Kanan) --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">

            {{-- 1. Tombol Contact Us (mengarah ke bagian Kontak di bawah) --}}
            <a href="{{ $buttonHref }}"
                class="bg-[#6a9f3a] px-8 py-2 text-[17px] font-small uppercase tracking-[0.15em] text-white transition hover:bg-[#587f30]">
                {{ $buttonText }}
            </a>
        </div>

    </div>
</header>
