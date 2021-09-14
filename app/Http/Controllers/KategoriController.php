<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        //mengambil data tabel kebupaten dari mysql
        $kategori = kategori::with('bidang')->latest()->paginate();
        return view('kategori.index', [
            'kategori' => $kategori
        ]);
    }

    //menjalankan fungsi tambah kategori
    public function create()
    {   $bi = bidang::all();
        return view('kategori.create',compact('bi'));
    }

    //menambakan inputan data ke tabel
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:bidangs,kode',
            'bidang_id' => 'required',
            'kategori' => 'required',
            
        ]);
        $array = $request->only([
            'kode','bidang_id','kategori'
        ]);
        $kategori = kategori::create($array);
        return redirect()->route('bidang.index')
            ->with('success_message', 'Berhasil menambah bidang baru');
    }

     //membuat fungsi edit
     public function edit($id)
     {
         $kategori = kategori::find($id);
         if (!$kategori) return redirect()->route('kategori.index')
             ->with('error_message', 'kategori dengan id'.$id.' tidak ditemukan');
         return view('kategori.edit', [
             'kategori' => $kategori
         ]);
     }

      //membuat fungsi validasi edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
        ]);
        $kategori = kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->save();
        return redirect()->route('kategori.index')
            ->with('success_message', 'Berhasil mengubah kategori');
    }

  
    
    //membuat fungsi hapus
    public function destroy($id)
    {
        $kategori = kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')
            ->with('success_message', 'Berhasil menghapus kategori');
    }

}
