<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarPertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_pertanyaan', function (Blueprint $table) {
            $table->increments('id');
            $table->char('isi', 255);
            $table->timestamps();
            $table->integer('pertanyaan_id')->unsigned();
            $table->integer('profil_id')->unsigned();
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('profil_id')->references('id')->on('profil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop table 
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('komentar_pertanyaan');
    }
}
