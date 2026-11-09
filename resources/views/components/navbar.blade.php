{{-- ====================================================================== --}}
{{-- MENU NAVIGASI ATAS (NAVBAR)                                            --}}
{{-- Mengatur logo di sebelah kiri dan daftar menu di sebelah kanan.        --}}
{{-- Saat menu diklik, halaman otomatis bergeser ke bagian tujuan.          --}}
{{-- ====================================================================== --}}

@php
    // Daftar menu navigasi di pojok kanan atas:
    // - 'label'  : Teks menu yang muncul di layar
    // - 'href'   : Tujuan bagian halaman saat menu diklik (harus sesuai dengan id="..." di halaman)
    //              #beranda      -> Bagian paling atas (Header)
    //              #layanan      -> Bagian Our Services
    //              #tentang-kami -> Bagian About Us
    //              #kontak       -> Bagian Form Kontak & Talk To Us
    // - 'active' : Ubah ke true jika ingin teks menu berwarna hijau, false jika biru tua
    $links = [
        ['label' => 'User', 'href' => '#user', 'active' => true],
        // ['label' => 'Services', 'href' => '#layanan', 'active' => false],
        // ['label' => 'About', 'href' => '#tentang-kami', 'active' => false],
        // ['label' => 'Contact', 'href' => '#kontak', 'active' => false],
    ];
@endphp

{{-- Baris navigasi transparan yang menempel di bagian paling atas banner utama --}}
<nav class="absolute inset-x-0 top-0 z-50">
    <div class="mx-auto flex max-w-300 items-center justify-between px-10 pt-10">

        {{-- Bagian Kiri: Logo Perusahaan (file gambar ada di public/images/logo.png) --}}
        <a href="#user" class="block">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Real Indonesia Satu') }}"
                class="h-20 w-20 object-contain">
        </a>

        {{-- Bagian Kanan: Daftar Tombol Menu --}}
        <ul class="flex items-center gap-5 text-[16px] font-medium uppercase tracking-wide">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['href'] }}"
                        class="transition hover:text-[#6a9a2e] {{ $link['active'] ? 'text-[#6a9a2e]' : 'text-[#1e2a4a]' }}">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
</nav>
