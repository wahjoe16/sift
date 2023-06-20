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
        Schema::table('daftar_seminar', function (Blueprint $table) {
            $table->tinyInteger('status_1')->default(0)->change();
            $table->tinyInteger('status_2')->default(0)->change();
            $table->tinyInteger('status_3')->default(0)->change();
            $table->tinyInteger('status_4')->default(0)->change();
            $table->tinyInteger('status_5')->default(0)->change();
            $table->tinyInteger('status_6')->default(0)->change();
            $table->tinyInteger('status_7')->default(0)->change();
            $table->tinyInteger('status_8')->default(0)->change();
            $table->tinyInteger('status_9')->default(0)->change();
            $table->tinyInteger('status_10')->default(0)->change();
            $table->tinyInteger('status_11')->default(0)->change();
            $table->tinyInteger('status_12')->default(0)->change();
            $table->tinyInteger('status_13')->default(0)->change();
            $table->tinyInteger('status_14')->default(0)->change();
            $table->tinyInteger('status_15')->default(0)->change();
            $table->tinyInteger('status_16')->default(0)->change();
            $table->tinyInteger('status_17')->default(0)->change();
            $table->tinyInteger('status_18')->default(0)->change();
            $table->tinyInteger('status_19')->default(0)->change();
            $table->tinyInteger('status_20')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_seminar', function (Blueprint $table) {
            //
        });
    }
};
