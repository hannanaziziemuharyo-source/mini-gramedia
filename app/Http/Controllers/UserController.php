<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UserController extends Controller
{
    //request $request -> mengambil value data: bisa dari input atau url
    public function register(Request $reqs){
        //validasi
        $validateData = $reqs->validate([
            //'nama_input' => '[jenis validasi]',
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:10']
        ], [
        //teks rr yang bakal muncul kalau validasi gagal
        //nama input.jenisvalidasi => pesan
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email harus di isi dengan data yang belum terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 10 karakter'
            ]);
    }
}