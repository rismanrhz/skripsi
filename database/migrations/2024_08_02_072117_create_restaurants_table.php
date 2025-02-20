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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pengguna');
            $table->string('nama');
            $table->string('kecamatan');
            $table->text('detail_alamat');
            $table->string('jam');
            $table->double('rating');
            $table->string('image');
            $table->string('google_maps_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
