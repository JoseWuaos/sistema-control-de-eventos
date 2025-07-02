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
         Schema::create('evento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nombre');
            $table->string('direccion');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin');
            $table->uuid('encargado_id');
            $table->uuid('tipo_de_evento_id');       
            $table->uuid('institucion_id');         
             $table->foreign('institucion_id')->references('id')->on('institucion');        
            $table->foreign('encargado_id')->references('id')->on('encargado'); 
            $table->foreign('tipo_de_evento_id')->references('id')->on('tipo_de_evento'); 
            $table->timestamps();
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento');
    }
};
