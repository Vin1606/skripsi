{{-- ====================================================================== --}}
{{-- MENU NAVIGASI SAMPING (SIDEBAR)                                        --}}
{{-- Posisi dikunci tetap (h-full shrink-0) di sisi kiri layar sehingga     --}}
{{-- tidak ikut bergerak saat konten utama di sebelah kanan di-scroll.      --}}
{{-- ====================================================================== --}}

@php
    // Daftar menu di dalam Sidebar:
    // - 'label'  : Nama menu yang tampil
    // - 'href'   : Alamat route/URL tujuan
    // - 'active' : Kondisi kapan menu ditandai aktif (berwarna hijau)
    // - 'icon'   : Path SVG ikon menu
    $menus = [
        [
            'label' => 'Data User',
            'href' => route('user.index'),
            'active' => request()->is('user*'),
            'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        ],
        [
            'label' => 'Company Profile',
            'href' => route('company.index'),
            'active' => request()->is('profile*'),
            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        ],
    ];
@endphp

{{-- Latar gelap transparan saat sidebar dibuka di layar HP --}}
<div id="sidebar-backdrop"
    class="fixed inset-0 z-30 hidden bg-black/40 backdrop-blur-xs transition-opacity md:hidden">
</div>

{{-- Kotak Utama Sidebar di Sebelah Kiri (Tetap & Tidak Goyang Saat Scroll) --}}
<aside id="app-sidebar"
    class="fixed inset-y-0 left-0 z-40 flex w-64 shrink-0 -translate-x-full flex-col border-r border-slate-200 bg-[#1f3d14] text-white transition-transform duration-200 ease-in-out md:static md:h-full md:translate-x-0">

    {{-- Judul Kelompok Menu Sistem --}}
    <div class="border-b border-white/10 px-6 py-4">
        <p class="font-jost text-[11px] font-semibold uppercase tracking-[0.2em] text-[#a3e635]">
            Menu Navigasi
        </p>
        <p class="mt-0.5 text-[12px] text-white/75">
            Sistem Manajemen Inventory
        </p>
    </div>

    {{-- Daftar Tombol Menu --}}
    <div class="flex-1 overflow-y-auto px-3 py-4">
        <ul class="space-y-1.5 text-[14px]">
            @foreach ($menus as $menu)
                <li>
                    <a href="{{ $menu['href'] }}"
                        class="flex items-center gap-3 rounded-lg px-3.5 py-2.5 font-medium transition {{ $menu['active'] ? 'bg-[#6a9f3a] text-white shadow-xs' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon'] }}" />
                        </svg>
                        <span>{{ $menu['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Bagian Bawah Sidebar: Tombol Logout (Jika Sudah Login) atau Login --}}
    <div class="border-t border-white/10 p-4">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-red-500/20 px-4 py-2.5 font-jost text-[13px] font-medium uppercase tracking-wider text-red-200 transition hover:bg-red-600 hover:text-white">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="flex w-full items-center justify-center gap-2 rounded-lg bg-white/10 px-4 py-2.5 font-jost text-[13px] font-medium uppercase tracking-wider text-white transition hover:bg-[#6a9f3a]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span>Portal Login</span>
            </a>
        @endauth
    </div>

</aside>

{{-- Script Buka/Tutup Sidebar untuk Layar HP (Mobile) --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('app-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        function toggleSidebar() {
            sidebar?.classList.toggle('-translate-x-full');
            backdrop?.classList.toggle('hidden');
        }

        toggleBtn?.addEventListener('click', toggleSidebar);
        backdrop?.addEventListener('click', toggleSidebar);
    });
</script>
