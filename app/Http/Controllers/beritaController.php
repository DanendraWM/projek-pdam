<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class beritaController extends Controller
{

    public function index()
    {
        $berita = berita::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        return view("pages/berita/index", compact("berita"));
    }

    public function create()
    {
        return view('pages/berita/create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'file'=>['mimes:pdf,word', 'max:1000']
        ],[
            'file.mimes'=>'file berita harus: word,pdf'
        ]);
        $random = Str::random(20);
        $berita = new berita;
        $file = $request->file;
        // $slug = Str::slug($request->judul);
        $filename = $random . '.' . $file->extension();
        $file->move(public_path('file_berita'), $filename);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->file = $filename;
        $berita->nama_media = $request->nama_media;
        $berita->status = "DRAFT";
        $berita->save();
        return redirect('/berita');
    }

    public function destroy($id)
    {
        $berita = berita::findOrFail($id);
        if ($berita != "") {
            unlink(public_path('file_berita') . '\\' . $berita->file);
        }
        $berita->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $berita = berita::findOrFail($id);
        return view('pages/berita/edit', compact('berita'));
    }

    public function update($id, Request $request)
    {
        $berita = berita::findOrFail($id);
        $random = Str::random(20);
        // $slug = Str::slug($request->judul);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->nama_media = $request->nama_media;
        if ($request->file !== null) {
            unlink(public_path('file_berita') . '\\' . $berita->file);
            $file = $request->file;
            $berita->file = $random . '.' . $file->extension();
            $file->move(public_path('file_berita'), $berita->file);
        }
        $berita->update();
        return redirect()->route('berita.index');
    }

    public function confirmAdmin($id)
    {
        $berita = berita::findOrFail($id);
        return view('pages/berita/detail', compact('berita'));
    }

    public function confirmAdminPost(Request $request, $id)
    {
        $validate = $request->validate([
            'confirm' => "required",
        ]);
        $berita = berita::findOrFail($id);
        $berita->status = $request->confirm;
        $berita->update($validate);
        return redirect('/berita');
    }

     public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:DRAFT,REVISI,TERIMA'
        ]);
        $berita = berita::findOrFail($id);
        $berita->status = $request->status;

        $berita->save();

        return redirect()->route('berita.index');
    }
    public function revisiPost(Request $request, $id)
    {
        $berita = berita::findOrFail($id);
        $berita->status="REVISI";
        $berita->alasan=$request->alasan;
        $berita->update();
        return redirect('/berita');
    }
}
