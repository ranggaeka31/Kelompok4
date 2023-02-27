<?php

namespace App\Exports;

use App\Models\laporanmasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanmasukExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $keyword)
    {
        $this->tanggal = $keyword;
    }
    public function view(): View
    {
        $masuk = laporanmasuk::all();
        return view('laporanmasukexcel', compact('masuk'));
    }
}
