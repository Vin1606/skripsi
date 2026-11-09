<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    
    /**
     * Menampilkan halaman form registrasi (resources/views/register/index.blade.php).
    */
    public function register()
    {
        return view('auth.register');
    }
        
    // Menangani proses registrasi pengguna baru
    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email',
            'password' => [
                'required',
                'string',
                Password::min(8)
                ->mixedCase() // Wajib kombinasi huruf kapital (A-Z) & huruf kecil (a-z)
                ->symbols(),  // Wajib mengandung karakter spesial (!@#$%^&* dll.)
            ],
            'image' => 'nullable|image|max:2048',
            'role' => 'nullable|string|in:user,admin',
            'is_active' => 'nullable|boolean',
        ], [
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.mixed' => 'Password wajib mengandung kombinasi huruf kapital',
            'password.symbols' => 'Password wajib mengandung karakter spesial',
            ]);
        // Buat pengguna baru
        User::create($validatedData);
                        
        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }
                        
    /**
    * Menampilkan halaman form login (resources/views/login/index.blade.php).
    */
    public function login()
    {
        return view('auth.login');
    }

    // Menangani proses login pengguna
    public function LoginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
                                
        // 2. Cek kecocokan data login ke database
        if (Auth::attempt($credentials)) {

        // Regenerasi session untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();
                                    
        // Ambil nilai role dari user yang berhasil login
            $role = Auth::user()->role;
                                    
        // 3. Arahkan (redirect) sesuai role masing-masing
            if ($role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($role === 'user') {
                return redirect()->intended('/user');
            } 
                                         
        // Fallback jika role tidak dikenali
            Auth::logout();
            return back()->withErrors([
                'email' => 'Role akun Anda tidak memiliki akses.',
            ]);
        }
                
        // Jika login gagal, redirect kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }                    
}
                    