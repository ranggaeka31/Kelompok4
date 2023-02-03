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
        Schema::create('penabungs', function (Blueprint $table) {
            $table->id();
            $table->string('penabung');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('notelpon');
            $table->string('jumlah_uang');
            $table->string('foto');
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
        Schema::dropIfExists('penabungs');
    }
};
