<?php

namespace App\Http\Controllers;

use App\Models\berita;

class DashboardController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        return view('pages/dashboard', compact('berita'));
    }
}
