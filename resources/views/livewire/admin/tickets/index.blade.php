<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">Tickets</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Gestión de solicitudes de soporte.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tickets.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-tr from-[#d9491e] to-[#e25a2f] hover:from-[#d9491e]/90 hover:to-[#e25a2f]/90 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition">
                <flux:icon name="plus" class="h-4 w-4" /> Nuevo ticket
            </a>
        </div>
    </div>

    <!-- Filters Bar -->
    <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur p-4 sm:p-5 flex flex-col lg:flex-row gap-4 lg:items-end lg:flex-wrap">
        <div class="flex-1 min-w-[220px]">
            <label class="text-[11px] font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Buscar</label>
            <div class="mt-1 relative">
                <input type="text" wire:model.live.debounce.350ms="q" placeholder="Título o descripción..." class="w-full rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-950/40 px-3 py-2.5 text-sm focus:border-[#d9491e] focus:ring-2 focus:ring-[#d9491e]/30" />
                @if($q !== '')
                    <button type="button" wire:click="$set('q','')" class="absolute inset-y-0 right-2 flex items-center text-zinc-400 hover:text-zinc-600 text-xs">✕</button>
                @endif
            </div>
        </div>
        <div class="min-w-[180px]">
            <label class="text-[11px] font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Cliente</label>
            <select wire:model.live="cliente" class="mt-1 w-full rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-950/40 px-3 py-2.5 text-sm focus:border-[#d9491e] focus:ring-2 focus:ring-[#d9491e]/30">
                <option value="">Todos</option>
                @foreach($clientes as $c)
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="min-w-[160px]">
            <label class="text-[11px] font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Estado</label>
            <select wire:model.live="estado" class="mt-1 w-full rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-950/40 px-3 py-2.5 text-sm focus:border-[#d9491e] focus:ring-2 focus:ring-[#d9491e]/30">
                <option value="">Todos</option>
                @foreach($estados as $e)
                    <option value="{{ $e }}" class="capitalize">{{ str_replace('_',' ', $e) }}</option>
                @endforeach
            </select>
        </div>
        <div class="min-w-[160px]">
            <label class="text-[11px] font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Prioridad</label>
            <select wire:model.live="prioridad" class="mt-1 w-full rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-950/40 px-3 py-2.5 text-sm focus:border-[#d9491e] focus:ring-2 focus:ring-[#d9491e]/30">
                <option value="">Todas</option>
                @foreach($prioridades as $p)
                    <option value="{{ $p }}" class="capitalize">{{ $p }}</option>
                @endforeach
            </select>
        </div>
        <div class="min-w-[120px]">
            <label class="text-[11px] font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Mostrar</label>
            <select wire:model.live="perPage" class="mt-1 w-full rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-950/40 px-3 py-2.5 text-sm focus:border-[#d9491e] focus:ring-2 focus:ring-[#d9491e]/30">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-zinc-50/80 dark:bg-zinc-800/60 text-[11px] uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                <tr>
                    <th class="px-4 py-3 text-left cursor-pointer select-none" wire:click="sortBy('titulo')">Título
                        @if($sortField==='titulo')<span class="inline-block ml-1">{{ $sortDirection==='asc'?'▲':'▼' }}</span>@endif
                    </th>
                    <th class="px-4 py-3 text-left">Cliente</th>
                    <th class="px-4 py-3 text-left cursor-pointer select-none" wire:click="sortBy('estado')">Estado
                        @if($sortField==='estado')<span class="inline-block ml-1">{{ $sortDirection==='asc'?'▲':'▼' }}</span>@endif
                    </th>
                    <th class="px-4 py-3 text-left cursor-pointer select-none" wire:click="sortBy('prioridad')">Prioridad
                        @if($sortField==='prioridad')<span class="inline-block ml-1">{{ $sortDirection==='asc'?'▲':'▼' }}</span>@endif
                    </th>
                    <th class="px-4 py-3 text-right cursor-pointer select-none" wire:click="sortBy('created_at')">Creado
                        @if($sortField==='created_at')<span class="inline-block ml-1">{{ $sortDirection==='asc'?'▲':'▼' }}</span>@endif
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100/70 dark:divide-zinc-800">
                @forelse($tickets as $t)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition">
                        <td class="px-4 py-3 align-top">
                            <a href="{{ route('admin.tickets.show', $t->id) }}" class="font-medium text-zinc-800 dark:text-zinc-100 hover:text-[#d9491e] line-clamp-2">{{ $t->titulo }}</a>
                            <div class="mt-1 text-[11px] text-zinc-500 dark:text-zinc-400 line-clamp-2">{{ Str::limit($t->descripcion, 110) }}</div>
                        </td>
                        <td class="px-4 py-3 align-top">
                            <div class="font-medium text-zinc-700 dark:text-zinc-200">{{ $t->cliente->nombre }}</div>
                            <div class="text-[11px] text-zinc-400">ID #{{ $t->cliente_id }}</div>
                        </td>
                        <td class="px-4 py-3 align-top">
                            <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[11px] font-medium ring-1 ring-inset {{ match($t->estado->value){ 'abierto' => 'bg-orange-50 text-orange-700 ring-orange-600/20', 'en_progreso' => 'bg-blue-50 text-blue-700 ring-blue-600/20', 'cerrado' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20', default => 'bg-zinc-100 text-zinc-700 ring-zinc-600/20' } }}">
                                {{ str_replace('_',' ', $t->estado->value) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 align-top">
                            <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[11px] font-medium ring-1 ring-inset {{ match($t->prioridad->value){ 'alta' => 'bg-red-50 text-red-700 ring-red-600/20', 'media' => 'bg-yellow-50 text-yellow-700 ring-yellow-600/20', 'baja' => 'bg-zinc-100 text-zinc-700 ring-zinc-600/20', default => 'bg-zinc-100 text-zinc-700 ring-zinc-600/20' } }}">
                                {{ $t->prioridad->value }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right text-[11px] text-zinc-500 dark:text-zinc-400 align-top whitespace-nowrap">{{ $t->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-12 text-center text-sm text-zinc-500 dark:text-zinc-400">Sin resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-zinc-200/70 dark:border-zinc-700/60 bg-zinc-50/50 dark:bg-zinc-800/50">
            {{ $tickets->onEachSide(1)->links() }}
        </div>
    </div>
</div>
