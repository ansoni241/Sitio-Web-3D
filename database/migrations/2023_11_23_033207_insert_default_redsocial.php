<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Inserta datos por defecto
        DB::table('redsocial')->insert([
            'redsocial' => 'tiktok',
            'url' => 'https://www.tiktok.com/@industrias_patzi?is_from_webapp=1&sender_device=pc',
            // ... otros campos ...
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('redsocial')->insert([
            'redsocial' => 'facebook',
            'url' => 'https://www.facebook.com/ladrillospatzi',
            // ... otros campos ...
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('redsocial')->insert([
            'redsocial' => 'youtube',
            'url' => 'https://www.youtube.com/channel/UCVjTu7045Pd_glb81PPK5JQ',
            // ... otros campos ...
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('redsocial')->insert([
            'redsocial' => 'instagram',
            'url' => 'https://www.instagram.com/industriaspatzi',
            // ... otros campos ...
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
