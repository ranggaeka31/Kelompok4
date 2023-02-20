<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporankeluars', function (Blueprint $table) {
            $table->id();
            $table->string('penabungs_id');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('notelpon');
            $table->string('jumlah_uang');
            $table->string('penarikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporankeluars');
    }
};
