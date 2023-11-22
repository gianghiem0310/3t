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
        Schema::create('phong_tin_nhans', function (Blueprint $table) {
            $table->id();
            $table->integer('idTaiKhoan1');
            $table->integer('idTaiKhoan2');
            $table->string('tinNhanMoiNhat');
            $table->string('thoiGianCuaTinNhan');
            $table->string('trangThai1');
            $table->string('trangThai2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_tin_nhans');
    }
};
