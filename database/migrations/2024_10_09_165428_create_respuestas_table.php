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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('id_respuesta'); 
            $table->unsignedBigInteger('id_trabajador'); 
            $table->unsignedBigInteger('id_evaluacion'); 
            $table->unsignedBigInteger('id_c_pregunta'); 
            $table->unsignedBigInteger('id_c_respuesta'); 
            $table->boolean('es_correcta'); 
            $table->integer('intento')->default(1);
            $table->timestamps(); 
            $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajadores')
                ->onDelete('cascade'); 
            $table->foreign('id_evaluacion')->references('id_evaluacion')->on('evaluaciones')
                ->onDelete('cascade'); 
            $table->foreign('id_c_pregunta')->references('id_c_pregunta')->on('crear_preguntas')
                ->onDelete('cascade'); 
            $table->foreign('id_c_respuesta')->references('id_c_respuesta')->on('crear_respuestas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
