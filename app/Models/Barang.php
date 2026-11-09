<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// =========================================================================
// MODEL BARANG
// Merepresentasikan data barang dalam tabel "barang".
// =========================================================================

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'satuan',
        'stok',
        'stok_minimum',
        'lokasi_penyimpanan',
        'deskripsi',
        'gambar',
        'is_active',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'stok'         => 'integer',
        'stok_minimum' => 'integer',
    ];

    // -----------------------------------------------------------------------
    // Scope: hanya barang aktif
    // -----------------------------------------------------------------------
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    // -----------------------------------------------------------------------
    // Scope: stok kritis (stok <= stok_minimum)
    // -----------------------------------------------------------------------
    public function scopeStokKritis($query)
    {
        return $query->whereColumn('stok', '<=', 'stok_minimum');
    }
}
