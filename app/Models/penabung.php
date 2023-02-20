<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\uangkeluar;
use App\Models\uangmasuk;
use App\Models\laporanmasuk;
use App\Models\laporankeluar;

class penabung extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function uangmasuk()
    {
        return $this->hasMany(uangmasuk::class);
    }
    public function uangkeluar()
    {
        return $this->hasMany(uangkeluar::class);
    }
    public function laporanmasuk()
    {
        return $this->hasMany(laporanmasuk::class);
    }
    public function laporankeluar()
    {
        return $this->hasMany(laporankeluar::class);
    }
}
