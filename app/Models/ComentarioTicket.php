<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComentarioTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'empleado_id',
        'comentario',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }
}
