<?php

namespace Database\Factories;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Cliente;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'empleado_id' => User::factory(),
            'titulo' => $this->faker->sentence(6),
            'descripcion' => $this->faker->paragraph(3),
            'estado' => $this->faker->randomElement([
                TicketStatus::Abierto->value,
                TicketStatus::EnProgreso->value,
                TicketStatus::Cerrado->value,
            ]),
            'prioridad' => $this->faker->randomElement([
                TicketPriority::Baja->value,
                TicketPriority::Media->value,
                TicketPriority::Alta->value,
            ]),
            'fecha_cierre' => null,
        ];
    }
}
