<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasBerjalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_berjalans', function (Blueprint $table) {
            $table->bigIncrements('id_kelas');
            $table->string('tahun_akademik');
            $table->enum('semester', ['ganjil','genap']);
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('rombel');
            $table->string('walikelas');
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
        Schema::dropIfExists('kelas_berjalans');
    }
}
