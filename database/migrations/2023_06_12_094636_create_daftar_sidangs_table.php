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
        Schema::create('daftar_sidang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned();
            $table->bigInteger('tahun_ajaran_id')->unsigned();
            $table->bigInteger('semester_id')->unsigned();
            $table->bigInteger('dosen1_id')->unsigned();
            $table->bigInteger('dosen2_id')->unsigned();
            $table->string('program_studi_id', 100);
            $table->text('judul_skripsi');
            $table->string('syarat_1')->nullable();
            $table->tinyInteger('status_1')->default(0);
            $table->text('keterangan_1')->nullable();
            $table->string('syarat_2')->nullable();
            $table->tinyInteger('status_2')->default(0);
            $table->text('keterangan_2')->nullable();
            $table->string('syarat_3')->nullable();
            $table->tinyInteger('status_3')->default(0);
            $table->text('keterangan_3')->nullable();
            $table->string('syarat_4')->nullable();
            $table->tinyInteger('status_4')->default(0);
            $table->text('keterangan_4')->nullable();
            $table->string('syarat_5')->nullable();
            $table->tinyInteger('status_5')->default(0);
            $table->text('keterangan_5')->nullable();
            $table->string('syarat_6')->nullable();
            $table->tinyInteger('status_6')->default(0);
            $table->text('keterangan_6')->nullable();
            $table->string('syarat_7')->nullable();
            $table->tinyInteger('status_7')->default(0);
            $table->text('keterangan_7')->nullable();
            $table->string('syarat_8')->nullable();
            $table->tinyInteger('status_8')->default(0);
            $table->text('keterangan_8')->nullable();
            $table->string('syarat_9')->nullable();
            $table->tinyInteger('status_9')->default(0);
            $table->text('keterangan_9')->nullable();
            $table->string('syarat_10')->nullable();
            $table->tinyInteger('status_10')->default(0);
            $table->text('keterangan_10')->nullable();
            $table->string('syarat_11')->nullable();
            $table->tinyInteger('status_11')->default(0);
            $table->text('keterangan_11')->nullable();
            $table->string('syarat_12')->nullable();
            $table->tinyInteger('status_12')->default(0);
            $table->text('keterangan_12')->nullable();
            $table->string('syarat_13')->nullable();
            $table->tinyInteger('status_13')->default(0);
            $table->text('keterangan_13')->nullable();
            $table->string('syarat_14')->nullable();
            $table->tinyInteger('status_14')->default(0);
            $table->text('keterangan_14')->nullable();
            $table->string('syarat_15')->nullable();
            $table->tinyInteger('status_15')->default(0);
            $table->text('keterangan_15')->nullable();
            $table->string('syarat_16')->nullable();
            $table->tinyInteger('status_16')->default(0);
            $table->text('keterangan_16')->nullable();
            $table->string('syarat_17')->nullable();
            $table->tinyInteger('status_17')->default(0);
            $table->text('keterangan_17')->nullable();
            $table->string('syarat_18')->nullable();
            $table->tinyInteger('status_18')->default(0);
            $table->text('keterangan_18')->nullable();
            $table->string('syarat_19')->nullable();
            $table->tinyInteger('status_19')->default(0);
            $table->text('keterangan_19')->nullable();
            $table->string('syarat_20')->nullable();
            $table->tinyInteger('status_20')->default(0);
            $table->text('keterangan_20')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('keterangan')->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semester')->onDelete('cascade');
            $table->foreign('dosen1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dosen2_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('daftar_sidang');
    }
};
