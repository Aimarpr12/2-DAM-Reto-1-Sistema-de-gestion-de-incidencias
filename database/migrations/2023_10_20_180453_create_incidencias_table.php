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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('text');
            $table->integer('time');
            $table->unsignedBigInteger('prioridad_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('prioridad_id')->references('id')->on('prioridads');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
