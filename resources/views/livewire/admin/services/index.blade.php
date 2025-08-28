<div class="p-4 sm:p-6 space-y-6" x-data="{ search: '' }">
    @if (session('status'))
        <div class="rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 flex items-center gap-2">
            <flux:icon name="check" class="h-4 w-4" />
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- Header -->
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100">Servicios</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Listado de servicios ofrecidos.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#021869] hover:bg-[#021869]/90 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors">
                <flux:icon name="plus" class="h-4 w-4" /> Nuevo
            </a>
        </div>
    </div>

    <!-- Filtros -->
    <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-5">
        <div class="sm:col-span-2 lg:col-span-2">
            <label class="sr-only" for="search">Buscar</label>
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400">
                    <flux:icon name="magnifying-glass" class="h-4 w-4" />
                </span>
                <input id="search" type="text" wire:model.live.debounce.350ms="search" placeholder="Buscar por título..." class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 pl-9 pr-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
            </div>
        </div>
        <div>
            <label class="sr-only" for="status">Estado</label>
            <select id="status" wire:model.live="status" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                <option value="">Todos</option>
                <option value="1">Activos</option>
                <option value="0">Inactivos</option>
            </select>
        </div>
        <div>
            <label class="sr-only" for="perPage">Por página</label>
            <select id="perPage" wire:model.live="perPage" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    <!-- Tabla -->
    <div class="overflow-hidden rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white dark:bg-zinc-900/60 backdrop-blur supports-[backdrop-filter]:bg-white/70 dark:supports-[backdrop-filter]:bg-zinc-900/50 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-sm">
                <thead>
                    <tr class="bg-zinc-50 dark:bg-zinc-800/70 text-xs uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                        <th class="px-4 py-3 text-left font-medium">
                            <button type="button" wire:click="sortBy('title')" class="inline-flex items-center gap-1 group">
                                <span>Título</span>
                                <span class="text-zinc-400 group-hover:text-zinc-600 dark:group-hover:text-zinc-300">
                                    @if($sortField === 'title')
                                        <flux:icon name="chevron-{{ $sortDirection === 'asc' ? 'up' : 'down' }}" class="h-3.5 w-3.5" />
                                    @else
                                        <flux:icon name="chevron-up-down" class="h-3.5 w-3.5" />
                                    @endif
                                </span>
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left font-medium">
                            <button type="button" wire:click="sortBy('is_active')" class="inline-flex items-center gap-1 group">
                                <span>Estado</span>
                                <span class="text-zinc-400 group-hover:text-zinc-600 dark:group-hover:text-zinc-300">
                                    @if($sortField === 'is_active')
                                        <flux:icon name="chevron-{{ $sortDirection === 'asc' ? 'up' : 'down' }}" class="h-3.5 w-3.5" />
                                    @else
                                        <flux:icon name="chevron-up-down" class="h-3.5 w-3.5" />
                                    @endif
                                </span>
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left font-medium w-40">
                            <button type="button" wire:click="sortBy('created_at')" class="inline-flex items-center gap-1 group">
                                <span>Fecha</span>
                                <span class="text-zinc-400 group-hover:text-zinc-600 dark:group-hover:text-zinc-300">
                                    @if($sortField === 'created_at')
                                        <flux:icon name="chevron-{{ $sortDirection === 'asc' ? 'up' : 'down' }}" class="h-3.5 w-3.5" />
                                    @else
                                        <flux:icon name="chevron-up-down" class="h-3.5 w-3.5" />
                                    @endif
                                </span>
                            </button>
                        </th>
                        <th class="px-4 py-3 text-right font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800/70">
                    @forelse($services as $service)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex flex-col">
                                    <span class="font-medium text-zinc-800 dark:text-zinc-100">{{ $service->title }}</span>
                                    <span class="text-[11px] text-zinc-500 dark:text-zinc-400 mt-0.5">ID #{{ $service->id }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[11px] font-medium {{ $service->is_active ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-300' : 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300' }}">
                                    {{ $service->is_active ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-zinc-500 dark:text-zinc-400 text-xs">
                                {{ $service->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 text-right space-x-3">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline font-medium">Editar</a>
                                <button type="button" wire:click="confirmDelete({{ $service->id }})" class="text-red-600 hover:text-red-500 font-medium">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-10 text-center text-sm text-zinc-500 dark:text-zinc-400">No hay servicios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-zinc-200 dark:border-zinc-700/60 bg-zinc-50/60 dark:bg-zinc-800/40 px-4 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="text-xs text-zinc-500 dark:text-zinc-400">Mostrando {{ $services->firstItem() }}-{{ $services->lastItem() }} de {{ $services->total() }}</div>
            <div>{{ $services->onEachSide(1)->links() }}</div>
        </div>
    </div>

    <!-- Modal Confirmación -->
    <div x-cloak x-data @keydown.escape.window="$wire.cancelDelete()">
        @if($showDeleteModal)
            <div class="fixed inset-0 z-40 flex items-end sm:items-center justify-center">
                <div class="fixed inset-0 bg-zinc-900/50 backdrop-blur-sm" aria-hidden="true" wire:click="cancelDelete"></div>
                <div class="relative w-full sm:max-w-md mx-auto bg-white dark:bg-zinc-900 rounded-xl shadow-xl border border-zinc-200 dark:border-zinc-700 p-6 m-4 animate-fade-in-up">
                    <div class="flex items-start gap-4">
                        <div class="h-10 w-10 flex items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-300">
                            <flux:icon name="trash" class="h-5 w-5" />
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-zinc-800 dark:text-zinc-100">Eliminar servicio</h3>
                            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Esta acción no se puede deshacer. ¿Deseas continuar?</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-end gap-3">
                        <button type="button" wire:click="cancelDelete" class="inline-flex justify-center rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-800/60">Cancelar</button>
                        <button type="button" wire:click="deleteConfirmed" class="inline-flex justify-center rounded-lg bg-red-600 hover:bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm">Eliminar</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Notificación dinámica -->
    <div x-data="{show:false,message:'',type:'success'}" x-show="show" x-transition.opacity.duration.300ms @notify.window="message=$event.detail.message; type=$event.detail.type || 'success'; show=true; setTimeout(()=>show=false,4000)" class="fixed bottom-4 right-4 z-50 w-72 rounded-lg border px-4 py-3 text-sm shadow-lg"
         :class="type==='success' ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : (type==='error' ? 'bg-red-50 border-red-200 text-red-700' : 'bg-zinc-50 border-zinc-200 text-zinc-700')">
        <div class="flex items-start gap-2">
            <flux:icon name="check" class="h-4 w-4" x-show="type==='success'" />
            <flux:icon name="x-mark" class="h-4 w-4" x-show="type==='error'" />
            <span x-text="message" class="flex-1"></span>
            <button @click="show=false" class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300">&times;</button>
        </div>
    </div>
</div>
