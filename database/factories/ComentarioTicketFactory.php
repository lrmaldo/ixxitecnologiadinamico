<?php

namespace Database\Factories;

use App\Models\ComentarioTicket;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioTicketFactory extends Factory
{
    protected $model = ComentarioTicket::class;

    public function definition(): array
    {
        return [
            'ticket_id' => Ticket::factory(),
            'empleado_id' => User::factory(),
            'comentario' => $this->faker->paragraph(),
        ];
    }
}
