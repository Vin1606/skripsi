<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// =========================================================================
// PENGATUR HALAMAN PROFIL PERUSAHAAN & LOGIN (COMPANY CONTROLLER)
// Menghubungkan alamat URL (route) dengan tampilan halaman (view).
// =========================================================================
class CompanyController extends Controller
{
    /**
     * Menampilkan halaman utama profil perusahaan (resources/views/company/index.blade.php).
     */
    public function index()
    {
        $title = 'Real Indonesia Satu';

        return view('company.index', compact('title'));

    }
    /**
     * Menampilkan form tambah data baru (belum digunakan).
     */
    public function create()
    {
        //
    }

    /**
     * Menyimpan data baru ke database (belum digunakan).
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan detail satu data (belum digunakan).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form ubah data (belum digunakan).
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Menyimpan perubahan data ke database (belum digunakan).
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Menghapus data dari database (belum digunakan).
     */
    public function destroy(string $id)
    {
        //
    }
}
