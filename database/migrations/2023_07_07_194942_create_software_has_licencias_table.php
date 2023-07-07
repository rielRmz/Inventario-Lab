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
        Schema::create('software_has_licencias', function (Blueprint $table) {
            $table->id();
            $table->string('Licencia_id',30);
            $table->string('Software_id',12);

            $table->foreign('Licencia_id')->references('No_Serie')->on('licencias')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Software_id')->references('Software_id')->on('software')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_has_licencias');
    }
};
