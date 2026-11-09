{{-- ====================================================================== --}}
{{-- HALAMAN EDIT BARANG                                                    --}}
{{-- ====================================================================== --}}

<x-layout title="Edit Barang - Real Indonesia Satu">

    <section id="barang-edit"
        class="min-h-screen bg-[linear-gradient(180deg,#dcefee_0%,#f8fbfb_35%,#ffffff_100%)] py-10">
        <div class="mx-auto max-w-3xl px-6">

            {{-- ============================================================== --}}
            {{-- 1. JUDUL & TOMBOL KEMBALI                                      --}}
            {{-- ============================================================== --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="font-jost text-2xl font-semibold uppercase tracking-[0.12em] text-[#2f5d1e] sm:text-3xl">
                        Edit Barang
                    </h1>
                    <p class="mt-1 text-[14px] text-slate-600">
                        Perbarui data barang: <strong>{{ $barang->nama_barang }}</strong>
                    </p>
                </div>
                <div>
                    <a href="{{ route('barang.index') }}"
                        class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-[13px] font-medium text-slate-700 shadow-xs transition hover:border-[#6a9f3a] hover:text-[#2f5d1e]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>

            {{-- Pesan Validasi --}}
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
            {{-- 2. FORMULIR EDIT BARANG                                        --}}
            {{-- ============================================================== --}}
            <div class="mt-6 rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-5 text-[14px]">
                    @csrf
                    @method('PUT')

                    {{-- Baris: Kode Barang & Nama Barang --}}
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="kode_barang" class="block font-medium text-slate-700">
                                Kode Barang <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="kode_barang" name="kode_barang"
                                value="{{ old('kode_barang', $barang->kode_barang) }}" required
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                        </div>
                        <div>
                            <label for="nama_barang" class="block font-medium text-slate-700">
                                Nama Barang <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="nama_barang" name="nama_barang"
                                value="{{ old('nama_barang', $barang->nama_barang) }}" required
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                        </div>
                    </div>

                    {{-- Baris: Kategori & Satuan --}}
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="kategori" class="block font-medium text-slate-700">Kategori</label>
                            <input type="text" id="kategori" name="kategori"
                                value="{{ old('kategori', $barang->kategori) }}"
                                list="kategori-list"
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                            <datalist id="kategori-list">
                                @foreach ($kategoris as $kat)
                                    <option value="{{ $kat }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div>
                            <label for="satuan" class="block font-medium text-slate-700">Satuan</label>
                            <input type="text" id="satuan" name="satuan"
                                value="{{ old('satuan', $barang->satuan) }}"
                                list="satuan-list"
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                            <datalist id="satuan-list">
                                <option value="pcs">
                                <option value="kg">
                                <option value="gram">
                                <option value="liter">
                                <option value="ml">
                                <option value="lusin">
                                <option value="rim">
                                <option value="box">
                                <option value="set">
                                <option value="unit">
                                <option value="meter">
                                <option value="roll">
                            </datalist>
                        </div>
                    </div>

                    {{-- Baris: Stok & Stok Minimum --}}
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="stok" class="block font-medium text-slate-700">
                                Stok <span class="text-red-600">*</span>
                            </label>
                            <input type="number" id="stok" name="stok"
                                value="{{ old('stok', $barang->stok) }}" required min="0"
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                        </div>
                        <div>
                            <label for="stok_minimum" class="block font-medium text-slate-700">
                                Stok Minimum <span class="text-red-600">*</span>
                            </label>
                            <input type="number" id="stok_minimum" name="stok_minimum"
                                value="{{ old('stok_minimum', $barang->stok_minimum) }}" required min="0"
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                        </div>
                    </div>

                    {{-- Lokasi Penyimpanan --}}
                    <div>
                        <label for="lokasi_penyimpanan" class="block font-medium text-slate-700">Lokasi Penyimpanan</label>
                        <input type="text" id="lokasi_penyimpanan" name="lokasi_penyimpanan"
                            value="{{ old('lokasi_penyimpanan', $barang->lokasi_penyimpanan) }}"
                            placeholder="Contoh: Gudang A, Rak 3B..."
                            class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block font-medium text-slate-700">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3"
                            class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none resize-none">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="is_active" class="block font-medium text-slate-700">
                                Status Barang <span class="text-red-600">*</span>
                            </label>
                            <select id="is_active" name="is_active" required
                                class="mt-1.5 w-full rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2.5 text-slate-800 transition focus:border-[#6a9f3a] focus:bg-white focus:outline-none">
                                <option value="1" {{ old('is_active', $barang->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active', $barang->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>

                        {{-- Gambar Barang --}}
                        <div>
                            <label for="gambar" class="block font-medium text-slate-700">
                                Foto Barang <span class="text-[12px] font-normal text-slate-400">(Opsional)</span>
                            </label>
                            @if ($barang->gambar)
                                <div class="mt-1.5 flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $barang->gambar) }}"
                                        alt="{{ $barang->nama_barang }}"
                                        class="h-14 w-14 rounded-lg object-cover ring-1 ring-slate-200">
                                    <div class="flex-1">
                                        <input type="file" id="gambar" name="gambar" accept="image/*"
                                            class="w-full cursor-pointer rounded-lg border border-neutral-300 bg-[#fafafa] px-3 py-1.5 text-[12px] text-slate-600 file:mr-3 file:cursor-pointer file:rounded-md file:border-0 file:bg-[#e3f1d5] file:px-2.5 file:py-1 file:text-[11px] file:font-medium file:text-[#2f5d1e] hover:file:bg-[#d2e8be] focus:border-[#6a9f3a] focus:outline-none">
                                        <p class="mt-0.5 text-[10px] text-slate-400">Unggah gambar baru untuk mengganti.</p>
                                    </div>
                                </div>
                            @else
                                <input type="file" id="gambar" name="gambar" accept="image/*"
                                    class="mt-1.5 w-full cursor-pointer rounded-lg border border-neutral-300 bg-[#fafafa] px-3.5 py-2 text-[13px] text-slate-600 file:mr-4 file:cursor-pointer file:rounded-md file:border-0 file:bg-[#e3f1d5] file:px-3 file:py-1.5 file:text-[12px] file:font-medium file:text-[#2f5d1e] hover:file:bg-[#d2e8be] focus:border-[#6a9f3a] focus:outline-none">
                            @endif
                        </div>
                    </div>

                    {{-- Tombol Batal & Update --}}
                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <a href="{{ route('barang.index') }}"
                            class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-[13px] font-medium text-slate-600 transition hover:bg-slate-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="cursor-pointer rounded-lg bg-[#6a9f3a] px-6 py-2.5 font-jost text-[13px] font-medium uppercase tracking-[0.12em] text-white shadow-sm transition hover:bg-[#587f30]">
                            Update Barang
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

</x-layout>
