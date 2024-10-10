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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id('id_evaluacion'); 
            $table->unsignedBigInteger('id_contenido'); 
            $table->integer('limite_intentos'); 
            $table->date('fecha_limite'); 
            $table->timestamps(); 
            $table->foreign('id_contenido')->references('id_contenido')->on('contenidos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
