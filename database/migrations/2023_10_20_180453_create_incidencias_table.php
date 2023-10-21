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
            $table->string('title');
            $table->longText('text');
            $table->integer('time');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prioridad_id')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prioridad_id')->references('id')->on('prioridads')->constrained()->nullOnDelete();;
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('categoria_id')->references('id')->on('categorias')->constrained()->nullOnDelete();
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
