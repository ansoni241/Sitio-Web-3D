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
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('login', 50)->nullable();
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('fisura')->nullable();

            //***************Características Geométricas***********
            //ALTO
            $table->decimal('alto_tolerancia', 10, 2)->default(0.0);
            $table->decimal('alto_dimensiones', 10, 2)->default(0.0);
            $table->decimal('alto_minimo', 10, 2)->default(0.0);
            $table->decimal('alto_maximo', 10, 2)->default(0.0);
            //ANCHO
            $table->decimal('ancho_tolerancia', 10, 2)->default(0.0);
            $table->decimal('ancho_dimensiones', 10, 2)->default(0.0);
            $table->decimal('ancho_minimo', 10, 2)->default(0.0);
            $table->decimal('ancho_maximo', 10, 2)->default(0.0);
            //LARGO
            $table->decimal('largo_tolerancia', 10, 2)->default(0.0);
            $table->decimal('largo_dimensiones', 10, 2)->default(0.0);
            $table->decimal('largo_minimo', 10, 2)->default(0.0);
            $table->decimal('largo_maximo', 10, 2)->default(0.0);
            //******************CARACTERISTICAS PESO****************
            $table->decimal('peso_tolerancia', 10, 2)->default(0.0);
            $table->decimal('peso_dimensiones', 10, 2)->default(0.0);
            $table->decimal('peso_minimo', 10, 2)->default(0.0);
            $table->decimal('peso_maximo', 10, 2)->default(0.0);
            //******************CARACTERISTICAS FISICAS*************
            $table->decimal('fisica_compresion', 10, 2)->default(0.0);
            $table->decimal('fisica_minimo', 10, 2)->default(0.0);
            $table->decimal('fisica_maximo', 10, 2)->default(0.0);
            //********************RENDIMIENTO***********************
            $table->unsignedTinyInteger('rendimiento')->default(0);
            // $table->text('peso');
            // $table->text('largo');
            // $table->text('ancho');
            // $table->text('alto');
            $table->unsignedTinyInteger('descuento')->default(0);
            $table->unsignedTinyInteger('estado')->default(1);
            $table->text('file');
            $table->text('model')->nullable();
            $table->text('pdf')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE store ADD CHECK (estado IN (0, 1))');
        DB::statement('ALTER TABLE store ADD CHECK (descuento >= 0 AND descuento <= 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store');
    }
};
