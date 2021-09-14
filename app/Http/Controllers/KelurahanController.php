<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kabupaten;
use App\Models\Pulau;
use App\Models\Kecamatan;

class KelurahanController extends Controller
{
    public function index()
    {
        //mengambil data tabel kebupaten dari mysql
        $kelurahan = kelurahan::with('kabupaten','pulau','kecamatan')->latest()->paginate();
        return view('kelurahan.index', [
            'kelurahan' => $kelurahan
        ]); 
    }

    //menjalankan fungsi tambah kelurahan
    public function create()
    {   $kab = kabupaten::all();
        $pul = pulau::all();
        $kec = kecamatan::all();
        return view('kelurahan.create',compact('kab','pul','kec'));
    }

    //menambakan inputan data ke tabel
    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'required',
            'pulau_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan' => 'required',
            'jenis' => 'required',
        ]);
        $array = $request->only([
            'kabupaten_id','pulau_id','kecamatan_id','kelurahan','jenis',
        ]);
        $kelurahan = kelurahan::create($array);
        return redirect()->route('kelurahan.index')
            ->with('success_message', 'Berhasil menambah kelurahan baru');
    
    }
    //membuat fungsi edit
    public function edit($id)
    {
        $kelurahan = kelurahan::find($id);
        if (!$kelurahan) return redirect()->route('kelurahan.index')
            ->with('error_message', 'kelurahan dengan id'.$id.' tidak ditemukan');
        return view('kelurahan.edit', [
            'kelurahan' => $kelurahan
        ]);
    }

    //membuat fungsi validasi edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelurahan' => 'required',
        ]);
        $kelurahan = kelurahan::find($id,$jenis);
        $kelurahan->kelurahan = $request->kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
            ->with('success_message', 'Berhasil mengubah kelurahan');
    }
       //membuat fungsi hapus
       public function destroy($id)
       {
           $kelurahan = kelurahan::find($id);
           $kelurahan->delete();
           return redirect()->route('kelurahan.index')
               ->with('success_message', 'Berhasil menghapus kelurahan');
       }
}
