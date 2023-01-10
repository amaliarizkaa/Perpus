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
        Schema::create('karya_t_p', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('callnum');
            $table->string('judul');
            $table->string('judul_terbit');
            $table->string('edisi');
            $table->text('slug');
            $table->string('penulis');
            $table->string('penerbit');
            // $table->integer('jumlah');
            $table->string('halaman');
            $table->integer('kategori_id');
            // $table->text('deskripsi');
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
        Schema::dropIfExists('karya_t_p');
    }
};
