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
    Schema::create('eventos', function (Blueprint $table) {
        $table->id();
        $table->string('cedula',);
        $table->string('nombre');
        $table->string('apellido');
        $table->string('jefe_del_evento');
        $table->string('tipo');
        $table->date('fecha');
        $table->string('lugar');
        $table->time('hora');
        $table->boolean('asistencia')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
