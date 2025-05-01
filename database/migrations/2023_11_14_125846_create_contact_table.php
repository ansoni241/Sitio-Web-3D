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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('verification_token')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('asunto');
            $table->text('mensaje');
            $table->unsignedTinyInteger('online_sino')->default(1);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE contact ADD CHECK (online_sino IN (0, 1))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
