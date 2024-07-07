<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function daftar() {
        return view("page.daftar");
    }

    public function welcome(Request $request) {
        $namaDepan = $request->input('Fname');
        $namaBelakang = $request->input('Lname');

        return view('page.welcome', ['namaDepan'=> $namaDepan,'namaBelakang'=> $namaBelakang]);
    }
}
