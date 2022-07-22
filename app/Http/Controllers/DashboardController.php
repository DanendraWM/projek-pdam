<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\invoice;
use App\Models\nota;
class DashboardController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        $invoice = invoice::all();
        $nota = nota::all();
        return view('pages/dashboard', compact('berita','invoice','nota'));
    }
}
