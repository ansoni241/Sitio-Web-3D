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
        Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('login', 50)->nullable();
            $table->string('title')->nullable();
            $table->text('video_fondo')->nullable();
            $table->text('video_file')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedTinyInteger('estado')->default(0);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE video ADD CHECK (estado IN (0, 1))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
