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
        Schema::create('equipos', function (Blueprint $table) {
            $table->string('No_Serie', 30)->primary();
            $table->string('descripcion');
            $table->string('contrasena');
            $table->integer('marca_id');
            $table->integer('estatus_id');
            $table->string('tipoEquipo_id', 12)->unsigned()->nullable();

            $table->foreign('tipoEquipo_id')->references('tipoEquipo_id')->on('tipo_equipos')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('marca_id')->references('id')->on('marcas')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
