<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\invoice;
use App\Models\medsos;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = invoice::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        $medsos = medsos::all();
        return view('pages/invoice/index', compact('invoice', 'medsos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/invoice/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->medsos); $i++) {
            $medsos = new medsos;
            $medsos->invoice_id = $request->id_berita;
            $medsos->nama_medsos = $request->medsos[$i];
            $medsos->save();
        }
        $invoice = new invoice;
        $invoice->berita_id = $request->id_berita;
        $invoice->kode_invoice = random_int(100000, 999999);
        $invoice->untuk_keperluan = $request->untuk_keperluan;
        $invoice->unit_kerja = $request->unit_kerja;
        $invoice->uraian = $request->uraian;
        $invoice->kode_mata_angsuran = $request->kode_mata_angsuran;
        $invoice->jumlah_angsuran = $request->jumlah_angsuran;
        $invoice->realisasi = $request->realisasi;
        $invoice->sisa_anggaran = $request->sisa_anggaran;
        $invoice->permintaan = $request->permintaan;
        $invoice->total = $request->total;
        $invoice->metode_pembayaran = "uang muka";
        $invoice->status = "DRAFT";
        $invoice->save();
        return redirect('/invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = invoice::findOrFail($id);
        $medsos = medsos::where('invoice_id', $id)->get();
        return view('pages/invoice/detail', compact('invoice', 'medsos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = invoice::findOrFail($id);
        $medsos = medsos::where('invoice_id', $id)->get();
        $nama_medsos = array();
        foreach ($medsos as $mds) {
            $nm = $mds->nama_medsos;
            array_push($nama_medsos, $nm);
        }
        return view('pages/invoice/edit', compact('invoice', 'nama_medsos'));
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
        $medsos = medsos::where('invoice_id', $id)->get();
        // for ($j = 0; $j < $c_medsos; $j++) {
        //     for ($i = 0; $i < count($request->medsos); $i++) {
        //         if ($request->medsos[$i] != $medsos[$j]->nama_medsos) {
        //             $medsos = new medsos;
        //             $medsos->invoice_id = $id;
        //             $medsos->nama_medsos = $request->medsos[$i];
        //             $medsos->save();
        //         }
        //     }
        // }
        $req = $request->medsos;
        $nama_medsos = array();
        foreach ($medsos as $mds) {
            $nm = $mds->nama_medsos;
            array_push($nama_medsos, $nm);
        }
        $medsos_new = array_values(array_diff($req, $nama_medsos));
        $medsos_old = array_values(array_diff($nama_medsos, $req));
        if (count($medsos_new)) {
            for ($i = 0; $i < count($medsos_new); $i++) {
                $medsos = new medsos;
                $medsos->invoice_id = $id;
                $medsos->nama_medsos = $medsos_new[$i];
                $medsos->save();
            }
        } else if (count($medsos_old)) {
            for ($i = 0; $i < count($medsos_old); $i++) {
                $medsos = medsos::where('nama_medsos', $medsos_old[$i])->delete();
            }
        }

        $invoice = invoice::findOrFail($id);
        $invoice->untuk_keperluan = $request->untuk_keperluan;
        $invoice->unit_kerja = $request->unit_kerja;
        $invoice->uraian = $request->uraian;
        $invoice->kode_mata_angsuran = $request->kode_mata_angsuran;
        $invoice->jumlah_angsuran = $request->jumlah_angsuran;
        $invoice->realisasi = $request->realisasi;
        $invoice->sisa_anggaran = $request->sisa_anggaran;
        $invoice->permintaan = $request->permintaan;
        $invoice->total = $request->total;
        $invoice->update();
        return redirect('/invoice');
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
    public function createInv($id)
    {
        $berita = berita::findOrFail($id);
        return view('pages/invoice/create', compact('berita'));

    }
    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:SELESAI,NOTA',
            'metode_pembayaran' => 'required|in:dana kerja,uang muka',
        ]);
        $invoice = invoice::findOrFail($id);
        $invoice->metode_pembayaran = $request->metode_pembayaran;
        $invoice->status = $request->status;

        $invoice->update();

        return redirect('/invoice');
    }
}
