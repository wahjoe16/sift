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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 15);
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('level')->default(0);
            $table->string('telepon', 15)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->enum('program_studi', [
                'Teknik Pertambangan',
                'Perencanaan Wilayah dan Kota',
                'Teknik Industri'
            ])->nullable();
            $table->enum('tipe_dosen', ['internal', 'eksternal'])->nullable();
            $table->tinyInteger('status_koordinator_skripsi')->default(0);
            $table->tinyInteger('status_dekanat')->default(0);
            $table->tinyInteger('status_kaprodi')->default(0);
            $table->tinyInteger('status_sekprodi')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
