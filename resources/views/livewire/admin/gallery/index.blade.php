<div class="p-4 sm:p-6 space-y-8">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">Galería</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Administración de imágenes y recursos visuales.</p>
        </div>
        <div class="flex items-center gap-3 flex-wrap">
            <button type="button" wire:click="toggleReorder" class="inline-flex items-center gap-2 rounded-lg border {{ $reorderMode ? 'border-amber-400 bg-amber-50 text-amber-700 dark:border-amber-500/40 dark:bg-amber-900/30 dark:text-amber-300' : 'border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-200 bg-white dark:bg-zinc-900' }} px-4 py-2.5 text-sm font-medium shadow-sm transition">
                <flux:icon name="arrows-up-down" class="h-4 w-4" /> {{ $reorderMode ? 'Cancelar orden' : 'Reordenar' }}
            </button>
            @if($reorderMode)
                <button type="button" wire:click="saveOrder" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 hover:bg-emerald-500 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition">
                    <flux:icon name="check" class="h-4 w-4" /> Guardar orden
                </button>
            @endif
            @if(!$reorderMode)
                <div class="flex items-center gap-2">
                    <label class="flex items-center gap-2 text-xs font-medium text-zinc-600 dark:text-zinc-400">
                        <input type="checkbox" wire:model.live="selectAll" class="rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                        Seleccionar página
                    </label>
                    @if(count($selected))
                        <button type="button" wire:click="confirmBulkDelete" class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 hover:bg-red-500 px-3 py-2 text-xs font-semibold text-white shadow-sm">
                            <flux:icon name="trash" class="h-3.5 w-3.5" /> Eliminar ({{ count($selected) }})
                        </button>
                        <button type="button" wire:click="clearSelection" class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-300 dark:border-zinc-600 px-3 py-2 text-xs font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-800/60">
                            Limpiar
                        </button>
                    @endif
                </div>
            @endif
            <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-tr from-[#021869] to-[#14317F] hover:from-[#021869]/90 hover:to-[#14317F]/90 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition">Nueva imagen</a>
        </div>
    </div>

    <!-- Filtros -->
    <div class="grid gap-4 md:grid-cols-6">
        <div class="md:col-span-2">
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400">
                    <flux:icon name="magnifying-glass" class="h-4 w-4" />
                </span>
                <input type="text" wire:model.live.debounce.350ms="search" placeholder="Buscar título o descripción..." class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 pl-9 pr-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
            </div>
        </div>
        <div>
            <select wire:model.live="status" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                <option value="">Todas</option>
                <option value="1">Activas</option>
                <option value="0">Inactivas</option>
            </select>
        </div>
        <div>
            <select wire:model.live="sortField" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                <option value="created_at">Fecha</option>
                <option value="title">Título</option>
                <option value="position">Posición</option>
                <option value="is_active">Estado</option>
            </select>
        </div>
        <div>
            <select wire:model.live="sortDirection" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                <option value="desc">Desc</option>
                <option value="asc">Asc</option>
            </select>
        </div>
        <div>
            <select wire:model.live="perPage" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                <option value="12">12</option>
                <option value="24">24</option>
                <option value="36">36</option>
                <option value="48">48</option>
            </select>
        </div>
    </div>

    <!-- Grid -->
    <div
        x-data="galleryReorder({ livewire: @this, enable: {{ $reorderMode ? 'true':'false' }} })"
        x-init="init()"
        :class="enable ? 'opacity-100' : 'opacity-100'"
        class="grid gap-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-6"
    >
        @forelse($items as $img)
            <div
                class="group relative rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/50 shadow-sm overflow-hidden flex flex-col"
                :class="enable ? 'ring-1 ring-amber-400/40 cursor-move' : ''"
                x-bind:data-id="{{ $img->id }}"
                x-ref="card-{{ $img->id }}"
                draggable="{{ $reorderMode ? 'true':'false' }}"
                @dragstart="dragStart($event, {{ $img->id }})"
                @dragover.prevent="dragOver($event, {{ $img->id }})"
                @drop.prevent="drop($event, {{ $img->id }})"
            >
                <div class="aspect-video w-full overflow-hidden">
                    <img src="{{ asset('storage/'.$img->image_path) }}" alt="{{ $img->title }}" class="h-full w-full object-cover transition group-hover:scale-105 duration-300 select-none pointer-events-none">
                    @if($reorderMode)
                        <div class="absolute inset-0 bg-amber-500/0 group-hover:bg-amber-500/10 transition"></div>
                        <div class="absolute top-2 left-2 inline-flex items-center gap-1 rounded-md bg-amber-500/90 text-white px-2 py-0.5 text-[10px] font-semibold shadow">
                            <flux:icon name="bars-3" class="h-3.5 w-3.5" /> Mover
                        </div>
                    @elseif(!$reorderMode)
                        <div class="absolute top-2 left-2">
                            <input type="checkbox" wire:click="toggleSelection({{ $img->id }})" @checked(in_array($img->id,$selected)) class="h-4 w-4 rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500 bg-white/90 backdrop-blur" />
                        </div>
                    @endif
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="text-sm font-medium text-zinc-800 dark:text-zinc-100 line-clamp-2">{{ $img->title }}</h3>
                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-semibold {{ $img->is_active ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-300' : 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300' }}">{{ $img->is_active ? 'Activo' : 'Inactivo' }}</span>
                    </div>
                    <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400 line-clamp-3">{{ $img->description }}</p>
                    <div class="mt-4 flex items-center justify-between text-[11px] text-zinc-400">
                        <span>#{{ $img->id }} @if($reorderMode && $img->position) · Pos {{ $img->position }} @endif</span>
                        <span>{{ $img->created_at?->format('d/m/Y') }}</span>
                    </div>
                </div>
                <div class="px-4 pb-4 flex flex-wrap items-center gap-2 justify-start" x-show="!enable">
                    <a href="{{ route('admin.gallery.edit', $img->id) }}" class="inline-flex items-center gap-1.5 rounded-lg bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700 px-3 py-1.5 text-xs font-medium text-zinc-700 dark:text-zinc-200 transition shrink-0 whitespace-nowrap">
                        <flux:icon name="pencil" class="h-3.5 w-3.5" /> Editar
                    </a>
                    <button type="button" wire:click="confirmDelete({{ $img->id }})" class="inline-flex items-center gap-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 dark:bg-red-900/30 dark:text-red-300 dark:hover:bg-red-900/40 px-3 py-1.5 text-xs font-medium transition shrink-0 whitespace-nowrap">
                        <flux:icon name="trash" class="h-3.5 w-3.5" /> Eliminar
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 flex flex-col items-center justify-center text-sm text-zinc-500 dark:text-zinc-400">
                <flux:icon name="photo" class="h-10 w-10 text-zinc-300 dark:text-zinc-700 mb-4" />
                No se encontraron imágenes
            </div>
        @endforelse
    </div>

    <!-- Footer paginación -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="text-xs text-zinc-500 dark:text-zinc-400">Mostrando {{ $items->firstItem() }}-{{ $items->lastItem() }} de {{ $items->total() }}</div>
        <div>{{ $items->onEachSide(1)->links() }}</div>
    </div>

    <!-- Modal eliminar -->
    @if($showDeleteModal)
        <div class="fixed inset-0 z-40 flex items-end sm:items-center justify-center">
            <div class="fixed inset-0 bg-zinc-900/50 backdrop-blur-sm" wire:click="cancelDelete"></div>
            <div class="relative w-full sm:max-w-md mx-auto bg-white dark:bg-zinc-900 rounded-xl shadow-xl border border-zinc-200 dark:border-zinc-700 p-6 m-4 animate-fade-in-up">
                <div class="flex items-start gap-4">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-300">
                        <flux:icon name="trash" class="h-5 w-5" />
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-semibold text-zinc-800 dark:text-zinc-100">Eliminar imagen</h3>
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

    <!-- Notificación -->
    <div x-data="{show:false,message:'',type:'success'}" x-show="show" x-transition.opacity.duration.300ms @notify.window="message=$event.detail.message; type=$event.detail.type || 'success'; show=true; setTimeout(()=>show=false,3500)" class="fixed bottom-4 right-4 z-50 w-72 rounded-lg border px-4 py-3 text-sm shadow-lg"
         :class="type==='success' ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : (type==='error' ? 'bg-red-50 border-red-200 text-red-700' : 'bg-zinc-50 border-zinc-200 text-zinc-700')">
        <div class="flex items-start gap-2">
            <flux:icon name="check" class="h-4 w-4" x-show="type==='success'" />
            <flux:icon name="x-mark" class="h-4 w-4" x-show="type==='error'" />
            <span x-text="message" class="flex-1"></span>
            <button @click="show=false" class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300">&times;</button>
        </div>
    </div>
</div>

<script>
    function galleryReorder({ livewire, enable }) {
        return {
            enable: enable,
            draggingId: null,
            order: [],
            init() {
                this.refreshOrder();
                this.$watch('enable', (val)=>{ if(val){ this.refreshOrder(); }});
            },
            refreshOrder(){
                this.order = Array.from(this.$el.querySelectorAll('[x-ref^=\'card-\']'))
                    .map(el => parseInt(el.getAttribute('data-id')));
            },
            dragStart(e,id){ if(!this.enable) return; this.draggingId = id; e.dataTransfer.effectAllowed='move'; },
            dragOver(e,id){ if(!this.enable || this.draggingId===id) return; const draggingEl = this.$el.querySelector('[data-id="'+this.draggingId+'"]'); const targetEl = this.$el.querySelector('[data-id="'+id+'"]'); const rect = targetEl.getBoundingClientRect(); const after = (e.clientY - rect.top) > rect.height/2; if(after){ targetEl.after(draggingEl); } else { targetEl.before(draggingEl); } },
            drop(e,id){ if(!this.enable) return; this.refreshOrder(); livewire.call('syncOrder', {order: this.order}); },
        }
    }
</script>
