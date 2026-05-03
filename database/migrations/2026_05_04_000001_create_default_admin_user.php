<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        if (! DB::table('users')->where('email', 'admin@warung.test')->exists()) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@warung.test',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'admin@warung.test')->delete();
    }
};
