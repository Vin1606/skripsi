<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'user';
    protected $fillable = ['name', 'email', 'password', 'image', 'role', 'is_active'];
    protected $hidden = ['password'];

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function ($user) {
            // 1. Cek apakah role-nya 'admin' atau bukan
            //    Jika 'admin' maka awalannya 'ADM-', jika bukan maka 'USR-'
            $role = ($user->role === 'admin') ? 'ADM-' : 'USR-';

            // 2. Cari urutan terakhir khusus untuk awalan tersebut
            //    (agar urutan ADM-001 dan USR-001 dihitung terpisah)
            $lastUser = User::where('id_user', 'like', $role . '%')
                ->orderBy('id_user', 'desc')
                ->first();

            // 3. Ambil angka di belakang 'ADM-' atau 'USR-', lalu tambah 1
            $lastNumber = $lastUser ? (int) substr($lastUser->id_user, 4) : 0;

            // 4. Hasilkan ID: contoh ADM-001 atau USR-001
            $user->id_user = $role . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
