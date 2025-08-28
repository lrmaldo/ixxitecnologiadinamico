<div class="p-4 sm:p-6 space-y-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">{{ $service ? 'Editar servicio' : 'Nuevo servicio' }}</h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Completa la información para el catálogo.</p>
            </div>
            <div class="flex items-center gap-3 flex-wrap">
                <a href="{{ route('admin.services') }}" wire:navigate class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-white/70 dark:bg-zinc-800/60 hover:bg-zinc-100 dark:hover:bg-zinc-700/60 backdrop-blur transition-colors shadow-sm">Cancelar</a>
                <button form="service-form" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-tr from-[#021869] to-[#133184] hover:from-[#021869]/90 hover:to-[#133184]/90 px-5 py-2.5 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500/70 dark:focus:ring-indigo-400/60 transition-all">Guardar</button>
            </div>
        </div>

        <form id="service-form" wire:submit="save" class="grid grid-cols-1 gap-10 xl:gap-12 lg:grid-cols-3">
            <!-- Columna principal -->
            <div class="space-y-10 lg:col-span-2">
                <!-- Datos básicos -->
                <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-b from-white to-white/90 dark:from-zinc-900 dark:to-zinc-900/80 shadow-sm backdrop-blur-sm overflow-hidden">
                    <div class="px-6 pt-5 pb-4 border-b border-zinc-200/60 dark:border-zinc-700/60 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200 flex items-center gap-2">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-md bg-indigo-50 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-300 text-[11px] font-semibold">IG</span>
                            Información general
                        </h2>
                        <label class="inline-flex items-center gap-2 text-xs font-medium text-zinc-600 dark:text-zinc-400 select-none">
                            <input type="checkbox" wire:model.live="is_active" class="rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500/30" />
                            Activo
                        </label>
                    </div>
                    <div class="px-6 pb-7 pt-5 space-y-8">
                        <div class="grid gap-8 md:grid-cols-2">
                            <div class="space-y-1.5">
                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Título</label>
                                <input type="text" wire:model.live="title" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                                @error('title')<div class="text-xs text-red-500 font-medium">{{ $message }}</div>@enderror
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Resumen</label>
                                <input type="text" wire:model.live="summary" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Descripción</label>
                            <textarea wire:model.live="description" rows="6" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm leading-relaxed focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition"></textarea>
                        </div>
                        <div class="grid gap-8 md:grid-cols-2">
                            <div class="space-y-1.5">
                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Ícono</label>
                                <input type="text" wire:model.live="icon" placeholder="emoji o nombre" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">SEO Título</label>
                                <input type="text" wire:model.live="seo_title" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">SEO Descripción</label>
                            <textarea wire:model.live="seo_description" rows="3" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm leading-relaxed focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna lateral -->
            <div class="space-y-10">
                <!-- Imagen -->
                <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/90 dark:bg-zinc-900/70 backdrop-blur-sm shadow-sm overflow-hidden">
                    <div class="px-6 pt-5 pb-4 border-b border-zinc-200/60 dark:border-zinc-700/60">
                        <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200 flex items-center gap-2"><span class="inline-block h-2 w-2 rounded-full bg-indigo-500 animate-pulse"></span> Imagen</h2>
                    </div>
                    <div class="px-6 pb-7 pt-5 space-y-5">
                        <div class="space-y-1.5">
                            <input type="file" wire:model="image_file" accept="image/*" class="w-full rounded-lg border border-dashed border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                            @error('image_file')<div class="text-xs text-red-500 font-medium">{{ $message }}</div>@enderror
                        </div>
                        <div class="text-[11px] text-zinc-500 dark:text-zinc-400">O ruta existente</div>
                        <input type="text" wire:model.live="image_path" placeholder="storage/services/..." class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                        <div class="mt-2">
                            @if($image_file)
                                <img src="{{ $image_file->temporaryUrl() }}" class="h-44 w-full rounded-lg object-cover ring-1 ring-zinc-200/70 dark:ring-zinc-700/60" />
                            @elseif($image_path)
                                <img src="{{ asset('storage/'.$image_path) }}" class="h-44 w-full rounded-lg object-cover ring-1 ring-zinc-200/70 dark:ring-zinc-700/60" />
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/90 dark:bg-zinc-900/70 backdrop-blur-sm shadow-sm p-6 space-y-5">
                    <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Acciones</h2>
                    <div class="space-y-3">
                        <button type="submit" form="service-form" class="w-full inline-flex justify-center items-center gap-2 rounded-lg bg-[#021869] hover:bg-[#021869]/90 px-4 py-2.5 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-1 dark:focus:ring-offset-zinc-900 transition">
                            Guardar cambios
                        </button>
                        <a href="{{ route('admin.services') }}" wire:navigate class="w-full inline-flex justify-center items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2.5 text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-white/70 dark:bg-zinc-800/60 hover:bg-zinc-100 dark:hover:bg-zinc-700/50 transition">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
