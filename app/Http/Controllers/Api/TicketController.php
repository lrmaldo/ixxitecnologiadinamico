<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Cliente;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Anti-spam honeypot
            if ($request->filled('extra_field')) {
                return response()->json(['error' => 'Solicitud no válida'], 422);
            }

            // Validación
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|min:3|max:120',
                'email' => 'required|email|max:180',
                'telefono' => 'nullable|string|max:40',
                'titulo' => 'required|string|min:5|max:140',
                'descripcion' => 'required|string|min:10',
                'prioridad' => 'required|in:baja,media,alta',
            ], [
                'nombre.required' => 'El nombre es obligatorio',
                'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
                'nombre.max' => 'El nombre no puede tener más de 120 caracteres',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe tener un formato válido',
                'email.max' => 'El email no puede tener más de 180 caracteres',
                'telefono.max' => 'El teléfono no puede tener más de 40 caracteres',
                'titulo.required' => 'El título es obligatorio',
                'titulo.min' => 'El título debe tener al menos 5 caracteres',
                'titulo.max' => 'El título no puede tener más de 140 caracteres',
                'descripcion.required' => 'La descripción es obligatoria',
                'descripcion.min' => 'La descripción debe tener al menos 10 caracteres',
                'prioridad.required' => 'La prioridad es obligatoria',
                'prioridad.in' => 'La prioridad debe ser baja, media o alta',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                    'message' => 'Error de validación'
                ], 422);
            }

            $validated = $validator->validated();

            // Crear o actualizar cliente
            $cliente = Cliente::firstOrCreate(
                ['email' => $validated['email']],
                ['nombre' => $validated['nombre'], 'telefono' => $validated['telefono'] ?: null]
            );

            $cliente->update([
                'nombre' => $validated['nombre'],
                'telefono' => $validated['telefono'] ?: null,
            ]);

            // Crear ticket
            $ticket = Ticket::create([
                'cliente_id' => $cliente->id,
                'empleado_id' => auth()->id() ?? 1,
                'titulo' => $validated['titulo'],
                'descripcion' => $validated['descripcion'],
                'estado' => TicketStatus::Abierto,
                'prioridad' => TicketPriority::from($validated['prioridad']),
            ]);

            // Enviar correo confirmación (opcional)
            // Mail::raw("Su ticket #{$ticket->id} ha sido creado.", function ($message) use ($cliente) {
            //     $message->to($cliente->email)
            //             ->subject('Ticket creado - Soporte IXXI');
            // });

            return response()->json([
                'success' => true,
                'message' => '¡Ticket creado exitosamente!',
                'ticket_id' => $ticket->id,
                'redirect_url' => route('support.ticket.thanks', ['id' => $ticket->id])
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor: ' . $e->getMessage(),
                'success' => false
            ], 500);
        }
    }
}
