<?php

namespace App\Models;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
        'fecha_cierre',
    ];

    protected function casts(): array
    {
        return [
            'fecha_cierre' => 'datetime',
            'estado' => TicketStatus::class,
            'prioridad' => TicketPriority::class,
        ];
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(ComentarioTicket::class)->latest();
    }
}
