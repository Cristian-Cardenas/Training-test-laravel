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
        Schema::create('crear_preguntas', function (Blueprint $table) {
            $table->id('id_c_pregunta'); 
            $table->unsignedBigInteger('id_evaluacion'); 
            $table->text('pregunta'); 
            $table->timestamps(); 
            $table->foreign('id_evaluacion')->references('id_evaluacion')->on('evaluaciones')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crear_preguntas');
    }
};
