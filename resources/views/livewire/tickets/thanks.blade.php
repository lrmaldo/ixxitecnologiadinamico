<div class="relative overflow-hidden">
    <div class="absolute inset-0 -z-10 opacity-40">
        <div class="absolute -top-24 -left-32 w-[500px] h-[500px] bg-gradient-to-br from-[#021869]/10 to-[#d9491e]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[520px] h-[520px] bg-gradient-to-tr from-[#d9491e]/10 to-transparent rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-3xl mx-auto px-6 py-16 space-y-10 text-center">
        <div class="space-y-4">
            <div class="mx-auto h-16 w-16 rounded-2xl bg-emerald-100 flex items-center justify-center ring-4 ring-emerald-500/10">
                <flux:icon name="check" class="h-8 w-8 text-emerald-600" />
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight text-zinc-800">¡Ticket recibido!</h1>
            <p class="text-zinc-600 max-w-xl mx-auto">Tu solicitud se ha registrado correctamente. Nuestro equipo de soporte te contactará pronto. Conserva el número de ticket para referencias futuras.</p>
        </div>
        @if($ticket)
            <div class="rounded-2xl bg-white/80 backdrop-blur border border-zinc-200 shadow-sm p-8 space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-left space-y-1">
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500">Número de Ticket</p>
                        <p class="text-2xl font-semibold tracking-tight text-zinc-800">#{{ $ticket->id }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium ring-1 ring-inset bg-orange-50 text-orange-700 ring-orange-600/20">Abierto</span>
                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium ring-1 ring-inset {{ match($ticket->prioridad->value){ 'alta'=>'bg-red-50 text-red-700 ring-red-600/20', 'media'=>'bg-yellow-50 text-yellow-700 ring-yellow-600/20', 'baja'=>'bg-zinc-100 text-zinc-700 ring-zinc-600/20', default=>'bg-zinc-100 text-zinc-700 ring-zinc-600/20' } }}">Prioridad: {{ ucfirst($ticket->prioridad->value) }}</span>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6 text-left">
                    <div class="space-y-2">
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500">Título</p>
                        <p class="text-sm font-medium text-zinc-800">{{ $ticket->titulo }}</p>
                        <p class="text-xs text-zinc-500 leading-relaxed line-clamp-4">{{ $ticket->descripcion }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500">Cliente</p>
                        <p class="text-sm font-medium text-zinc-800">{{ $ticket->cliente->nombre }}</p>
                        <p class="text-xs text-zinc-500">{{ $ticket->cliente->email }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="p-6 border rounded-xl bg-white/70">Ticket no encontrado.</div>
        @endif
        <div class="pt-4 flex flex-col sm:flex-row gap-3 sm:justify-center">
            <a href="{{ route('support.ticket.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-tr from-[#d9491e] to-[#e25a2f] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:from-[#d9491e]/90 hover:to-[#e25a2f]/90">
                <flux:icon name="plus" class="h-4 w-4" /> Crear otro ticket
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-zinc-300 bg-white/70 px-6 py-3 text-sm font-medium text-zinc-700 hover:bg-zinc-100">
                <flux:icon name="home" class="h-4 w-4" /> Volver al inicio
            </a>
        </div>
    </div>
</div>
