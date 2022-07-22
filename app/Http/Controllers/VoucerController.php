<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nota;
use App\Models\voucher;
use Illuminate\Support\Str;
use App\Models\invoice;

class VoucerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchString = $request->search;

    if($searchString)
    {
        $voucer = voucher::join('notas', 'vouchers.nota_id', '=', 'notas.id')
            ->join('invoices', 'vouchers.invoice_id', '=', 'invoices.id')
            ->where ( 'notas.perihal', 'LIKE', '%' . $searchString. '%' ) 
            ->orWhere ( 'notas.perihal', 'LIKE', '%' . $searchString. '%' )
            ->orWhere ( 'notas.kode_nota', 'LIKE', '%' . $searchString. '%' )
            ->orWhere('notas.biaya', 'LIKE', '%' . $searchString. '%')
             ->orWhere('invoices.kode_invoice', 'LIKE', '%' . $searchString. '%')
            ->select('*')
            ->get();
    }
    else {
        $voucer = voucher::latest()->get();
    }
        // $voucer=voucher::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        return view('pages/voucer/index',compact('voucer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/voucer/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucer=new voucher;
        $nota=nota::findOrFail($request->id_nota);
        $invoice=invoice::findOrFail($nota->invoice_id);
        $random = Str::random(20);
        $file = $request->file;
        $filename = $random . '.' . $file->extension();
        $file->move(public_path('file_voucer'), $filename);
        $voucer->nota_id=$request->id_nota;
        $voucer->invoice_id=$nota->invoice_id;
        $voucer->berita_id=$invoice->berita_id;
        $voucer->voucher = $filename;
        $voucer->save();
        return redirect('/voucer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucer=voucher::findOrFail($id);
        return view('pages/voucer/detail',compact('voucer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages/voucer/edit');

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
    public function createVoucer($id)
    {
        $nota = nota::findOrFail($id);
        $nota->status="SELESAI";
        $nota->update();
        return view('pages/voucer/create', compact('nota'));
    }
}
