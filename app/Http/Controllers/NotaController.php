<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\nota;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nota=nota::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        // $dirum=nota::where('status', 'diterima direktur umum')->orWhere('status', 'draft')->get();
        // $dirut=nota::where('status', 'diterima direktur utama')->orWhere('status', 'diterima direktur umum')->get();
        return view('pages/nota/index',compact('nota'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages/nota/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota=new nota;
        $nota->invoice_id=$request->id_invoice;
        $nota->kode_nota=random_int(100000, 999999);
        $nota->tanggal_nota=$request->tanggal_nota;
        $nota->perihal=$request->perihal;
        $nota->kegiatan=$request->kegiatan;
        $nota->biaya=$request->biaya;
        $nota->status="DRAFT";
        $nota->save();
        return redirect('/nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota=nota::findOrFail($id);
         return view('pages/nota/detail',compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
         return view('pages/nota/edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createNota($id)
    {
        $invoice = invoice::findOrFail($id);
        $invoice->status="SELESAI";
        $invoice->update();
        return view('pages/nota/create', compact('invoice'));
    }
    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:SELESAI,diterima direktur umum,diterima direktur utama',
        ]);
        $nota = nota::findOrFail($id);
        $nota->status = $request->status;

        $nota->update();

        return redirect('/nota');
    }
}
