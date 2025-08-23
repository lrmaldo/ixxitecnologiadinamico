<?php

namespace App\Enums;

enum TicketPriority: string
{
    case Baja = 'baja';
    case Media = 'media';
    case Alta = 'alta';
}
