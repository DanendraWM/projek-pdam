<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class beritaController extends Controller
{

   public function index()
    {
        $berita=berita::latest()->paginate(4)->withQueryString();
        return view("pages/berita/index",compact("berita"));


    }




    public function create()
    {
        return view('pages/berita/create');
    }





     public function detail()
    {
        return view('pages/berita/detail');
    }





    public function store(Request $request)
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
        return redirect('pages/berita/index');
    }




    public function destroy($id)
    {
        $berita=berita::findOrFail($id);
        if ($berita != "") {
            unlink(public_path('file_berita') . '\\' . $berita->file);
        }
        $berita->delete();
        return redirect()->back();
    }




    public function edit($id)
    {
        $berita=berita::findOrFail($id);
        return view('pages/berita/edit',compact('berita'));
    }





    public function update($id,Request $request)
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
        return redirect('pages/berita/index');
    }


    public function confirmAdmin($id)
    {
        $berita=berita::findOrFail($id);
        return view('confirm/c_admin',compact('berita'));
    }


    public function confirmAdminPost(Request $request, $id)
    {
        $berita=berita::findOrFail($id);
        $berita->status=$request->confirm;
        $berita->update();
        return redirect('pages/berita/index');
    }
}
