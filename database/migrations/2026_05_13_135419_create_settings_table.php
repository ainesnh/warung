<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });

        $this->seedInitialSettings();
    }

    private function seedInitialSettings(): void
    {
        $defaultSettings = [
            ['key' => 'app_name', 'value' => 'Omah Tengkleng Klangenan', 'group' => 'general'],
            ['key' => 'title_banner_home', 'value' => 'Selamat Datang di Omah Tengkleng', 'group' => 'banner'],
            ['key' => 'banner_home_path', 'value' => 'default-home.jpg', 'group' => 'banner'],
            ['key' => 'title_banner_menu', 'value' => 'Daftar Menu Klangenan', 'group' => 'banner'],
            ['key' => 'banner_menu_path', 'value' => 'default-menu.jpg', 'group' => 'banner'],
        ];

        foreach ($defaultSettings as $setting) {
            \DB::table('settings')->insert(array_merge($setting, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
