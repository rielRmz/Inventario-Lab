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
        Schema::create('software', function (Blueprint $table) {
            $table->string('Software_id',12)->primary();
            $table->string('descripcion');
            $table->string('tipoSoftware_id',12)->unsigned()->nullable();

            $table->foreign('tipoSoftware_id')->references('tipoSoftware_id')->on('tipo_software')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};
