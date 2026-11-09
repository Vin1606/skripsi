{{-- ====================================================================== --}}
{{-- HALAMAN UTAMA PROFIL PERUSAHAAN (COMPANY PROFILE)                      --}}
{{-- File ini berisi seluruh bagian konten halaman depan:                   --}}
{{--   1. Banner Utama (Header)                                             --}}
{{--   2. Bagian Tentang Kami (About Us)                                    --}}
{{--   3. Bagian Layanan Kami (Our Services + Slider Foto)                  --}}
{{--   4. Bagian Informasi Jenis Hama (Daftar 6 Hama)                       --}}
{{--   5. Bagian Banner Ajakan Menghubungi (Let's Connect)                  --}}
{{--   6. Bagian Kontak, Sosial Media & Peta Lokasi (Contact & Maps)        --}}
{{--                                                                        --}}
{{-- CATATAN POSISI:                                                        --}}
{{-- Setiap bagian memakai "min-h-screen flex flex-col justify-center"      --}}
{{-- agar tinggi tiap bagian memenuhi 1 layar penuh dan isinya berada       --}}
{{-- tepat di tengah layar tanpa tercampur dengan bagian lain.              --}}
{{-- ====================================================================== --}}

<x-layout title="Home - Real Indonesia Satu">

    {{-- ================================================================== --}}
    {{-- BAGIAN 0: BANNER UTAMA ATAS (HERO BANNER)                          --}}
    {{-- ================================================================== --}}
    <section
        class="relative min-h-[80vh] overflow-hidden bg-[linear-gradient(90deg,#ffffff_0%,#dcefee_40%,#c3e5e5_100%)]">
        <div class="absolute inset-0 bg-cover bg-bottom bg-no-repeat"
            style="background-image: url('{{ asset('images/hero-mountains.svg') }}')">
        </div>

        <div class="relative z-10 flex flex-col items-center px-6 pt-[22vh] text-center">
            <h1 class="font-jost text-[30px] font-medium uppercase tracking-[0.3em] text-[#057020]">
                Real Indonesia Satu
            </h1>
            <p class="mt-1 font-jost text-[18px] uppercase tracking-[0.3em] text-[#000000]">
                Your Professional Pest Control Services
            </p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="#kontak"
                    class="bg-[#6a9f3a] px-8 py-2 text-[17px] uppercase tracking-[0.15em] text-white transition hover:bg-[#587f30]">
                    Contact Us
                </a>
            </div>
        </div>
    </section>


    {{-- ================================================================== --}}
    {{-- BAGIAN 1: TENTANG KAMI (ABOUT US)                                  --}}
    {{-- Berisi penjelasan profil perusahaan di kiri dan foto di kanan.     --}}
    {{-- Diposisikan penuh 1 layar (min-h-screen) & rata tengah vertikal.   --}}
    {{-- ================================================================== --}}
    <section id="tentang-kami" class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-6 py-16">
        <div class="grid items-center gap-12 md:grid-cols-2 lg:gap-16">

            {{-- Kolom Kiri: Teks Penjelasan Perusahaan --}}
            <div class="max-w-md">
                {{-- Judul Bagian --}}
                <h2 class="font-jost text-2xl font-semibold uppercase tracking-wide text-black sm:text-3xl">
                    About Us
                </h2>

                {{-- Paragraf Pertama --}}
                <p class="mt-5 text-[15px] leading-7 text-slate-600">
                    PT Real Indonesia Satu adalah perusahaan jasa pengendalian hama profesional yang berfokus melayani
                    wilayah Jabodetabek. Sebagai bagian dari Real Borneo Pest Control, kami mengadopsi standar
                    <strong class="font-semibold italic text-slate-700">Integrated Pest Management</strong> (IPM) atau
                    Pengendalian Hama Terpadu yang terbukti efektif sekaligus ramah lingkungan.
                </p>

                {{-- Paragraf Kedua --}}
                <p class="mt-6 text-[15px] leading-7 text-slate-600">
                    Real Indonesia Satu didukung oleh tenaga profesional yang sudah berpengalaman lebih dari 12 tahun di
                    Bisnis Pest &amp; Rodent Control. Juga didukung oleh tenaga-tenaga ahli Entomology dari IPB (Institut
                    Pertanian Bogor).
                </p>
            </div>

            {{-- Kolom Kanan: Foto Tentang Kami (file ada di public/images/about-us.png) --}}
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('images/about-us.png') }}"
                    alt="Teknisi PT Real Indonesia Satu melakukan fogging"
                    class="w-full max-w-md object-cover">
            </div>

        </div>
    </section>


    {{-- ================================================================== --}}
    {{-- BAGIAN 2: LAYANAN KAMI (OUR SERVICES)                              --}}
    {{-- Berisi daftar layanan di sebelah kiri dan slider gambar di kanan.  --}}
    {{-- Diposisikan penuh 1 layar (min-h-screen) & rata tengah vertikal.   --}}
    {{-- ================================================================== --}}
    @php
        // ------------------------------------------------------------------
        // DAFTAR LAYANAN (Kolom Kiri)
        // Cara mengubah: cukup ubah teks di dalam tanda kutip, atau tambahkan
        // baris baru dengan tanda kutip dan koma di akhir baris.
        // ------------------------------------------------------------------
        $services = [
            'Disinfection',
            'Pest Control (Flies, Mosquitoes Ants, Cochroaches)',
            'Rodent Control',
            'Termite Control',
            'Fumigation',
            'Cat, Chivat Cat & Dog Control',
            'Snake Control',
            'Bees and Wasp Control',
            'Scorpion Control',
            'Bird Control',
            'Avian Flu',
            'Bat Control',
            'Lizard & Gecko Control',
            'Spider Control',
            'Pig, Chicken Control',
        ];

        // ------------------------------------------------------------------
        // DAFTAR GAMBAR SLIDER LAYANAN (Kolom Kanan)
        // - 'src' : Lokasi file gambar di dalam folder public/images/
        // - 'alt' : Keterangan gambar
        // ------------------------------------------------------------------
        $serviceImages = [
            [
                'src' => asset('images/services.png'),
                'alt' => 'Layanan pengendalian hama PT Real Indonesia Satu - Fogging',
            ],
            [
                'src' => asset('images/services-2.png'),
                'alt' => 'Layanan pengendalian hama PT Real Indonesia Satu - Pest Control',
            ],
            [
                'src' => asset('images/services-3.png'),
                'alt' => 'Layanan pengendalian hama PT Real Indonesia Satu - Rodent Control',
            ],
        ];
    @endphp

    <section id="layanan" class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-6 py-12">
        {{-- Judul Bagian Layanan --}}
        <h2 class="text-center font-jost text-2xl font-semibold tracking-wide text-black sm:text-3xl">
            Our Services
        </h2>

        <div class="mt-8 grid items-start gap-12 md:grid-cols-2 lg:gap-16">

            {{-- Kolom Kiri: Tampilan Daftar Layanan dengan Ikon Panah Bulat --}}
            <ul class="space-y-2.5 text-[14px] text-slate-600">
                @foreach ($services as $service)
                    <li class="flex items-center gap-2.5">
                        {{-- Ikon panah kecil di sebelah kiri nama layanan --}}
                        <span class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-neutral-700 text-white">
                            <svg class="h-2.5 w-2.5" fill="none" stroke="currentColor" stroke-width="3"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                        {{-- Nama layanan --}}
                        <span>{{ $service }}</span>
                    </li>
                @endforeach
            </ul>

            {{-- Kolom Kanan: Slider Gambar Layanan --}}
            <div id="services-slider" class="flex flex-col items-center">
                <div class="relative w-full max-w-md overflow-hidden">

                    {{-- Barisan gambar yang bergeser ke kiri/kanan --}}
                    <div id="services-slider-track" class="flex items-start transition-transform duration-500 ease-in-out">
                        @foreach ($serviceImages as $image)
                            <img src="{{ $image['src'] }}"
                                alt="{{ $image['alt'] }}"
                                class="h-auto w-full shrink-0 select-none">
                        @endforeach
                    </div>

                    {{-- Tombol klik panah kiri & kanan (transparan di atas gambar panah bawaan foto) --}}
                    <button type="button" id="services-prev" aria-label="Gambar Sebelumnya"
                        class="absolute left-1 top-[82%] h-24 w-12 -translate-y-1/2 cursor-pointer rounded-full transition hover:bg-black/10">
                    </button>
                    <button type="button" id="services-next" aria-label="Gambar Berikutnya"
                        class="absolute right-1 top-[82%] h-24 w-12 -translate-y-1/2 cursor-pointer rounded-full transition hover:bg-black/10">
                    </button>
                </div>

                {{-- Titik-titik indikator urutan gambar di bawah slider --}}
                <div id="services-dots" class="mt-10 flex items-center justify-center gap-2.5">
                    @foreach ($serviceImages as $i => $image)
                        <button type="button" data-slide-to="{{ $i }}" aria-label="Pilih Gambar {{ $i + 1 }}"
                            class="h-1.5 w-1.5 cursor-pointer rounded-full transition-colors {{ $i === 0 ? 'bg-black' : 'bg-slate-300' }}">
                        </button>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Kode penggerak slider gambar (JavaScript) --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.getElementById('services-slider-track');
                const prevBtn = document.getElementById('services-prev');
                const nextBtn = document.getElementById('services-next');
                const dots = document.querySelectorAll('#services-dots [data-slide-to]');
                const totalSlides = dots.length;
                let currentIndex = 0;

                if (!track || totalSlides === 0) return;

                // Fungsi untuk menggeser gambar ke urutan tertentu
                function goToSlide(index) {
                    currentIndex = (index + totalSlides) % totalSlides;
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;

                    // Ubah warna titik indikator yang sedang aktif menjadi hitam
                    dots.forEach((dot, i) => {
                        dot.classList.toggle('bg-black', i === currentIndex);
                        dot.classList.toggle('bg-slate-300', i !== currentIndex);
                    });
                }

                // Saat tombol kiri atau kanan diklik
                prevBtn?.addEventListener('click', () => goToSlide(currentIndex - 1));
                nextBtn?.addEventListener('click', () => goToSlide(currentIndex + 1));

                // Saat titik indikator di bawah diklik
                dots.forEach((dot) => {
                    dot.addEventListener('click', () => {
                        goToSlide(Number(dot.dataset.slideTo));
                    });
                });
            });
        </script>
    </section>


    {{-- ================================================================== --}}
    {{-- BAGIAN 3: INFORMASI JENIS HAMA (DAFTAR 6 HAMA)                     --}}
    {{-- Menampilkan foto, nama hama, dan penjelasan singkat dalam 3 kolom. --}}
    {{-- Diposisikan penuh 1 layar (min-h-screen) & rata tengah vertikal.   --}}
    {{-- ================================================================== --}}
    @php
        // ------------------------------------------------------------------
        // DAFTAR JENIS HAMA
        // - 'image'       : Lokasi foto hama di folder public/images/
        // - 'title'       : Nama hama (judul kartu)
        // - 'description' : Penjelasan singkat bahaya hama tersebut
        // ------------------------------------------------------------------
        $pests = [
            [
                'image' => asset('images/pest-mosquito.png'),
                'title' => 'Mosquito (Aedes aegypti)',
                'description' =>
                    'Silent but deadly — mosquitoes are known carriers of serious diseases like Dengue Fever, Malaria, and Zika, making protection essential.',
            ],
            [
                'image' => asset('images/pest-housefly.png'),
                'title' => 'Housefly (Musca domestica)',
                'description' =>
                    'More than a nuisance — flies contaminate food and surfaces, spreading harmful bacteria that threaten hygiene and health.',
            ],
            [
                'image' => asset('images/pest-cockroach.png'),
                'title' => 'Cockroach (Periplaneta americana)',
                'description' =>
                    'Cockroaches thrive in hidden corners, carrying germs and allergens that compromise both cleanliness and comfort.',
            ],
            [
                'image' => asset('images/pest-rat.png'),
                'title' => 'Rat (Rattus norvegicus)',
                'description' =>
                    'Rats are destructive invaders, damaging property, contaminating food, and transmitting dangerous diseases.',
            ],
            [
                'image' => asset('images/pest-termite.png'),
                'title' => 'Termite (Coptotermes curvignathus)',
                'description' =>
                    'Often unseen until it’s too late, termites silently destroy wood structures and furniture, causing costly damage.',
            ],
            [
                'image' => asset('images/pest-ant.png'),
                'title' => 'Ant (Monomorium pharaonis)',
                'description' =>
                    'Ants may be small, but infestations disrupt homes and kitchens, contaminating food and creating discomfort.',
            ],
        ];
    @endphp

    <section id="jenis-hama" class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-6 py-16">
        {{-- Susunan 3 kolom untuk menampilkan kartu jenis hama --}}
        <div class="grid gap-x-8 gap-y-12 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($pests as $pest)
                <div>
                    {{-- Foto Hama --}}
                    <img src="{{ $pest['image'] }}" alt="{{ $pest['title'] }}" class="w-full object-cover">

                    {{-- Nama Hama --}}
                    <h3 class="mt-5 font-jost text-[17px] font-semibold text-black">
                        {{ $pest['title'] }}
                    </h3>

                    {{-- Penjelasan Bahaya Hama --}}
                    <p class="mt-2 text-[14px] leading-6 text-slate-600">
                        {{ $pest['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>


    {{-- ================================================================== --}}
    {{-- BAGIAN 4: BANNER AJAKAN MENGHUBUNGI (LET'S CONNECT)                --}}
    {{-- Bagian bergambar ilustrasi di tengah halaman sebelum form kontak.  --}}
    {{-- ================================================================== --}}
    <section id="hubungi-kami"
        class="relative w-full overflow-hidden bg-[#e9f4f5] bg-cover bg-bottom bg-no-repeat"
        style="background-image: url('{{ asset('images/connect-bg.png') }}')">

        <div class="relative z-10 mx-auto flex max-w-xl flex-col items-center px-6 pt-16 pb-28 text-center">
            {{-- Judul Ajakan --}}
            <h2 class="font-jost text-2xl font-medium uppercase tracking-[0.18em] text-[#2c531b] sm:text-[28px]">
                Let’s Connect
            </h2>

            {{-- Kalimat Penjelasan Singkat --}}
            <p class="mt-3 max-w-md text-[14px] leading-6 text-slate-600">
                Need pest control solutions for your home or business? Contact us today for a free consultation and site
                survey.
            </p>

            {{-- Tombol Hijau Menuju Form Kontak --}}
            <a href="#kontak"
                class="mt-7 inline-block bg-[#74a84a] px-7 py-2.5 text-[12px] font-medium uppercase tracking-[0.2em] text-white transition hover:bg-[#5f8d3b]">
                Get In Touch
            </a>
        </div>
    </section>


    {{-- ================================================================== --}}
    {{-- BAGIAN 5: KONTAK, SOSIAL MEDIA & PETA LOKASI (CONTACT US)          --}}
    {{-- Diposisikan penuh 1 layar (min-h-screen) & rata tengah vertikal.   --}}
    {{-- Terdiri dari:                                                      --}}
    {{--   5A. Formulir Pesan (Sebelah Kiri)                                --}}
    {{--   5B. Info Kontak & Sosial Media (Sebelah Kanan)                   --}}
    {{--   5C. Peta Google Maps (Bagian Bawah)                              --}}
    {{-- ================================================================== --}}
    <section id="kontak" class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-6 py-12">
        <div class="grid items-start gap-12 md:grid-cols-2 lg:gap-16">

            {{-- -------------------------------------------------------------- --}}
            {{-- 5A. FORMULIR PESAN PELANGGAN (SEBELAH KIRI)                    --}}
            {{-- Saat tombol Submit diklik, isi form akan dikirim ke WhatsApp.  --}}
            {{-- -------------------------------------------------------------- --}}
            <form id="contact-wa-form" action="#kontak" method="GET" class="space-y-4 text-[13px] text-slate-700">

                {{-- Kolom Isian: Nama Depan & Nama Belakang --}}
                <div>
                    <label class="block font-medium text-slate-800">
                        Name <span class="text-red-600">*</span>
                    </label>
                    <div class="mt-1 grid max-w-[300px] grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="first_name" required
                                class="w-full border border-neutral-300 bg-[#fafafa] px-3 py-2 text-slate-800 focus:border-[#6a9f3a] focus:outline-none">
                            <span class="mt-1 block text-[11px] text-slate-500">First</span>
                        </div>
                        <div>
                            <input type="text" name="last_name" required
                                class="w-full border border-neutral-300 bg-[#fafafa] px-3 py-2 text-slate-800 focus:border-[#6a9f3a] focus:outline-none">
                            <span class="mt-1 block text-[11px] text-slate-500">Last</span>
                        </div>
                    </div>
                </div>

                {{-- Kolom Isian: Alamat Email --}}
                <div>
                    <label for="email" class="block font-medium text-slate-800">
                        Email <span class="text-red-600">*</span>
                    </label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 w-full max-w-[300px] border border-neutral-300 bg-[#fafafa] px-3 py-2 text-slate-800 focus:border-[#6a9f3a] focus:outline-none">
                </div>

                {{-- Kolom Isian: Nomor WhatsApp --}}
                <div>
                    <label for="whatsapp" class="block font-medium text-slate-800">
                        Whatsapp Numbers
                    </label>
                    <input type="tel" id="whatsapp" name="whatsapp"
                        class="mt-1 w-full max-w-[300px] border border-neutral-300 bg-[#fafafa] px-3 py-2 text-slate-800 focus:border-[#6a9f3a] focus:outline-none">
                </div>

                {{-- Kolom Isian: Alamat Lengkap Pelanggan --}}
                <div>
                    <label for="address" class="block font-medium text-slate-800">
                        Address
                    </label>
                    <textarea id="address" name="address" rows="3"
                        class="mt-1 w-full border border-neutral-300 bg-[#fafafa] px-3 py-2 text-slate-800 focus:border-[#6a9f3a] focus:outline-none"></textarea>
                </div>

                {{-- Kolom Isian: Keluhan / Masalah Hama yang Dialami --}}
                <div>
                    <label for="problem" class="block font-medium text-slate-800">
                        Describe your pest problem
                    </label>
                    <textarea id="problem" name="problem" rows="3"
                        class="mt-1 w-full border border-neutral-300 bg-[#fafafa] px-3 py-2 text-slate-800 focus:border-[#6a9f3a] focus:outline-none"></textarea>
                </div>

                {{-- Tombol Kirim Formulir --}}
                <div class="pt-1">
                    <button type="submit"
                        class="cursor-pointer bg-[#6a9f3a] px-9 py-2.5 text-[13px] font-medium text-white transition hover:bg-[#587f30]">
                        Submit
                    </button>
                </div>

            </form>

            {{-- -------------------------------------------------------------- --}}
            {{-- 5B. INFORMASI KONTAK & SOSIAL MEDIA (SEBELAH KANAN)            --}}
            {{-- -------------------------------------------------------------- --}}
            <div>
                {{-- Judul Bagian Kontak Kanan --}}
                <h2 class="font-jost text-2xl font-semibold text-black sm:text-[28px]">
                    Talk To Us
                </h2>

                <div class="mt-7 space-y-6">

                    {{-- Info 1: Alamat Email Perusahaan --}}
                    <div class="flex items-start gap-4">
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#6a9f3a]/60 text-[#2c531b]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-slate-500">Email</p>
                            {{-- Ubah alamat email di href="mailto:..." dan pada teks di bawahnya --}}
                            <a href="mailto:info@realpestcontrol-indonesia.com"
                                class="mt-0.5 block text-[15px] text-[#2c531b] hover:underline">
                                info@realpestcontrol-indonesia.com
                            </a>
                        </div>
                    </div>

                    {{-- Info 2: Nomor Telepon / WhatsApp Perusahaan --}}
                    <div class="flex items-start gap-4">
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#6a9f3a]/60 text-[#2c531b]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-slate-500">Phone Number</p>
                            {{-- Ubah nomor telepon di href="tel:..." dan pada teks di bawahnya --}}
                            <a href="tel:+6285881700579"
                                class="mt-0.5 block text-[15px] text-[#2c531b] hover:underline">
                                +62-858-8170-0579
                            </a>
                        </div>
                    </div>

                    {{-- Info 3: Alamat Kantor Perusahaan --}}
                    <div class="flex items-start gap-4">
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#6a9f3a]/60 text-[#2c531b]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-slate-500">Address</p>
                            {{-- Ubah alamat lengkap kantor di bawah ini --}}
                            <p class="mt-0.5 text-[15px] leading-6 text-[#2c531b]">
                                Perumahan Taman Kota, Blok A3 no. 30,<br>
                                Kelurahan Bekasi Jaya, Kecamatan Bekasi<br>
                                Timur, Kota Bekasi, Jawa Barat 17112
                            </p>
                        </div>
                    </div>

                </div>

                {{-- Deretan Tombol Ikon Sosial Media (ganti tanda # pada href dengan link akun asli) --}}
                <div class="mt-8">
                    <h3 class="font-jost text-[15px] font-semibold text-black">Follow Us:</h3>
                    <div class="mt-3 flex items-center gap-2.5">

                        {{-- Tombol Facebook --}}
                        <a href="#" aria-label="Facebook"
                            class="flex h-7 w-7 items-center justify-center rounded-full bg-[#6a9f3a] text-white transition hover:bg-[#587f30]">
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z" />
                            </svg>
                        </a>

                        {{-- Tombol LinkedIn --}}
                        <a href="#" aria-label="LinkedIn"
                            class="flex h-7 w-7 items-center justify-center rounded-full bg-[#6a9f3a] text-white transition hover:bg-[#587f30]">
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.94 5a2 2 0 11-4-.002 2 2 0 014 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z" />
                            </svg>
                        </a>

                        {{-- Tombol Instagram --}}
                        <a href="#" aria-label="Instagram"
                            class="flex h-7 w-7 items-center justify-center rounded-full bg-[#6a9f3a] text-white transition hover:bg-[#587f30]">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" />
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                            </svg>
                        </a>

                        {{-- Tombol WhatsApp (format nomor: 628...) --}}
                        <a href="https://wa.me/6285881700579" target="_blank" rel="noopener noreferrer"
                            aria-label="WhatsApp"
                            class="flex h-7 w-7 items-center justify-center rounded-full bg-[#6a9f3a] text-white transition hover:bg-[#587f30]">
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

        </div>

        {{-- -------------------------------------------------------------- --}}
        {{-- 5C. PETA LOKASI KANTOR (GOOGLE MAPS)                           --}}
        {{-- Untuk mengganti lokasi peta, ubah alamat setelah "?q=" di src  --}}
        {{-- -------------------------------------------------------------- --}}
        <div class="mt-10 w-full overflow-hidden">
            <iframe
                title="Lokasi PT Real Indonesia Satu - Perumahan Taman Kota Bekasi"
                src="https://maps.google.com/maps?q=Jl.+Perumahan+Taman+Kota+Blok+A3+No.+30,+Bekasi+Jaya,+Bekasi+Timur,+Kota+Bekasi,+Jawa+Barat+17112&t=&z=11&ie=UTF8&iwloc=&output=embed"
                class="h-60 w-full border-0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- Kode pengirim isi formulir kontak langsung ke WhatsApp (JavaScript) --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const contactForm = document.getElementById('contact-wa-form');
                if (!contactForm) return;

                // Nomor WhatsApp tujuan perusahaan (format diawali kode negara 62 tanpa tanda +)
                const targetWaNumber = '6285881700579';

                contactForm.addEventListener('submit', (event) => {
                    event.preventDefault();

                    const formData = new FormData(contactForm);
                    const firstName = (formData.get('first_name') || '').toString().trim();
                    const lastName = (formData.get('last_name') || '').toString().trim();
                    const fullName = [firstName, lastName].filter(Boolean).join(' ');
                    const email = (formData.get('email') || '').toString().trim();
                    const whatsapp = (formData.get('whatsapp') || '').toString().trim() || '-';
                    const address = (formData.get('address') || '').toString().trim() || '-';
                    const problem = (formData.get('problem') || '').toString().trim() || '-';

                    const message = [
                        'Halo PT Real Indonesia Satu, saya ingin berkonsultasi mengenai layanan pengendalian hama:',
                        '',
                        `*Nama:* ${fullName}`,
                        `*Email:* ${email}`,
                        `*No. WhatsApp:* ${whatsapp}`,
                        `*Alamat:* ${address}`,
                        `*Keluhan / Masalah Hama:*`,
                        problem,
                    ].join('\n');

                    const waUrl = `https://wa.me/${targetWaNumber}?text=${encodeURIComponent(message)}`;
                    window.open(waUrl, '_blank', 'noopener,noreferrer');
                });
            });
        </script>

    </section>

</x-layout>
