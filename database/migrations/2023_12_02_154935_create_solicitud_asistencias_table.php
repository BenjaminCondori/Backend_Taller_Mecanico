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
        Schema::create('solicitud_asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion_problema');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('direccion');
            $table->datetime('fecha_solicitud')->useCurrent();
            $table->string('estado')->default('Pendiente');
            $table->string('imagen')->nullable();
            $table->string('audio')->nullable();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('vehiculo_id')->nullable();
            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tecnico_id')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_asistencias');
    }
};
