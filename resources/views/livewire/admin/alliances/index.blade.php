<div>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
        <!-- Header -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">Alianzas</h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Gestiona los logos de empresas aliadas</p>
            </div>
            <a href="{{ route('admin.alliances.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#204369] hover:bg-[#17314a] px-5 py-2.5 text-sm font-medium text-white shadow-sm transition">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nueva alianza
            </a>
        </div>

        <!-- Search and filters -->
        <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur p-6 shadow-sm">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar alianzas..." class="w-full pl-10 pr-4 py-2.5 border border-zinc-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-900 text-sm focus:ring-2 focus:ring-[#204369] focus:border-transparent"/>
                </div>
            </div>
        </div>

        <!-- Flash messages -->
        @if (session()->has('status'))
            <div class="rounded-xl bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 p-4">
                <p class="text-sm text-emerald-800 dark:text-emerald-200">{{ session('status') }}</p>
            </div>
        @endif

        <!-- Table -->
        <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-zinc-50 dark:bg-zinc-800/50 border-b border-zinc-200 dark:border-zinc-700">
                        <tr>
                            <th class="px-6 py-4 text-left">
                                <button wire:click="sortBy('position')" class="flex items-center gap-1 font-medium text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-zinc-100">
                                    Pos.
                                    @if($sortBy === 'position')
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}"/>
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-4 text-left">Logo</th>
                            <th class="px-6 py-4 text-left">
                                <button wire:click="sortBy('name')" class="flex items-center gap-1 font-medium text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-zinc-100">
                                    Nombre
                                    @if($sortBy === 'name')
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}"/>
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-4 text-left">URL</th>
                            <th class="px-6 py-4 text-left">Estado</th>
                            <th class="px-6 py-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                        @forelse($alliances as $alliance)
                            <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/30 transition-colors">
                                <td class="px-6 py-4 text-zinc-600 dark:text-zinc-400">{{ $alliance->position }}</td>
                                <td class="px-6 py-4">
                                    @if($alliance->logo_path)
                                        <img src="{{ asset('storage/'.$alliance->logo_path) }}" alt="{{ $alliance->name }}" class="h-12 w-auto object-contain rounded border border-zinc-200 dark:border-zinc-700 bg-white p-1"/>
                                    @else
                                        <div class="h-12 w-16 bg-zinc-100 dark:bg-zinc-800 rounded flex items-center justify-center">
                                            <svg class="h-6 w-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-zinc-900 dark:text-zinc-100">{{ $alliance->name }}</div>
                                    @if($alliance->description)
                                        <div class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 line-clamp-1">{{ $alliance->description }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($alliance->url)
                                        <a href="{{ $alliance->url }}" target="_blank" class="text-[#204369] hover:underline text-xs">
                                            {{ Str::limit($alliance->url, 30) }}
                                        </a>
                                    @else
                                        <span class="text-zinc-400 text-xs">—</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click="toggleActive({{ $alliance->id }})" class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium {{ $alliance->is_active ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-400' }}">
                                        {{ $alliance->is_active ? 'Activo' : 'Inactivo' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.alliances.edit', $alliance) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-200 dark:hover:bg-zinc-700 text-xs font-medium transition">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Editar
                                        </a>
                                        <button wire:click="delete({{ $alliance->id }})" wire:confirm="¿Eliminar esta alianza?" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50 text-xs font-medium transition">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="h-12 w-12 text-zinc-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                        <p class="text-zinc-600 dark:text-zinc-400 mb-2">No hay alianzas registradas</p>
                                        <a href="{{ route('admin.alliances.create') }}" class="text-[#204369] hover:underline text-sm">Crear la primera alianza</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($alliances->hasPages())
            <div class="mt-6">
                {{ $alliances->links() }}
            </div>
        @endif
    </div>
</div>
