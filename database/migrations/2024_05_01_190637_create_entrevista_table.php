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
        Schema::create('entrevista', function (Blueprint $table) {
            $table->id();
            $table->string('login', 50)->nullable();
            $table->string('title')->nullable();
            $table->text('fondo')->nullable();
            $table->text('url')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedTinyInteger('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrevista');
    }
};
