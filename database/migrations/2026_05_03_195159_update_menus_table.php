<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            // Mengubah status jadi boolean dan menambah kolom is_special
            $table->boolean('status')->default(1)->change();
            $table->boolean('is_special')->default(0)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('is_special');
            // Jika ingin balik ke enum, definisikan di sini
        });
    }
};
