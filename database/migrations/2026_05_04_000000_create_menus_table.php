<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('kategori', 100)->default('Makanan');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->enum('status', ['tersedia', 'tidak_tersedia'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
