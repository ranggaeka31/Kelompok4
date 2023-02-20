<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\penabung;
use App\models\uangkeluar;
use App\models\pemasukan;
use App\models\uangmasuk;
use App\models\histori;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function welcome()
    {

        $penabung = penabung::count();
        $uangmasuk = penabung::sum('jumlah_uang');
        $penarikan = penabung::sum('jumlah_ditarik');
        $jumlah_tabungan = $uangmasuk - $penarikan;

        $uang_ditabung = penabung::query()
        ->selectRaw('id, nama_penabung, jenis_kelamin, alamat, notelpon, jumlah_ditarik, foto, created_at, SUM(jumlah_uang) as jumlah_uang')
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();

        $uang_ditarik = penabung::select(DB::raw("id, nama_penabung, jenis_kelamin, alamat, notelpon, jumlah_uang, foto, created_at, SUM(jumlah_ditarik) as jumlah_ditarik"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();

            $previousMonths = [];

        $currentDate = now()->startOfMonth();
        while ($currentDate->month == Carbon::now()->month) {
            $previousMonths[] = $currentDate->format('M, Y');
            $currentDate->subMonth();
        }

        $previousMonths = array_reverse($previousMonths);

        $uangditabung = array();
        foreach ($previousMonths as $key => $val) {
            $uangditabung[$key] = 0;
            foreach ($uang_ditabung as $mp) {
                $waktu = Carbon::parse($mp->created_at)->format('M, Y');

                if($val == $waktu){
                    $uangditabung[$key] = $mp->jumlah_uang;
                }
            }
        }

        $uangditarik = array();
        foreach ($previousMonths as $key => $val) {
            $uangditarik[$key] = 0;
            foreach ($uang_ditarik as $rudi) {
                $waktu = Carbon::parse($rudi->created_at)->format('M, Y');

                if($val == $waktu){
                    $uangditarik[$key] = $rudi->jumlah_ditarik;
                }
            }
        }


        return view('welcome', compact('penabung', 'jumlah_tabungan','uangditarik','uangditabung','previousMonths'));
    }
}
