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
        Schema::create('equipo_has_software', function (Blueprint $table) {
            $table->id();

            $table->string('No_Serie',30);
            $table->string('Software_id',12);
            $table->integer('Usuario_id');
            $table->date('fecha_Instalacion');
            $table->date('fecha_Desnstalacion')->nullable();
            $table->text('motivo')->nullable();

            $table->foreign('No_Serie')->references('No_Serie')->on('equipos')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Software_id')->references('Software_id')->on('software')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Usuario_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_has_software');
    }
};
