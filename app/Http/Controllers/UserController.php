<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logika untuk halaman user
        return view('user.dashboard');
    }
}