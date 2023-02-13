<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\histori;
class HistoriController extends Controller
{
    public function histori()
    {
        $data = histori::all();
        return view('histori.histori', compact('data'));
    }

}
