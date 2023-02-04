<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penabung;

class PenabungController extends Controller
{
    public function datapenabung()
    {
        $data = penabung::all();
        return view('penabung.datapenabung', compact('data'));
    }

     public function tambahpenabung()
    {
        return view('penabung.tambahpenabung');
    }
    public function insertpenabung(Request $request)
    {
        // $validated = $request->validate([
        //     'penabung' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'notelpon' => 'required',
        //     'jumlah_uang' => 'required',
        //     'foto' => 'required',
        // ], [
        //     'penabung.required' => 'penabung Harus Diisi!',
        //     'jenis_kelamin.required' => 'jenis_kelamin Harus Diisi!',
        //     'alamat.required' => 'alamat Harus Diisi!',
        //     'notelpon.required' => 'notelpon Harus Diisi!',
        //     'jumlah_uang.required' => 'jumlah_uang Harus Diisi!',
        //     'foto.required' => 'foto Harus Diisi!',
        // ]);

        $data = penabung::create([
            'penabung' => $request->penabung,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
        ]);
        if ($files = $request->file('foto')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('fotopenabung/', $name);
                $images[] = $name;
            }
        }
        return redirect()->route('datapenabung')->with('success', 'Data Berhasil Di Tambahkan');
    }



    public function editpenabung($id)
    {
        $data = penabung::findOrFail($id);

        return view('penabung.editpenabung', compact('data'));
    }




    public function updatepenabung(request $request, $id)
    {
        $data = penabung::find($id);
        $data->update([
            'penabung' => $request->penabung,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
            'foto' => $request->foto,
        ]);
        return redirect()->route('datapenabung')->with('success', 'Data berhasil di Update!');
    }



    public function hapuspenabung($id)
    {
        $data = penabung::find($id);
        $data->delete();
        return redirect()->route('datapenabung')->with('success', 'Data Berhasil Di Hapus');
    }

    // public $delete_id;

    // protected $Listeners = ['deleteConfirmed'=>'hapusktgr'];

    // public function deleteConfirmation($id)
    // {
    //     try {
    //         $kategori = kategori::find($id);
    //         $kategori->delete();
    //     } catch (QueryException $e) {
    //         if ($e->errorInfo[1] == 1451) {
    //             return to_route('datakategori')->with('error', 'Data masih digunakan');
    //         }
    //     }
    //     return redirect()->route('datakategori')->with('success', 'Data Berhasil Di Hapus');
    // }
}
