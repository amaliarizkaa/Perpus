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
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('callnum');
            $table->string('judul');
            $table->text('slug');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('tahun');
            $table->integer('jumlah');
            $table->text('deskripsi');
            $table->integer('kategori_id');
            $table->string('subjek');
            $table->integer('user_id');
            $table->string('gambar_buku');
            $table->integer('views');
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
        Schema::dropIfExists('buku');
    }
};
