<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class beritaController extends Controller
{
    public function beritaAdd()
    {
        return view('berita/create_berita');
    }
    public function beritaPost(Request $request)
    {
        $random=Str::random(20);
        $berita=new berita;
        $file=$request->file;
        // $slug = Str::slug($request->judul);
        $filename=$random.'.' . $file->extension();
        $file->move(public_path('file_berita'), $filename);
        $berita->judul=$request->judul;
        $berita->caption=$request->caption;
        $berita->file=$filename;
        $berita->save();
        return redirect('/');
    }
    public function beritaRead()
    {
        $berita=berita::latest()->paginate(4)->withQueryString();
        return view("berita/read_berita",compact("berita"));
    }
    public function beritaDelete($id)
    {
        $berita=berita::findOrFail($id);
        if ($berita != "") {
            unlink(public_path('file_berita') . '\\' . $berita->file);
        }
        $berita->delete();
        return redirect()->back();
    }
    public function beritaEdit($id)
    {
        $berita=berita::findOrFail($id);
        return view('berita/edit_berita',compact('berita'));
    }
    public function beritaEditPost($id,Request $request)
    {
        $berita=berita::findOrFail($id);
        $random=Str::random(20);
        // $slug = Str::slug($request->judul);
        $berita->judul=$request->judul;
        $berita->caption=$request->caption;
        if ($request->file !== null) {
            unlink(public_path('file_berita') . '\\' . $berita->file);
            $file=$request->file;
            $berita->file=$random.'.' . $file->extension();
            $file->move(public_path('file_berita'), $berita->file);
        }
        $berita->update();
        return redirect('/berita/read');
    }
}
