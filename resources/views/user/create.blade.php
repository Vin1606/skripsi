{{-- ====================================================================== --}}
{{-- HALAMAN TAMBAH PENGGUNA BARU (USER CREATE)                             --}}
{{-- Menampilkan formulir penambahan data pengguna pada tabel "user"        --}}
{{-- menggunakan kerangka utama <x-layout>.                                 --}}
{{-- ====================================================================== --}}

<x-layout title="Tambah Pengguna - Real Indonesia Satu">

    <section id="user-create"
        class="min-h-screen bg-[linear-gradient(180deg,#dcefee_0%,#f8fbfb_35%,#ffffff_100%)] pt-36 pb-16">
        <div class="mx-auto max-w-3xl px-6">

            {{-- ============================================================== --}}
            {{-- 1. JUDUL HALAMAN & TOMBOL KEMBALI                              --}}
            {{-- ============================================================== --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="font-jost text-2xl font-semibold uppercase tracking-[0.12em] text-[#2f5d1e] sm:text-3xl">
                        Tambah Pengguna Baru
                    </h1>
                    <p class="mt-1 text-[14px] text-slate-600">
                        Lengkapi formulir di bawah ini untuk menambahkan akun Admin atau Staf baru.
                    </p>
                </div>

                <div>
                    <a href="{{ route('user.index') }}"
                        class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-[13px] font-medium text-slate-700 shadow-xs transition hover:border-[#6a9f3a] hover:text-[#2f5d1e]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>

            {{-- Pesan Peringatan Jika Validasi Gagal --}}
            @if ($errors->any())
                <div class="mt-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-[13px] text-red-700">
                    <ul class="list-disc space-y-1 pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ============================================================== --}}
            {{-- 2. KARTU FORMULIR TAMBAH PENGGUNA                              --}}
            {{-- ============================================================== --}}
            <div class="mt-6 rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-5 text-[14px]">
                    @csrf

                    {{-- Kolom Isian: Nama Lengkap --}}
                    <div>
                        <label for="name" class="block font-medium text-slate-700">
                            Nama Lengkap <span class="text-red-600">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                            placeholder="Masukkan nama lengkap pengguna"
                            class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                    </div>

                    {{-- Kolom Isian: Email --}}
                    <div>
                        <label for="email" class="block font-medium text-slate-700">
                            Email <span class="text-red-600">*</span>
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="Masukkan alamat email"
                            class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                    </div>

                    {{-- Kolom Isian: Password --}}
                    <div>
                        <label for="password" class="block font-medium text-slate-700">
                            Password <span class="text-red-600">*</span>
                        </label>
                        <div class="relative mt-1.5">
                            <input type="password" id="password" name="password" required minlength="8"
                                placeholder="Min. 8 karakter (huruf kapital & simbol)"
                                class="w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 pr-10 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">

                            {{-- Tombol Mata untuk Lihat / Sembunyikan Password --}}
                            <button type="button" data-toggle-password="password" aria-label="Tampilkan Password"
                                class="absolute inset-y-0 right-0 flex cursor-pointer items-center pr-3 text-slate-400 hover:text-slate-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p class="mt-1 text-[11px] text-slate-500">
                            Gunakan minimal 8 karakter dengan kombinasi huruf kapital (A-Z), huruf kecil (a-z), dan karakter spesial (!@#$%^&*).
                        </p>
                    </div>

                    {{-- Susunan 2 Kolom: Role & Status Aktif --}}
                    <div class="grid gap-5 sm:grid-cols-2">
                        {{-- Kolom Pilihan: Role / Peran --}}
                        <div>
                            <label for="role" class="block font-medium text-slate-700">
                                Role / Jabatan <span class="text-red-600">*</span>
                            </label>
                            <select id="role" name="role" required
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                                <option value="">Pilih Role</option>
                                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User / Staf</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        {{-- Kolom Pilihan: Status Aktif --}}
                        <div>
                            <label for="is_active" class="block font-medium text-slate-700">
                                Status Akun <span class="text-red-600">*</span>
                            </label>
                            <select id="is_active" name="is_active" required
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    {{-- Kolom Isian: Foto Profil (Opsional) --}}
                    <div>
                        <label for="image" class="block font-medium text-slate-700">
                            Foto Profil <span class="text-[12px] font-normal text-slate-400">(Opsional)</span>
                        </label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="mt-1.5 w-full cursor-pointer rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2 text-[13px] text-slate-600 file:mr-4 file:cursor-pointer file:rounded-md file:border-0 file:bg-[#e3f1d5] file:px-3 file:py-1.5 file:text-[12px] file:font-medium file:text-[#2f5d1e] hover:file:bg-[#d2e8be] focus:border-[#6a9f3a] focus:outline-none">
                        <p class="mt-1 text-[11px] text-slate-500">
                            Format JPG, PNG, atau WEBP (Maksimal 2MB).
                        </p>
                    </div>

                    {{-- Baris Tombol Batal & Simpan --}}
                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <a href="{{ route('user.index') }}"
                            class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-[13px] font-medium text-slate-600 transition hover:bg-slate-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="cursor-pointer rounded-lg bg-[#6a9f3a] px-6 py-2.5 font-jost text-[13px] font-medium uppercase tracking-[0.12em] text-white shadow-sm transition hover:bg-[#587f30]">
                            Simpan Pengguna
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    {{-- Script Sederhana untuk Tombol Lihat/Sembunyikan Password --}}
    <script>
        document.querySelectorAll('[data-toggle-password]').forEach((button) => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-toggle-password');
                const input = document.getElementById(targetId);
                if (!input) return;

                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });
    </script>

</x-layout>
