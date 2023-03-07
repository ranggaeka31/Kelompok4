<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uangmasuk;
use App\Models\uangkeluar;
use App\Models\laporanmasuk;
use App\Models\laporankeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\laporanmasukExport;

class LaporanController extends Controller
{
    public function laporanmasuk()
    {
        $uangmasuk = uangmasuk::with('penabung')->get();
        $subtotal = uangmasuk::sum('jumlah_uang');
        return view('histori.laporanmasuk', compact('uangmasuk', 'subtotal'));
    }
    // public function searchmasuk(Request $request)
    // {
    //     $mulai = $request->input('mulai');
    //     $akhir = $request->input('akhir');
    //     $uangmasuk = uangmasuk::with('penabung')->whereBetween(DB::raw("DATE(created_at)"), [$mulai, $akhir])->orderBy('created_at', 'DESC')->get();
    //     $subtotal = uangmasuk::whereBetween(DB::raw("DATE(created_at)"), [$mulai, $akhir])->sum('jumlah_uang');
    //     return view('histori.laporanmasuk', compact('uangmasuk', 'subtotal'));
    // }




    public function laporankeluar()
    {
        $uangkeluar = uangkeluar::with('penabung')->get();
        $subtotal = uangkeluar::sum('penarikan');
        return view('histori.laporankeluar', compact('uangkeluar', 'subtotal'));
    }

    // public function searchkeluar(Request $request)
    // {
    //     $mulai = $request->input('mulai');
    //     $akhir = $request->input('akhir');
    //     $uangkeluar = uangkeluar::with('penabung')->whereBetween(DB::raw("DATE(created_at)"), [$mulai, $akhir])->orderBy('created_at', 'DESC')->get();
    //     $subtotal = uangkeluar::whereBetween(DB::raw("DATE(created_at)"), [$mulai, $akhir])->sum('penarikan');
    //     return view('histori.laporankeluar', compact('uangkeluar', 'subtotal'));
    // }

    public function masukpdf()
    {
        $data = [];
        $data = laporanmasuk::all();
        view()->share('array', $data);
        $pdf = PDF::loadview('laporanmasukpdf');
        return $pdf->download('laporanditabung.pdf', compact('data'));
    }
    public function keluarpdf()
    {
        $data = [];
        $data = laporankeluar::all();
        view()->share('array', $data);
        $pdf = PDF::loadview('laporankeluarpdf');
        return $pdf->download('laporanditarik.pdf', compact('data'));
    }


    public function masukexcel()
    {
        return Excel::download(new laporanmasukExport('rangga'), 'laporantabungan.xlsx');
    }
}
