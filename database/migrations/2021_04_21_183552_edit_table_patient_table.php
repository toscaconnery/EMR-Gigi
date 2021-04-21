<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTablePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('patient');

        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp', 50);
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50);
            $table->string('email')->unique();
            $table->string('no_telp', 15);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('alamat', 255);
            $table->string('pekerjaan', 50);
            $table->string('alergi', 50);
            $table->string('username');
            $table->enum('jenis_kelamin', ['m', 'f']);
            $table->string('mr_number', 30)->nullable();
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
        //
    }
}
