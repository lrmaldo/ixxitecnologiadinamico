<div style="font-family: ui-sans-serif, system-ui;">
    <h2>Ticket cerrado</h2>
    <p>El ticket <strong>{{ $ticket->titulo }}</strong> ha sido cerrado.</p>
    <ul>
        <li>Cliente: {{ $ticket->cliente->nombre }} ({{ $ticket->cliente->email }})</li>
        <li>Empleado: {{ $ticket->empleado->name }}</li>
        <li>Fecha cierre: {{ optional($ticket->fecha_cierre)->format('d/m/Y H:i') }}</li>
    </ul>
    <p>Descripción:</p>
    <pre style="white-space: pre-wrap; background:#f8fafc; padding:8px; border-radius:8px;">{{ $ticket->descripcion }}</pre>
</div>
