<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Pulau;

class KecamatanController extends Controller
{
    public function index()
    {
        //mengambil data tabel kebupaten dari mysql
        $kecamatan = kecamatan::with('kabupaten','pulau')->latest()->paginate();
        return view('kecamatan.index', [
            'kecamatan' => $kecamatan
        ]); 
    }

    //menjalankan fungsi tambah kecamatan
    public function create()
    {   $kab = kabupaten::all();
        $pul = pulau::all();
        return view('kecamatan.create',compact('kab','pul'));
    }

    //menambakan inputan data ke tabel
    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'required',
            'pulau_id' => 'required',
            'kecamatan' => 'required',
        ]);
        $array = $request->only([
            'kabupaten_id','pulau_id','kecamatan'
        ]);
        $kecamatan = kecamatan::create($array);
        return redirect()->route('kecamatan.index')
            ->with('success_message', 'Berhasil menambah kecamatan baru');
    
    }

     //membuat fungsi edit
     public function edit($id)
     {
         $kecamatan = kecamatan::find($id);
         if (!$kecamatan) return redirect()->route('kecamatan.index')
             ->with('error_message', 'kecamatan dengan id'.$id.' tidak ditemukan');
         return view('kecamatan.edit', [
             'kecamatan' => $kecamatan
         ]);
     }
 
     //membuat fungsi validasi edit
     public function update(Request $request, $id)
     {
         $request->validate([
             'kecamatan' => 'required',
         ]);
         $kecamatan = kecamatan::find($id);
         $kecamatan->kecamatan = $request->kecamatan;
         $kecamatan->save();
         return redirect()->route('kecamatan.index')
             ->with('success_message', 'Berhasil mengubah kecamatan');
     }
        //membuat fungsi hapus
        public function destroy($id)
        {
            $kecamatan = kecamatan::find($id);
            $kecamatan->delete();
            return redirect()->route('kecamatan.index')
                ->with('success_message', 'Berhasil menghapus kecamatan');
        }

}
