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
        Schema::create('phong_binh_luans', function (Blueprint $table) {
            $table->id();
            $table->integer('idPhong');
            $table->integer('idNguoiThue');
            $table->string('noiDungBinhLuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_binh_luans');
    }
};
