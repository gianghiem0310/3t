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
        Schema::create('yeu_cau_dang_ky_gois', function (Blueprint $table) {
            $table->id();
            $table->integer('idChuTro');
            $table->integer('idGoi');
            $table->integer('trangThaiXacThuc');
            $table->integer('trangthaiNhan');
            $table->string('hinhAnhChuyenKhoan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeu_cau_dang_ky_gois');
    }
};
