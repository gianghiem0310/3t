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
        Schema::create('phong_tros', function (Blueprint $table) {
            $table->id();
            $table->integer('soPhong');
            $table->string('tenPhong');
            $table->integer('gia');
            $table->integer('dienTich');
            $table->string('moTa');
            $table->integer('idQuan');
            $table->integer('idPhuong');
            $table->string('diaChiChiTiet');
            $table->integer('loaiPhong');
            $table->integer('soLuongToiDa');
            $table->integer('tienCoc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_tros');
    }
};
