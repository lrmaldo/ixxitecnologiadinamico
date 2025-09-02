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
        Schema::create('site_statistics', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('page')->nullable();
            $table->string('route_name')->nullable();
            $table->integer('visits')->default(0);
            $table->string('user_agent')->nullable();
            $table->string('ip')->nullable();
            $table->string('referer')->nullable();
            $table->json('meta_data')->nullable();
            $table->timestamps();

            // Índices para mejores consultas
            $table->index('date');
            $table->index('page');
            $table->index('route_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_statistics');
    }
};
