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
        Schema::create('phong_tro_goi_y_s', function (Blueprint $table) {
            $table->id();
            $table->integer('idTaiKhoan');
            $table->integer('idQuan');
            $table->integer('tienCoc');
            $table->integer('gioiTinh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_tro_goi_y_s');
    }
};
