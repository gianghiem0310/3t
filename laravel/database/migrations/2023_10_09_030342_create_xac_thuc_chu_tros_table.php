<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('xac_thuc_chu_tros', function (Blueprint $table) {
            $table->id();
            $table->integer('idChuTro');
            $table->string('cccdMatTruoc');
            $table->string('cccdMatSau');
            $table->integer('trangThaiXacThuc');
            $table->integer('trangthaiNhan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xac_thuc_chu_tros');
    }
};
