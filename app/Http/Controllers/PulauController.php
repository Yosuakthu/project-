<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\Pulau;


class PulauController extends Controller
{
    public function index()
    {
        //mengambil data tabel kebupaten dari mysql
        $Pulau = pulau::with('kabupaten')->latest()->paginate();
        return view('pulau.index', [
            'Pulau' => $Pulau
        ]);
    }


    //menjalankan fungsi tambah Pulau
    public function create()
    {   $kab = kabupaten::all();
        return view('pulau.create',compact('kab'));
    }

    //menambakan inputan data ke tabel
    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'required',
            'pulau' => 'required',
            'luas' => 'required',
            
        ]);
        $array = $request->only([
            'kabupaten_id','pulau','luas'
        ]);
        $Pulau = Pulau::create($array);
        return redirect()->route('pulau.index')
            ->with('success_message', 'Berhasil menambah Pulau baru');
    
    }

     //membuat fungsi edit
     public function edit($id)
     {
         $pulau = pulau::find($id);
         if (!$pulau) return redirect()->route('pulau.index')
             ->with('error_message', 'pulau dengan id'.$id.' tidak ditemukan');
         return view('pulau.edit', [
             'pulau' => $pulau
         ]);
     }
 
     //membuat fungsi validasi edit
     public function update(Request $request, $id)
     {
         $request->validate([
             'pulau' => 'required',
         ]);
         $pulau = pulau::find($id);
         $pulau->pulau = $request->pulau;
         $pulau->save();
         return redirect()->route('pulau.index')
             ->with('success_message', 'Berhasil mengubah pulau');
     }
        //membuat fungsi hapus
        public function destroy($id)
        {
            $pulau = pulau::find($id);
            $pulau->delete();
            return redirect()->route('pulau.index')
                ->with('success_message', 'Berhasil menghapus pulau');
        }

}
