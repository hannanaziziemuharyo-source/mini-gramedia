<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // Request $reqs -> mengambil value data dari form/input
    public function register(Request $reqs)
    {
        // 1. Validasi
        $validateData = $reqs->validate([
            'name'     => ['required', 'min:3'],
            'email'    => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:10', 'confirmed', Password::min(8)->max(10)->uncompromised() ]
        ], [
            // Teks error kustom
            'name.required'     => 'Nama harus diisi',
            'name.min'          => 'Nama minimal 3 karakter',
            'email.required'    => 'Email harus diisi',
            'email.unique'      => 'Email harus diisi dengan data yang belum terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min'      => 'Password minimal 8 karakter',
            'password.max'      => 'Password maksimal 10 karakter',
            'password.confirmed'  => 'Konfirmasi Password Tidak Sesuai Dengan Password yang diberikan '
        ]);

        // 2. Simpan data ke database
        $createAccount = User::create([
            'name'     => $validateData['name'],
            'email'    => $validateData['email'],
            'password' => Hash::make($validateData['password'])
        ]);

        // 3. Redirect setelah berhasil
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');

        }

    public function login(Request $reqs){
        // 1. Validasi
        $validateData = $reqs->validate([
            'email'    => ['required'],
            'password' => ['required']
        ], [
            // Teks error kustom
            'email.required'    => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min'      => 'Password minimal 8 karakter',
            'password.max'      => 'Password maksimal 10 karakter'
        ]);
    // dd($reqs->all());
        // Cek apakah email terdaftar terlebih dahulu
        $user = User::where('email', $validateData['email'])->first();

        if (!$user) {
            // Email tidak ditemukan
            return redirect()->route('login')
                ->withErrors(['email' => 'Email tidak ditemukan. Pastikan email yang Anda masukkan sudah benar.'])
                ->withInput();
        }

        // Email ditemukan, cek password
        if (!Hash::check($validateData['password'], $user->password)) {
            // Password salah
            return redirect()->route('login')
                ->withErrors(['password' => 'Password yang Anda masukkan salah. Silakan coba lagi.'])
                ->withInput();
        }

        // Email & password benar, lakukan login
        Auth::login($user);
        $reqs->session()->regenerate();
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil sebagai Admin');
        } else {
            return redirect()->route('home')->with('success', 'Login Berhasil');
        }
    }

    public function logout(Request $reqs){
        Auth::logout();
        $reqs->session()->invalidate();
        return redirect()->route('home')->with('success', 'Logout Berhasil');
    }
}
