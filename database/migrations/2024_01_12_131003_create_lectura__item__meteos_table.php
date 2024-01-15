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
        Schema::create('lectura_item_meteos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLugar');
            $table->dateTime('fecha_hora');
            $table->float('valorTemp');
            $table->float('valorHumedad');
            $table->float('valorViento');
            $table->float('valorPrecipitacion');
            $table->string('prevision');
            $table->timestamps();
            
            $table->foreign('idLugar')->references('id')->on('lugares');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectura_item_meteos');
    }
};