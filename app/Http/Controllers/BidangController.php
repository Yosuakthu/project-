<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;

class BidangController extends Controller
{
    public function index()
    {
        $bidang = bidang::all();
        return view('bidang.index', [
            'bidang' => $bidang
        ]);
    }
    
    //menjalankan fungsi tambah bidang
    public function create()
    {
        return view('bidang.create');
    }

    //menambakan inputan data ke tabel
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:bidangs,kode',
            'bidang' => 'required',
            
        ]);
        $array = $request->only([
            'kode','bidang'
        ]);
        $bidang = bidang::create($array);
        return redirect()->route('bidang.index')
            ->with('success_message', 'Berhasil menambah bidang baru');
    
    }

    //membuat fungsi edit
    public function edit($id)
    {
        $bidang = bidang::find($id);
        if (!$bidang) return redirect()->route('bidang.index')
            ->with('error_message', 'bidang dengan id'.$id.' tidak ditemukan');
        return view('bidang.edit', [
            'bidang' => $bidang
        ]);
    }

    //membuat fungsi validasi edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'bidang' => 'required',
        ]);
        $bidang = bidang::find($id);
        $bidang->bidang = $request->bidang;
        $bidang->save();
        return redirect()->route('bidang.index')
            ->with('success_message', 'Berhasil mengubah bidang');
    }
    
    //membuat fungsi hapus
    public function destroy($id)
    {
        $bidang = bidang::find($id);
        $bidang->delete();
        return redirect()->route('bidang.index')
            ->with('success_message', 'Berhasil menghapus bidang');
    }
}
