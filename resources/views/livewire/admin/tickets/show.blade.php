<div class="max-w-5xl mx-auto">
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-2xl">{{ session('success') }}</div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">{{ $ticket->titulo }}</h1>
            <div class="text-sm text-gray-500">Cliente: <span class="font-medium">{{ $ticket->cliente->nombre }}</span></div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 rounded-2xl text-xs font-medium {{ match($ticket->estado->value){ 'abierto' => 'bg-orange-100 text-orange-800', 'en_progreso' => 'bg-blue-100 text-blue-800', 'cerrado' => 'bg-green-100 text-green-800', default => '' } }}">
                {{ str_replace('_',' ', $ticket->estado->value) }}
            </span>
            <span class="px-2 py-1 rounded-2xl text-xs font-medium {{ match($ticket->prioridad->value){ 'alta' => 'bg-red-100 text-red-800', 'media' => 'bg-yellow-100 text-yellow-800', 'baja' => 'bg-gray-100 text-gray-800', default => '' } }}">
                {{ $ticket->prioridad->value }}
            </span>
            @if($ticket->estado->value !== 'cerrado')
                <button wire:click="closeTicket" class="px-3 py-1 bg-[#d9491e] text-white rounded-2xl shadow">Cerrar</button>
            @endif
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-2xl shadow p-6 transition hover:shadow-lg">
            <h2 class="font-semibold mb-2">Descripción</h2>
            <p class="text-gray-700 whitespace-pre-wrap">{{ $ticket->descripcion }}</p>
        </div>
    <div class="bg-white rounded-2xl shadow p-6 transition hover:shadow-lg">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold">Cliente</h2>
                <button wire:click="editClienteToggle" class="text-sm text-[#d9491e] hover:underline">{{ $editCliente ? 'Cancelar' : 'Editar' }}</button>
            </div>
            @if(!$editCliente)
                <dl class="text-sm">
                    <div class="flex justify-between py-1">
                        <dt class="text-gray-500">Nombre</dt>
                        <dd class="font-medium">{{ $ticket->cliente->nombre }}</dd>
                    </div>
                    <div class="flex justify-between py-1">
                        <dt class="text-gray-500">Email</dt>
                        <dd class="font-medium">{{ $ticket->cliente->email }}</dd>
                    </div>
                    <div class="flex justify-between py-1">
                        <dt class="text-gray-500">Teléfono</dt>
                        <dd class="font-medium">{{ $ticket->cliente->telefono ?? '—' }}</dd>
                    </div>
                </dl>
            @else
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm">Nombre</label>
                        <input type="text" wire:model.defer="clienteNombre" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]" />
                        @error('clienteNombre') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Email</label>
                        <input type="email" wire:model.defer="clienteEmail" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]" />
                        @error('clienteEmail') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Teléfono</label>
                        <input type="text" wire:model.defer="clienteTelefono" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]" />
                        @error('clienteTelefono') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="text-right">
                        <button wire:click="updateCliente" class="px-3 py-2 bg-[#d9491e] text-white rounded-2xl shadow hover:opacity-95 transition">Guardar</button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="font-semibold mb-4">Timeline de comentarios</h2>
        <div class="space-y-4">
            @forelse($ticket->comentarios as $c)
                <div class="flex gap-3">
                    <div class="w-2 h-2 mt-2 rounded-full bg-[#d9491e]"></div>
                    <div class="flex-1">
                        <div class="text-sm text-gray-500">{{ $c->created_at->format('d/m/Y H:i') }} · {{ $c->empleado->name }}</div>
                        <div class="text-gray-800">{{ $c->comentario }}</div>
                    </div>
                </div>
            @empty
                <div class="text-gray-500">Sin comentarios aún.</div>
            @endforelse
        </div>

        @if($ticket->estado->value !== 'cerrado')
        <form wire:submit.prevent="addComment" class="mt-6">
            <textarea rows="3" wire:model="comentario" class="w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]" placeholder="Agregar comentario..."></textarea>
            @error('comentario') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
            <div class="text-right mt-2">
                <button class="px-4 py-2 bg-[#d9491e] text-white rounded-2xl shadow">Agregar</button>
            </div>
        </form>
        @endif
    </div>
</div>
