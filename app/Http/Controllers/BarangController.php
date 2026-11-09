<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

// =========================================================================
// CONTROLLER BARANG
// Mengelola operasi CRUD untuk data barang inventory.
// =========================================================================

class BarangController extends Controller
{
    // -----------------------------------------------------------------------
    // 1. INDEX — Menampilkan daftar semua barang
    // -----------------------------------------------------------------------
    public function index(Request $request)
    {
        $query = Barang::query();

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('kode_barang', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'aktif');
        }

        $barang    = $query->orderBy('nama_barang')->get();
        $kategoris = Barang::select('kategori')->distinct()->whereNotNull('kategori')->orderBy('kategori')->pluck('kategori');

        return view('barang.index', compact('barang', 'kategoris'));
    }

    // -----------------------------------------------------------------------
    // 2. CREATE — Form tambah barang baru
    // -----------------------------------------------------------------------
    public function create()
    {
        $kategoris = Barang::select('kategori')->distinct()->whereNotNull('kategori')->orderBy('kategori')->pluck('kategori');
        return view('barang.create', compact('kategoris'));
    }

    // -----------------------------------------------------------------------
    // 3. STORE — Simpan barang baru ke database
    // -----------------------------------------------------------------------
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang'        => 'required|string|max:50|unique:barang,kode_barang',
            'nama_barang'        => 'required|string|max:150',
            'kategori'           => 'nullable|string|max:100',
            'satuan'             => 'nullable|string|max:50',
            'stok'               => 'required|integer|min:0',
            'stok_minimum'       => 'required|integer|min:0',
            'lokasi_penyimpanan' => 'nullable|string|max:100',
            'deskripsi'          => 'nullable|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active'          => 'required|boolean',
        ], [
            'kode_barang.required'  => 'Kode barang wajib diisi.',
            'kode_barang.unique'    => 'Kode barang sudah digunakan.',
            'nama_barang.required'  => 'Nama barang wajib diisi.',
            'stok.required'         => 'Stok wajib diisi.',
            'stok_minimum.required' => 'Stok minimum wajib diisi.',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('barang', 'public');
        }

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // -----------------------------------------------------------------------
    // 4. SHOW — Detail barang (opsional, diarahkan ke edit)
    // -----------------------------------------------------------------------
    public function show(Barang $barang)
    {
        return redirect()->route('barang.edit', $barang->id_barang);
    }

    // -----------------------------------------------------------------------
    // 5. EDIT — Form edit barang
    // -----------------------------------------------------------------------
    public function edit(Barang $barang)
    {
        $kategoris = Barang::select('kategori')->distinct()->whereNotNull('kategori')->orderBy('kategori')->pluck('kategori');
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    // -----------------------------------------------------------------------
    // 6. UPDATE — Simpan perubahan data barang
    // -----------------------------------------------------------------------
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang'        => ['required', 'string', 'max:50', Rule::unique('barang', 'kode_barang')->ignore($barang->id_barang, 'id_barang')],
            'nama_barang'        => 'required|string|max:150',
            'kategori'           => 'nullable|string|max:100',
            'satuan'             => 'nullable|string|max:50',
            'stok'               => 'required|integer|min:0',
            'stok_minimum'       => 'required|integer|min:0',
            'lokasi_penyimpanan' => 'nullable|string|max:100',
            'deskripsi'          => 'nullable|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active'          => 'required|boolean',
        ], [
            'kode_barang.required' => 'Kode barang wajib diisi.',
            'kode_barang.unique'   => 'Kode barang sudah digunakan.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('barang', 'public');
        }

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    // -----------------------------------------------------------------------
    // 7. DESTROY — Hapus barang
    // -----------------------------------------------------------------------
    public function destroy(Barang $barang)
    {
        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
