{{-- ====================================================================== --}}
{{-- HEADER / NAVBAR ATAS PERUSAHAAN (NAVBAR)                               --}}
{{-- Menampilkan Logo & Nama Perusahaan di kiri serta info sesi pengguna    --}}
{{-- di kanan dengan tampilan modern dan rapi.                              --}}
{{-- ====================================================================== --}}

<nav class="z-40 w-full shrink-0 border-b border-slate-200/80 bg-white shadow-[0_1px_3px_rgba(15,23,42,0.04)]">

    {{-- Garis Aksen Gradasi Hijau di Paling Atas --}}
    <div class="h-1 w-full bg-linear-to-r from-[#1f3d14] via-[#6a9f3a] to-[#a3e635]"></div>

    <div class="flex h-18 items-center justify-between px-6">

        {{-- ============================================================== --}}
        {{-- BAGIAN KIRI: TOMBOL MENU HP + LOGO & NAMA PERUSAHAAN           --}}
        {{-- ============================================================== --}}
        <div class="flex items-center gap-4">
            {{-- Tombol Buka/Tutup Sidebar (Hanya Muncul di Layar HP/Tablet) --}}
            <button type="button" id="sidebar-toggle" aria-label="Buka Menu"
                class="inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-xl border border-slate-200 text-slate-600 transition hover:border-[#6a9f3a] hover:bg-[#f4f9ef] hover:text-[#2f5d1e] md:hidden">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{-- Logo & Nama Perusahaan --}}
            <a href="{{ route('company.index') }}" class="group flex items-center gap-3.5">
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-linear-to-br from-[#f2f9ec] to-[#e3f1d5] p-1.5 ring-1 ring-[#6a9f3a]/25 transition group-hover:ring-[#6a9f3a]/50">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT Real Indonesia Satu"
                        class="h-full w-full object-contain">
                </div>

                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <span
                            class="font-jost text-[18px] font-semibold tracking-[0.08em] text-[#1f3d14] uppercase sm:text-[20px]">
                            PT Real Indonesia Satu
                        </span>
                        <span
                            class="hidden rounded-full bg-[#e3f1d5] px-2.5 py-0.5 text-[10px] font-semibold tracking-wider text-[#2f5d1e] uppercase sm:inline-block">
                            Inventory System
                        </span>
                    </div>
                    <span class="text-[12px] text-slate-500">
                        Professional Pest &amp; Rodent Control Services
                    </span>
                </div>
            </a>
        </div>

        {{-- ============================================================== --}}
        {{-- BAGIAN KANAN: TANGGAL & PROFIL PENGGUNA AKTIF                  --}}
        {{-- ============================================================== --}}
        <div class="flex items-center gap-4">

            {{-- Penunjuk Tanggal Hari Ini --}}
            <div
                class="hidden items-center gap-2 rounded-lg border border-slate-200/80 bg-slate-50/80 px-3 py-1.5 text-[12px] text-slate-600 md:flex">
                <svg class="h-4 w-4 text-[#6a9f3a]" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-medium">{{ now()->translatedFormat('d M Y') }}</span>
            </div>

            <div class="hidden h-6 w-px bg-slate-200 md:block"></div>

            {{-- Info Akun yang Sedang Login (Atau Status Guest) --}}
            @auth
                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-[13px] leading-tight font-semibold text-slate-800">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-[11px] capitalize text-[#2f5d1e]">
                            {{ auth()->user()->role ?? 'User' }}
                        </p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-[#2f5d1e] font-jost text-[14px] font-semibold text-white uppercase ring-2 ring-[#e3f1d5]">
                        {{ mb_substr(auth()->user()->name, 0, 2) }}
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-[#2f5d1e] px-4 py-2 font-jost text-[12px] font-medium tracking-wider text-white uppercase shadow-xs transition hover:bg-[#6a9f3a]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Masuk Akun</span>
                </a>
            @endauth

        </div>

    </div>
</nav>
