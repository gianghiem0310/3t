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
        Schema::create('chu_tros', function (Blueprint $table) {
            $table->id();
            $table->integer('idTaiKhoan');
            $table->string('hinh');
            $table->string('ten');
            $table->string('soDienThoai');
            $table->integer('idGoi');
            $table->integer('soTaiKhoanNganHang');
            $table->integer('tenChuTaiKhoanNganHang');
            $table->integer('xacThuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chu_tros');
    }
};
