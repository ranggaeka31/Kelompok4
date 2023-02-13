<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\penabung;

class uangkeluar extends Model
{
    use HasFactory;
    

    protected $guarded = ['updated_at'];
    // protected $fillable = ['penabungs_id','jenis_kelamin','alamat','notelpon','jumlah_uang'];
    public function penabung(){
        return $this->belongsTo(penabung::class,'penabungs_id','id');
    }
}
