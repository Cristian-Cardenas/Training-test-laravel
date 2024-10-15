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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id('id_contenido'); 
            $table->unsignedBigInteger('id_curso'); 
            $table->string('titulo_contenido', 255); 
            $table->text('material'); 
            $table->string('archivo'); 
            $table->timestamps(); 
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};
