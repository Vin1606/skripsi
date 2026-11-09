{{-- ====================================================================== --}}
{{-- HALAMAN DAFTAR PENGGUNA (USER INDEX)                                   --}}
{{-- Menampilkan seluruh data pengguna dari tabel "user" menggunakan        --}}
{{-- kerangka utama <x-layout>.                                             --}}
{{-- ====================================================================== --}}

<x-layout title="User - Real Indonesia Satu">

    <section id="user"
        class="min-h-screen bg-[linear-gradient(180deg,#dcefee_0%,#f8fbfb_35%,#ffffff_100%)] pt-36 pb-16">
        <div class="mx-auto max-w-6xl px-6">

            {{-- ============================================================== --}}
            {{-- 1. JUDUL HALAMAN & TOMBOL TAMBAH PENGGUNA                      --}}
            {{-- ============================================================== --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="font-jost text-2xl font-semibold uppercase tracking-[0.12em] text-[#2f5d1e] sm:text-3xl">
                        Daftar Pengguna
                    </h1>
                    <p class="mt-1 text-[14px] text-slate-600">
                        Kelola seluruh data akun Admin dan Staf pada Sistem Inventory PT Real Indonesia Satu.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('user.create') }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-[#6a9f3a] px-5 py-2.5 font-jost text-[13px] font-medium uppercase tracking-[0.12em] text-white shadow-sm transition hover:bg-[#587f30]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah User</span>
                    </a>
                </div>
            </div>

            {{-- Notifikasi Sukses (Jika Ada) --}}
            @if (session('success'))
                <div class="mt-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-[13px] text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ============================================================== --}}
            {{-- 2. RINGKASAN JUMLAH PENGGUNA                                   --}}
            {{-- ============================================================== --}}
            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Total Pengguna</p>
                    <p class="mt-2 font-jost text-3xl font-semibold text-slate-800">{{ $user->count() }}</p>
                </div>

                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Pengguna Aktif</p>
                    <p class="mt-2 font-jost text-3xl font-semibold text-[#2f5d1e]">
                        {{ $user->where('is_active', true)->count() }}
                    </p>
                </div>

                <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <p class="text-[12px] font-medium uppercase tracking-wider text-slate-500">Tidak Aktif</p>
                    <p class="mt-2 font-jost text-3xl font-semibold text-red-600">
                        {{ $user->where('is_active', false)->count() }}
                    </p>
                </div>
            </div>

            {{-- ============================================================== --}}
            {{-- 3. TABEL DAFTAR PENGGUNA                                       --}}
            {{-- ============================================================== --}}
            <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-left text-[14px]">
                        <thead>
                            <tr
                                class="border-b border-slate-200 bg-slate-50/80 font-jost text-[12px] font-semibold uppercase tracking-wider text-slate-600">
                                <th class="px-6 py-4">No</th>
                                <th class="px-6 py-4">Pengguna</th>
                                <th class="px-6 py-4">Email</th>
                                <th class="px-6 py-4">Role</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Terdaftar</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($user as $index => $item)
                                <tr class="transition hover:bg-slate-50/70">
                                    {{-- Nomor Urut --}}
                                    <td class="px-6 py-4 font-medium text-slate-500">
                                        {{ $index + 1 }}
                                    </td>

                                    {{-- Foto / Inisial & Nama Pengguna --}}
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt="{{ $item->name }}"
                                                    class="h-10 w-10 shrink-0 rounded-full object-cover ring-1 ring-slate-200">
                                            @else
                                                <div class="py-4 text-slate-600">
                                                    {{ $item->name }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    {{-- Email --}}
                                    <td class="px-6 py-4 text-slate-600">
                                        {{ $item->email }}
                                    </td>

                                    {{-- Role / Peran --}}
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center rounded-full px-3 py-1 text-[12px] font-medium capitalize {{ $item->role === 'admin' ? 'bg-amber-50 text-amber-700 ring-1 ring-amber-200' : 'bg-slate-100 text-slate-700 ring-1 ring-slate-200' }}">
                                            {{ $item->role ?? 'user' }}
                                        </span>
                                    </td>

                                    {{-- Status Aktif / Tidak Aktif --}}
                                    <td class="px-6 py-4">
                                        @if ($item->is_active)
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-[12px] font-medium text-green-700 ring-1 ring-green-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-[12px] font-medium text-red-700 ring-1 ring-red-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Tanggal Terdaftar --}}
                                    <td class="px-6 py-4 text-[13px] text-slate-500">
                                        {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                                    </td>

                                    {{-- Tombol Aksi (Edit & Hapus) --}}
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('user.edit', $item->id_user) }}" title="Edit Pengguna"
                                                class="inline-flex items-center gap-1 rounded-md border border-slate-200 bg-white px-2.5 py-1.5 text-[12px] font-medium text-slate-700 transition hover:border-[#6a9f3a] hover:text-[#2f5d1e]">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>

                                            <form action="{{ route('user.destroy', $item->id_user) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna {{ $item->name }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Pengguna"
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
                                    <td colspan="7" class="px-6 py-12 text-center text-slate-500">
                                        Belum ada data pengguna yang terdaftar.
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
