<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uangmasuk;
use App\Models\penabung;

class UangmasukController extends Controller
{
    public function uangmasuk()
    {
        $uangmasuk = uangmasuk::with('penabung')->get();
        return view('uangmasuk.uangmasuk', compact('uangmasuk'));
    }

     public function tambahuangmasuk()
    {
        $penabung = penabung::all();
        $uangmasuk = uangmasuk::all();
        return view('uangmasuk.tambahuangmasuk', compact('penabung','uangmasuk'));
    }
    public function insertuangmasuk(Request $request)
    {
        $validated = $request->validate([
            'penabungs_id' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'notelpon' => 'required',
            'jumlah_uang' => 'required',
        ], [
            'penabungs_id.required' => 'penabungs_id Harus Diisi!',
            'jenis_kelamin.required' => 'jenis_kelamin Harus Diisi!',
            'alamat.required' => 'alamat Harus Diisi!',
            'notelpon.required' => 'notelpon Harus Diisi!',
            'jumlah_uang.required' => 'jumlah_uang Harus Diisi!',
        ]);
        $stok_nambah = penabung::find($request->penabungs_id);
        $data = uangmasuk::create([
            'penabungs_id' => $request->penabungs_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
        ]);
        $stok_nambah->jumlah_uang += $request->jumlah_uang;
        $stok_nambah->save();
        return redirect()->route('uangmasuk')->with('success', 'Data Berhasil Di Tambahkan');
    }



    public function edituangmasuk($id)
    {
        $uangmasuk = uangmasuk::findOrFail($id);
        $penabung = penabung::all();
        return view('uangmasuk.edituangmasuk', compact('uangmasuk','penabung'));
    }




    public function updateuangmasuk(request $request, $id)
    {
        $data = uangmasuk::find($id);
        $stok_nambah = penabung::find($request->penabungs_id);


        $stok_nambah = penabung::find($request->penabungs_id);
        $stok_nambah->jumlah_uang -= $data->jumlah_uang;
        $stok_nambah->jumlah_uang += $request->jumlah_uang;
        $stok_nambah->save();
        $data->update([
            'penabungs_id' => $request->penabungs_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
        ]);
        return redirect()->route('uangmasuk')->with('success', 'Data berhasil di Update!');
    }



    public function hapusuangmasuk($id)
    {
        $data = uangmasuk::find($id);
        $barang = penabung::find($data->penabungs_id);
        $barang->update([
            'jumlah_uang' => (int) $barang->jumlah_uang - $data->jumlah_uang,
        ]);
        $data->delete();
        return redirect()->route('uangmasuk')->with('success', 'Data Berhasil Di Hapus');
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
