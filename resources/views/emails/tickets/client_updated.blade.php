<div style="font-family: ui-sans-serif, system-ui;">
    <h2>Cliente actualizado</h2>
    <p>Se actualizaron datos del cliente en el ticket <strong>{{ $ticket->titulo }}</strong>:</p>
    <ul>
        @foreach($diffs as $d)
            <li>{{ $d }}</li>
        @endforeach
    </ul>
    <p>Cliente: {{ $ticket->cliente->nombre }} ({{ $ticket->cliente->email }})</p>
</div>
