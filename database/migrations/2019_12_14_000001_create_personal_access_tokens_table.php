<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
        $table->id(); // Clave primaria autoincremental
        $table->unsignedBigInteger('estudiante_id'); // Relación con estudiante
        $table->date('fecha'); // Fecha de la asistencia
        $table->time('hora_entrada'); // Hora de entrada
        $table->time('hora_salida')->nullable(); // Hora de salida (puede ser NULL)
        $table->string('estado'); // Estado (Presente, Tarde, Ausente)
        $table->timestamps(); // Agrega created_at y updated_at automáticamente

    }

    
};
