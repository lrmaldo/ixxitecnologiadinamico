<div>
    <div class="max-w-6xl mx-auto p-4 sm:p-6 space-y-8">
        <!-- Header -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">{{ $alliance ? 'Editar alianza' : 'Nueva alianza' }}</h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Gestiona los logos y datos de las empresas aliadas</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.alliances.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-800/60 transition">Cancelar</a>
                <button form="allianceForm"
                        class="inline-flex items-center gap-2 rounded-lg bg-[#204369] hover:bg-[#17314a] px-5 py-2.5 text-sm font-medium text-white shadow-sm transition disabled:opacity-60 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled"
                        wire:target="logo,save"
                >
                    Guardar
                </button>
            </div>
        </div>

        <form id="allianceForm" wire:submit.prevent="save" class="grid gap-6 lg:grid-cols-3">
            <!-- Main column -->
            <div class="lg:col-span-2 space-y-6">
                <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur p-6 shadow-sm space-y-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Nombre de la alianza</label>
                        <input type="text" wire:model.live="name" placeholder="Ej: Empresa ABC" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-[#204369] focus:ring-2 focus:ring-[#204369]/30" />
                        @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">URL del sitio web</label>
                        <input type="url" wire:model.live="url" placeholder="https://ejemplo.com" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-[#204369] focus:ring-2 focus:ring-[#204369]/30" />
                        @error('url')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Descripción</label>
                            <span class="text-[11px] text-zinc-400">{{ strlen($description ?? '') }} caracteres</span>
                        </div>
                        <textarea wire:model.live.debounce.400ms="description" rows="4" placeholder="Breve descripción de la alianza..." class="rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-3 text-sm leading-relaxed focus:border-[#204369] focus:ring-2 focus:ring-[#204369]/30"></textarea>
                        @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Preview Panel -->
                <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-900/70 p-6 shadow-sm space-y-5">
                    <h3 class="text-sm font-semibold text-zinc-700 dark:text-zinc-200 mb-4 flex items-center gap-2">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#C8DBEF] text-[#204369] text-xs">PR</span>
                        Vista previa
                    </h3>
                    <div class="aspect-video w-full rounded-xl border border-dashed border-zinc-300 dark:border-zinc-700 flex items-center justify-center overflow-hidden bg-white dark:bg-zinc-800/40 p-4">
                        @if($logo)
                            <img src="{{ $logo->temporaryUrl() }}" class="max-h-full max-w-full object-contain" alt="Preview"/>
                        @elseif($logo_path)
                            <img src="{{ asset('storage/'.$logo_path) }}" class="max-h-full max-w-full object-contain" alt="Logo actual"/>
                        @else
                            <div class="text-xs text-zinc-400 flex flex-col items-center gap-2">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Sin logo seleccionado
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 space-y-2 text-xs text-zinc-500 dark:text-zinc-400">
                        <p><span class="font-medium">Ruta actual:</span> {{ $logo_path ?: '—' }}</p>
                        @if($logo)
                            <p class="text-emerald-600 dark:text-emerald-400">Archivo temporal listo para subir.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Upload -->
                <div
                    x-data="dragUpload({ livewire:$wire })"
                    x-on:dragover.prevent="hover=true"
                    x-on:dragleave.prevent="hover=false"
                    x-on:drop.prevent="handleDrop($event)"
                    class="rounded-2xl min-h-[220px] border-2 border-dashed flex flex-col items-center justify-center text-center p-6 transition relative overflow-hidden"
                    x-bind:class="hover ? 'border-[#204369] bg-[#204369]/5 scale-[1.015]' : 'border-zinc-300 dark:border-zinc-600 bg-white/70 dark:bg-zinc-900/50'"
                >
                    <input type="file" wire:model="logo" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" @change="manualSelect($event)" />
                    <div class="flex flex-col items-center" x-show="!uploading" x-transition.opacity>
                        <svg class="h-8 w-8 text-[#204369] mb-3 transition-transform" x-bind:class="hover ? 'animate-bounce' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Arrastra un logo</p>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">o haz clic para seleccionar</p>
                        <p class="mt-3 text-[11px] text-zinc-400">(Máx 4MB, JPG/PNG/WebP/SVG)</p>
                        @error('logo')<p class="mt-2 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <!-- Overlay Uploading -->
                    <div x-show="uploading" x-transition.opacity class="absolute inset-0 flex flex-col items-center justify-center gap-4 bg-zinc-900/70 backdrop-blur-sm text-white" x-cloak>
                        <div class="flex flex-col items-center gap-3">
                            <div class="relative h-12 w-12">
                                <div class="absolute inset-0 rounded-full border-4 border-[#204369]/30"></div>
                                <div class="absolute inset-0 rounded-full border-4 border-[#204369] border-t-transparent animate-spin"></div>
                            </div>
                            <p class="text-sm font-medium">Subiendo logo...</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur p-6 shadow-sm space-y-5">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Ruta manual</label>
                        <input type="text" wire:model.live="logo_path" placeholder="storage/alliances/..." class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-[#204369] focus:ring-2 focus:ring-[#204369]/30" />
                        @error('logo_path')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Activo</span>
                            <span class="text-[11px] text-zinc-400">Visibilidad pública</span>
                        </div>
                        <button type="button" wire:click="$set('is_active', !is_active)" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors {{ $is_active ? 'bg-emerald-500' : 'bg-zinc-300 dark:bg-zinc-700' }} focus:outline-none focus-visible:ring-2 focus-visible:ring-[#204369]/50">
                            <span class="inline-block h-5 w-5 transform rounded-full bg-white dark:bg-zinc-200 shadow ring-0 transition {{ $is_active ? 'translate-x-5' : 'translate-x-1' }}"></span>
                        </button>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Posición preferida</label>
                        <input type="number" wire:model.live="position" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-[#204369] focus:ring-2 focus:ring-[#204369]/30 w-32" />
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div class="flex flex-col gap-1 rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 p-3">
                            <span class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Creado</span>
                            <span class="text-zinc-700 dark:text-zinc-300">{{ $alliance?->created_at?->format('d/m/Y') ?? '—' }}</span>
                        </div>
                        <div class="flex flex-col gap-1 rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 p-3">
                            <span class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Actualizado</span>
                            <span class="text-zinc-700 dark:text-zinc-300">{{ $alliance?->updated_at?->format('d/m/Y') ?? '—' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Script para drag & drop -->
        <script>
            function dragUpload({livewire}) {
                return {
                    hover:false,
                    uploading:false,
                    init(){
                        window.addEventListener('livewire-upload-start', ()=>{ this.uploading=true; });
                        window.addEventListener('livewire-upload-finish', ()=>{ this.uploading=false; });
                        window.addEventListener('livewire-upload-error', ()=>{ this.uploading=false; });
                    },
                    manualSelect(e){},
                    handleDrop(e){
                        this.hover=false;
                        if(e.dataTransfer.files && e.dataTransfer.files[0]){
                            const file = e.dataTransfer.files[0];
                            this.uploading=true;
                            livewire.upload('logo', file, ()=>{ this.uploading=false; }, ()=>{ this.uploading=false; });
                        }
                    }
                }
            }
        </script>
    </div>
</div>
