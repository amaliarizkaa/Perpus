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
        Schema::create('karya_buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('callnum');
            $table->string('judul');
            // $table->string('judul_karya');
            // $table->string('edisi');
            $table->text('slug');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('subjek');
            $table->integer('tahun');
            $table->string('halaman');
            $table->string('kategori_id');
            $table->text('deskripsi');
            $table->integer('user_id');
            $table->string('gambar_karya');
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
        Schema::dropIfExists('karya_buku');
    }
};
