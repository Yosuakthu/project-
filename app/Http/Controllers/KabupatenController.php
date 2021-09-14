<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;

class kabupatenController extends Controller
{
    public function index()
    {
        //mengambil data tabel kebupaten dari mysql
        $kabupaten = kabupaten::all();
        return view('kabupaten.index', [
            'kabupaten' => $kabupaten
        ]); 
    }


    //menjalankan fungsi tambah kabupaten
    public function create()
    {
        return view('kabupaten.create');
    }

    //menambakan inputan data ke tabel
    public function store(Request $request)
    {
        $request->validate([
            'kabupaten' => 'required',
            
        ]);
        $array = $request->only([
            'kabupaten'
        ]);
        $kabupaten = kabupaten::create($array);
        return redirect()->route('kabupaten.index')
            ->with('success_message', 'Berhasil menambah kabupaten baru');
    
    }

    //membuat fungsi edit
    public function edit($id)
    {
        $kabupaten = kabupaten::find($id);
        if (!$kabupaten) return redirect()->route('kabupaten.index')
            ->with('error_message', 'kabupaten dengan id'.$id.' tidak ditemukan');
        return view('kabupaten.edit', [
            'kabupaten' => $kabupaten
        ]);
    }

    //membuat fungsi validasi edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'kabupaten' => 'required',
        ]);
        $kabupaten = kabupaten::find($id);
        $kabupaten->kabupaten = $request->kabupaten;
        $kabupaten->save();
        return redirect()->route('kabupaten.index')
            ->with('success_message', 'Berhasil mengubah kabupaten');
    }
    
    //membuat fungsi hapus
    public function destroy($id)
    {
        $kabupaten = kabupaten::find($id);
        $kabupaten->delete();
        return redirect()->route('kabupaten.index')
            ->with('success_message', 'Berhasil menghapus kabupaten');
    }
 
}