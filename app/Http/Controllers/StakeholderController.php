<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stakeholder;
use App\Models\Kategori;
use App\Models\Bidang;

class StakeholderController extends Controller
{
    
    public function index()
    {
            //mengambil data tabel kebupaten dari mysql
        $stakeholder = stakeholder::with('bidang'.'kategori')->latest()->paginate();
        return view('stakeholder.index', [
            'stakeholder' => $stakeholder
        ]);
    }

       //menjalankan fungsi tambah kategori
       public function create()
       {   
            $bi = bidang::all();
            $kat = kategori::all();
           return view('stakeholder.create',compact('bi','kat'));
       }
   
       //menambakan inputan data ke tabel
       public function store(Request $request)
       {
           $request->validate([
               'kode' => 'required|unique:stakeholders,kode',
               'bidang_id' => 'required',
               'kategori_id' => 'required',
               'stakeholder' => 'required',
               'jenis' => 'required',
               
           ]);
           $array = $request->only([
               'kode','bidang_id','kategori_id','stakeholder','jenis'
           ]);
           $kategori = kategori::create($array);
           return redirect()->route('stakeholder.index')
               ->with('success_message', 'Berhasil menambah stakeholder baru');
       }
}
