<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\histori;
use App\Models\uangkeluar;
use App\Models\uangmasuk;
class HistoriController extends Controller
{
    // public function histori()
    // {
    //     $data = histori::all();
    //     return view('histori.histori', compact('data'));
    // }

    public function histori()
    {
        $data = histori::all();
        $uangkeluar = uangkeluar::all();
        $uangmasuk = uangmasuk::all();
        $totaluangmasuk = uangmasuk::sum('jumlah_uang');
        $totaluangkeluar = uangkeluar::sum('penarikan');
        $subtotalkeluar = $totaluangkeluar;
        $subtotalmasuk = $totaluangmasuk;

        $array = [];

        foreach ($uangkeluar as $b) {
            $b->setAttribute('tanggal', date('d-M-Y', strtotime($b->created_at)));
            $b->setAttribute('type', 'Orang tarik tabungan');
            $b->setAttribute('total', $b->penarikan);
            $b->setAttribute('penabungs_id', $b->penabung->nama_penabung);
            array_push($array, $b->getAttributes());
        }
        foreach ($uangmasuk as $b) {
            $b->setAttribute('tanggal', date('d-M-Y', strtotime($b->created_at)));
            $b->setAttribute('type', 'Orang menabung');
            $b->setAttribute('total', $b->jumlah_uang);
            $b->setAttribute('penabungs_id', $b->penabung->nama_penabung);
            array_push($array, $b->getAttributes());
        }

        // dd($array);

        return view('histori.histori', compact('data','array', 'subtotalkeluar','subtotalmasuk'));
    }

    public function hapushistor($id)
    {
        $data = histori::find($id);
        $data->delete();
        return redirect()->route('histori')->with('success', 'Data Berhasil Di Hapus');
    }

}
