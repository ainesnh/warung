<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // Masukkan Role dulu
        if (DB::table('userrole')->count() == 0) {
            DB::table('userrole')->insert([
                ['id' => 1, 'nama_role' => 'admin', 'keterangan' => 'Administrator', 'created_at' => now()],
                ['id' => 2, 'nama_role' => 'user', 'keterangan' => 'User Biasa', 'created_at' => now()],
            ]);
        }
        
        if (DB::table('users')->where('email', 'admin@warung.test')->exists()) {
            DB::table('users')->where('email', 'admin@warung.test')->update([
                'role_id' => 1,
                'is_active' => 1,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@warung.test',
                'password' => Hash::make('admin123'),
                'role_id' => 1, 
                'is_active' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'admin@warung.test')->delete();
        DB::table('userrole')->whereIn('nama_role', ['admin', 'user'])->delete();
    }
};
