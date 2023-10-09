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
        Schema::create('dat_phongs', function (Blueprint $table) {
            $table->id();
            $table->integer('idNguoiThue');
            $table->integer('idChuTro');
            $table->integer('idPhong');
            $table->string('noiDung');
            $table->string('hinhChuyenKhoan');
            $table->integer('trangThaiXacThuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_phongs');
    }
};
