{{-- ====================================================================== --}}
{{-- HALAMAN DAFTAR BARANG (BARANG INDEX)                                   --}}
{{-- Menampilkan seluruh data barang inventory dengan filter & statistik.   --}}
{{-- ====================================================================== --}}

<x-layout title="Data Barang - Real Indonesia Satu" :scrollable="false">

    <section id="barang"
        class="flex h-full flex-1 flex-col overflow-hidden bg-[linear-gradient(180deg,#dcefee_0%,#f8fbfb_35%,#ffffff_100%)] py-6">
        <div class="mx-auto flex min-h-0 w-full max-w-7xl flex-1 flex-col px-6">

            {{-- ============================================================== --}}
            {{-- 1. JUDUL HALAMAN & TOMBOL TAMBAH BARANG                        --}}
            {{-- ============================================================== --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="font-jost text-2xl font-semibold uppercase tracking-[0.12em] text-[#2f5d1e] sm:text-3xl">
                        Data Barang
                    </h1>
                    <p class="mt-1 text-[14px] text-slate-600">
                        Kelola seluruh data barang pada Sistem Inventory.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('barang.create') }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-[#6a9f3a] px-5 py-2.5 font-jost text-[13px] font-medium uppercase tracking-[0.12em] text-white shadow-sm transition hover:bg-[#587f30]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah Barang</span>
                    </a>
                </div>
            </div>

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="mt-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-[13px] text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ============================================================== --}}
            {{-- 2. RINGKASAN STATISTIK BARANG                                  --}}
            {{-- ============================================================== --}}
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Total Barang --}}
                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <div class="flex items-center justify-between">
                        <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Total Barang</p>
                        <div class="rounded-lg bg-[#e3f1d5] p-2">
                            <svg class="h-4 w-4 text-[#2f5d1e]" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 font-jost text-3xl font-semibold text-slate-800">{{ $barang->count() }}</p>
                </div>

                {{-- Barang Aktif --}}
                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <div class="flex items-center justify-between">
                        <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Barang Aktif</p>
                        <div class="rounded-lg bg-green-50 p-2">
                            <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 font-jost text-3xl font-semibold text-[#2f5d1e]">
                        {{ $barang->where('is_active', true)->count() }}
                    </p>
                </div>

                {{-- Stok Kritis --}}
                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <div class="flex items-center justify-between">
                        <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Stok Kritis</p>
                        <div class="rounded-lg bg-red-50 p-2">
                            <svg class="h-4 w-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 font-jost text-3xl font-semibold text-red-600">
                        {{ $barang->filter(fn($b) => $b->stok <= $b->stok_minimum)->count() }}
                    </p>
                </div>

                {{-- Total Kategori --}}
                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <div class="flex items-center justify-between">
                        <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Kategori</p>
                        <div class="rounded-lg bg-blue-50 p-2">
                            <svg class="h-4 w-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 font-jost text-3xl font-semibold text-blue-600">{{ $kategoris->count() }}</p>
                </div>
            </div>

            {{-- ============================================================== --}}
            {{-- 3. FILTER & PENCARIAN                                          --}}
            {{-- ============================================================== --}}
            <div class="mt-6">
                <form method="GET" action="{{ route('barang.index') }}"
                    class="flex flex-wrap items-end gap-3 rounded-xl border border-slate-200/80 bg-white p-4 shadow-xs">
                    {{-- Input Pencarian --}}
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-[12px] font-medium text-slate-600 mb-1">Cari Barang</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Nama, kode, atau kategori..."
                                class="w-full rounded-lg border border-neutral-300 bg-[#fafafa] py-2 pl-9 pr-3.5 text-[13px] text-slate-800 focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                        </div>
                    </div>

                    {{-- Filter Kategori --}}
                    <div class="min-w-[160px]">
                        <label class="block text-[12px] font-medium text-slate-600 mb-1">Kategori</label>
                        <select name="kategori"
                            class="w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3 py-2 text-[13px] text-slate-800 focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategoris as $kat)
                                <option value="{{ $kat }}" {{ request('kategori') === $kat ? 'selected' : '' }}>
                                    {{ $kat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter Status --}}
                    <div class="min-w-[140px]">
                        <label class="block text-[12px] font-medium text-slate-600 mb-1">Status</label>
                        <select name="status"
                            class="w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3 py-2 text-[13px] text-slate-800 focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') === 'nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    {{-- Tombol Filter & Reset --}}
                    <div class="flex gap-2">
                        <button type="submit"
                            class="cursor-pointer rounded-lg bg-[#6a9f3a] px-4 py-2 text-[13px] font-medium text-white transition hover:bg-[#587f30]">
                            Filter
                        </button>
                        @if (request()->anyFilled(['search', 'kategori', 'status']))
                            <a href="{{ route('barang.index') }}"
                                class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-[13px] font-medium text-slate-600 transition hover:bg-slate-50">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- ============================================================== --}}
            {{-- 4. TABEL DAFTAR BARANG                                         --}}
            {{-- ============================================================== --}}
            <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm flex-1 min-h-0 flex flex-col">
                <div class="overflow-auto flex-1">
                    <table class="w-full border-collapse text-left text-[14px]">
                        <thead class="sticky top-0 z-10">
                            <tr
                                class="border-b border-slate-200 bg-slate-50/90 font-jost text-[12px] font-semibold uppercase tracking-wider text-slate-600 backdrop-blur-xs">
                                <th class="px-5 py-3.5">No</th>
                                <th class="px-5 py-3.5">Barang</th>
                                <th class="px-5 py-3.5">Kategori</th>
                                <th class="px-5 py-3.5">Stok</th>
                                <th class="px-5 py-3.5">Satuan</th>
                                <th class="px-5 py-3.5">Lokasi</th>
                                <th class="px-5 py-3.5">Status</th>
                                <th class="px-5 py-3.5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($barang as $index => $item)
                                <tr class="transition hover:bg-slate-50/70 {{ $item->stok <= $item->stok_minimum && $item->stok_minimum > 0 ? 'bg-red-50/30' : '' }}">
                                    {{-- No Urut --}}
                                    <td class="px-5 py-3.5 font-medium text-slate-500">{{ $index + 1 }}</td>

                                    {{-- Gambar & Nama Barang --}}
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center gap-3">
                                            @if ($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    alt="{{ $item->nama_barang }}"
                                                    class="h-10 w-10 shrink-0 rounded-lg object-cover ring-1 ring-slate-200">
                                            @else
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-[#e3f1d5] text-[#2f5d1e]">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                        stroke-width="1.8" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div>
                                                <p class="font-medium text-slate-800">{{ $item->nama_barang }}</p>
                                                <p class="text-[12px] text-slate-400">{{ $item->kode_barang }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Kategori --}}
                                    <td class="px-5 py-3.5">
                                        @if ($item->kategori)
                                            <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-1 text-[11px] font-medium text-blue-700 ring-1 ring-blue-100">
                                                {{ $item->kategori }}
                                            </span>
                                        @else
                                            <span class="text-slate-400">—</span>
                                        @endif
                                    </td>

                                    {{-- Stok --}}
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center gap-1.5">
                                            @if ($item->stok_minimum > 0 && $item->stok <= $item->stok_minimum)
                                                <span class="font-semibold text-red-600">{{ number_format($item->stok) }}</span>
                                                <span class="text-[10px] text-red-400 font-medium">⚠ Kritis</span>
                                            @else
                                                <span class="font-semibold text-slate-800">{{ number_format($item->stok) }}</span>
                                            @endif
                                        </div>
                                        @if ($item->stok_minimum > 0)
                                            <p class="text-[11px] text-slate-400">Min: {{ number_format($item->stok_minimum) }}</p>
                                        @endif
                                    </td>

                                    {{-- Satuan --}}
                                    <td class="px-5 py-3.5 text-slate-600">{{ $item->satuan ?? '—' }}</td>

                                    {{-- Lokasi --}}
                                    <td class="px-5 py-3.5 text-slate-600">{{ $item->lokasi_penyimpanan ?? '—' }}</td>

                                    {{-- Status --}}
                                    <td class="px-5 py-3.5">
                                        @if ($item->is_active)
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-[12px] font-medium text-green-700 ring-1 ring-green-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-[12px] font-medium text-red-700 ring-1 ring-red-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>Tidak Aktif
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('barang.edit', $item->id_barang) }}" title="Edit Barang"
                                                class="inline-flex items-center gap-1 rounded-md border border-slate-200 bg-white px-2.5 py-1.5 text-[12px] font-medium text-slate-700 transition hover:border-[#6a9f3a] hover:text-[#2f5d1e]">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>

                                            <form action="{{ route('barang.destroy', $item->id_barang) }}"
                                                method="POST"
                                                onsubmit="return confirm('Hapus barang {{ $item->nama_barang }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Barang"
                                                    class="inline-flex cursor-pointer items-center gap-1 rounded-md border border-red-200 bg-red-50/60 px-2.5 py-1.5 text-[12px] font-medium text-red-600 transition hover:bg-red-100">
                                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div class="rounded-full bg-slate-100 p-4">
                                                <svg class="h-8 w-8 text-slate-400" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                            </div>
                                            <p class="text-[14px] font-medium text-slate-500">Belum ada data barang.</p>
                                            <a href="{{ route('barang.create') }}"
                                                class="text-[13px] font-medium text-[#6a9f3a] hover:underline">
                                                + Tambah Barang Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</x-layout>
