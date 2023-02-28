<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uangkeluar;
use App\Models\penabung;
use App\Models\laporankeluar;
use App\Models\histori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UangkeluarController extends Controller
{
    public function uangkeluar()
    {
        $uangkeluar = uangkeluar::with('penabung')->get();
        return view('uangkeluar.uangkeluar', compact('uangkeluar'));
    }

     public function tambahuangkeluar()
    {
        $penabung = penabung::all();
        $uangkeluar = uangkeluar::all();
        return view('uangkeluar.tambahuangkeluar', compact('penabung','uangkeluar'));
    }
    public function insertuangkeluar(Request $request)
    {
        $validator = Validator::make($request->all(),[
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
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->messages(),
            ]);
        }
        $penabung = penabung::find($request->penabungs_id);
        if ($penabung->jumlah_uang < $request->penarikan) {
            Alert::error('Error','Jumlah penarikan Melebihi tabungan');
            return back();
        } else {
        $data = uangkeluar::create([
            'penabungs_id' => $request->penabungs_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
            'penarikan' => $request->penarikan,
        ]);

        $datas = histori::create([
            'nama' => $request->penabungs_id,
            'uangditabung' => $request->jumlah_uang,
            'uangdiambil' => $request->penarikan,
        ]);
        $laporan = laporankeluar::create([
            'penabungs_id' => $request->penabungs_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
            'penarikan' => $request->penarikan,
        ]);
        $stok_kurang = penabung::find($request->penabungs_id);
        $stok_nambah = penabung::find($request->penabungs_id);
        $stok_kurang->jumlah_uang -= $request->penarikan;
        $stok_kurang->save();
        $stok_nambah->jumlah_ditarik += $request->penarikan;
        $stok_nambah->save();
        $jumlahstok = $stok_kurang->jumlah_uang;

            return redirect()->route('uangkeluar')->with('success', 'Berhasil Menarik uang');
        }

}



    public function edituangkeluar($id)
    {
        $uangkeluar = uangkeluar::findOrFail($id);
        $penabung = penabung::all();
        return view('uangkeluar.edituangkeluar', compact('uangkeluar','penabung'));
    }




    public function updateuangkeluar(request $request, $id)
    {
        $data = uangkeluar::find($id);
        $stok_kurang = penabung::find($request->penabungs_id);

        $stok_kurang->jumlah_uang += $data->penarikan;
        $stok_kurang->jumlah_uang -= $request->penarikan;
        $stok_kurang->save();
        $data->update([
            'penabungs_id' => $request->penabungs_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'notelpon' => $request->notelpon,
            'jumlah_uang' => $request->jumlah_uang,
            'penarikan' => $request->penarikan,
        ]);
        return redirect()->route('uangkeluar')->with('success', 'Data berhasil di Update!');
    }



    public function hapusuangkeluar($id)
    {
        $data = uangkeluar::find($id);
        $barang = penabung::find($data->penabungs_id);
        $barang->update([
            'jumlah_uang' => (int) $barang->jumlah_uang + $data->penarikan,
        ]);
        $data->delete();
        return redirect()->route('uangkeluar')->with('success', 'Data Berhasil Di Hapus');
    }
}
