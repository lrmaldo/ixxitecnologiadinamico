<?php

namespace App\Enums;

enum TicketStatus: string
{
    case Abierto = 'abierto';
    case EnProgreso = 'en_progreso';
    case Cerrado = 'cerrado';
}
