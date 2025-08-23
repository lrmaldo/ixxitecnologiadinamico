<?php

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();
            $table->foreignId('empleado_id')->constrained('users')->cascadeOnDelete();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('estado')->default(TicketStatus::Abierto->value);
            $table->string('prioridad')->default(TicketPriority::Media->value);
            $table->timestamp('fecha_cierre')->nullable();
            $table->timestamps();
        });

        Schema::create('comentario_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('empleado_id')->constrained('users')->cascadeOnDelete();
            $table->text('comentario');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comentario_tickets');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('clientes');
    }
};
