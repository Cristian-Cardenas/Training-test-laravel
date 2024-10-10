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
        Schema::create('crear_respuestas', function (Blueprint $table) {
            $table->id('id_c_respuesta'); 
            $table->unsignedBigInteger('id_c_pregunta'); 
            $table->text('c_respuesta');
            $table->boolean('validacion'); 
            $table->timestamps(); 
            $table->foreign('id_c_pregunta')->references('id_c_pregunta')->on('crear_preguntas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crear_respuestas');
    }
};
