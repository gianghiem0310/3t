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
        Schema::create('firebase_cloud_messagings', function (Blueprint $table) {
            $table->id();
            // 1  tài khoản có nhiều token divice
            $table->string("token");// token divice
            $table->string("idTaiKhoan"); // id của tài khoản
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firebase_cloud_messagings');
    }
};
