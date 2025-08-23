<div>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Tickets</h1>
        <a href="{{ route('admin.tickets.create') }}" class="px-4 py-2 bg-[#d9491e] text-white rounded-2xl shadow hover:opacity-90">Nuevo ticket</a>
    </div>

    <div class="grid gap-4 md:grid-cols-4 mb-6">
        <div>
            <label class="text-sm">Cliente</label>
            <select wire:model.live="cliente" class="w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]">
                <option value="">Todos</option>
                @foreach($clientes as $c)
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm">Estado</label>
            <select wire:model.live="estado" class="w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]">
                <option value="">Todos</option>
                @foreach($estados as $e)
                    <option value="{{ $e }}" class="capitalize">{{ str_replace('_',' ', $e) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm">Prioridad</label>
            <select wire:model.live="prioridad" class="w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]">
                <option value="">Todas</option>
                @foreach($prioridades as $p)
                    <option value="{{ $p }}" class="capitalize">{{ $p }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm">Buscar</label>
            <input type="text" wire:model.live.debounce.300ms="q" placeholder="título o descripción" class="w-full rounded-2xl border-gray-300 focus:ring-[#d9491e]" />
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow transition hover:shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prioridad</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($tickets as $t)
                    <tr class="transition hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <div class="font-semibold">{{ $t->titulo }}</div>
                            <div class="text-xs text-gray-500">Creado {{ $t->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-4 py-3">{{ $t->cliente->nombre }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-2xl text-xs font-medium {{ match($t->estado->value){ 'abierto' => 'bg-orange-100 text-orange-800', 'en_progreso' => 'bg-blue-100 text-blue-800', 'cerrado' => 'bg-green-100 text-green-800', default => '' } }}">
                                {{ str_replace('_',' ', $t->estado->value) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-2xl text-xs font-medium {{ match($t->prioridad->value){ 'alta' => 'bg-red-100 text-red-800', 'media' => 'bg-yellow-100 text-yellow-800', 'baja' => 'bg-gray-100 text-gray-800', default => '' } }}">
                                {{ $t->prioridad->value }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.tickets.show', $t->id) }}" class="text-[#d9491e] hover:underline">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">Sin resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $tickets->links() }}</div>
    </div>
</div>
