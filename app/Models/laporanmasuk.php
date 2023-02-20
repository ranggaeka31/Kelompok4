<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\penabung;

class laporanmasuk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penabung(){
        return $this->belongsTo(penabung::class,'penabungs_id','id');
    }
}
