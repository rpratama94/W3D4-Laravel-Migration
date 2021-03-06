<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->char('judul', 45); 
            $table->char('isi', 255); 
            $table->timestamps();
            $table->integer('jawaban_tepat_id')->unsigned();
            $table->integer('profil_id')->unsigned(); 
            $table->foreign('profil_id')->references('id')->on('profil');
            //$table->foreign('jawaban_tepat_id')->references('id')->on('jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->dropIndex('pertanyaan_profil_id_foreign');
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pertanyaan');
    }
}
