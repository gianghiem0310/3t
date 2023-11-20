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
        Schema::create('yeu_cau_dat_phongs', function (Blueprint $table) {
            $table->id();
            $table->integer("idTaiKhoanGui");
            $table->integer("idTaiKhoanNhan");
            $table->integer("idPhong");
            $table->integer("trangThaiXacThuc");
            $table->integer("trangThaiThongBao");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeu_cau_dat_phongs');
    }
};
