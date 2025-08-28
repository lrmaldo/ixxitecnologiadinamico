<div class="max-w-6xl mx-auto p-4 sm:p-6 space-y-8">
    <!-- Encabezado -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">{{ $testimonial ? 'Editar testimonio' : 'Nuevo testimonio' }}</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Gestiona la opinión de un cliente o aliado.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.testimonials') }}" class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-800/60 transition">Cancelar</a>
            <button form="testimonialForm" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-tr from-[#021869] to-[#14317F] hover:from-[#021869]/90 hover:to-[#14317F]/90 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition">Guardar</button>
        </div>
    </div>

    <form id="testimonialForm" wire:submit.prevent="save" class="grid gap-6 lg:grid-cols-3">
        <!-- Panel principal -->
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/50 p-6 shadow-sm">
                <div class="grid gap-5 md:grid-cols-2">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Autor <span class="text-red-500">*</span></label>
                        <input type="text" wire:model.live="author_name" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" placeholder="Nombre completo" />
                        @error('author_name')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Cargo</label>
                        <input type="text" wire:model.live="author_role" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" placeholder="Ej: CTO, Manager" />
                    </div>
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Empresa</label>
                        <input type="text" wire:model.live="company" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" placeholder="Nombre de la empresa" />
                    </div>
                </div>
                <div class="mt-6 flex flex-col gap-1.5">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Contenido <span class="text-red-500">*</span></label>
                        <span class="text-[11px] text-zinc-400">{{ strlen($content) }} caracteres</span>
                    </div>
                    <textarea wire:model.live.debounce.400ms="content" rows="6" class="rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-3 text-sm leading-relaxed focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" placeholder="Escribe el testimonio..."></textarea>
                    @error('content')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Vista previa -->
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-900/70 p-6 shadow-sm">
                <h3 class="text-sm font-semibold text-zinc-700 dark:text-zinc-200 mb-4 flex items-center gap-2">
                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/40 dark:text-indigo-300 text-xs">PR</span>
                    Vista previa
                </h3>
                <blockquote class="text-sm text-zinc-600 dark:text-zinc-300 leading-relaxed">
                    “{{ $content ?: 'El texto del testimonio aparecerá aquí a medida que escribes.' }}”
                </blockquote>
                <div class="mt-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-800 dark:text-zinc-100">{{ $author_name ?: 'Autor' }}</p>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400">{{ $author_role ?: 'Cargo' }} @if($company) • {{ $company }} @endif</p>
                    </div>
                    <div class="flex items-center gap-0.5">
                        @for($i=1;$i<=5;$i++)
                            <svg class="h-4 w-4 {{ $i <= $rating ? 'text-amber-400' : 'text-zinc-300 dark:text-zinc-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/50 p-6 shadow-sm flex flex-col gap-6">
                <!-- Estado -->
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Estado</span>
                        <span class="text-[11px] text-zinc-400">Control de visibilidad</span>
                    </div>
                    <button type="button" wire:click="$set('is_active', !is_active)" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors {{ $is_active ? 'bg-emerald-500' : 'bg-zinc-300 dark:bg-zinc-700' }} focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/50">
                        <span class="inline-block h-5 w-5 transform rounded-full bg-white dark:bg-zinc-200 shadow ring-0 transition {{ $is_active ? 'translate-x-5' : 'translate-x-1' }}"></span>
                    </button>
                </div>

                <!-- Rating -->
                <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Rating</span>
                        <span class="text-[11px] text-zinc-400">{{ $rating }} / 5</span>
                    </div>
                    <div class="flex items-center gap-2">
                        @for($i=1;$i<=5;$i++)
                            <button type="button" wire:click="$set('rating', {{ $i }})" class="p-1 rounded-lg transition {{ $i <= $rating ? 'text-amber-400' : 'text-zinc-300 dark:text-zinc-600 hover:text-zinc-400 dark:hover:text-zinc-500' }}">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            </button>
                        @endfor
                    </div>
                    <input type="number" min="1" max="5" wire:model.live="rating" class="mt-2 w-24 rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-2 py-1.5 text-xs focus:border-indigo-500 focus:ring-indigo-500/30" />
                </div>

                <!-- Meta rápida -->
                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div class="flex flex-col gap-1 rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 p-3">
                        <span class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Creado</span>
                        <span class="text-zinc-700 dark:text-zinc-300">{{ $testimonial?->created_at?->format('d/m/Y') ?? '—' }}</span>
                    </div>
                    <div class="flex flex-col gap-1 rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 p-3">
                        <span class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Actualizado</span>
                        <span class="text-zinc-700 dark:text-zinc-300">{{ $testimonial?->updated_at?->format('d/m/Y') ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
