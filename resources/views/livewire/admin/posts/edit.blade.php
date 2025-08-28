<div class="p-4 sm:p-6 space-y-10" x-data="{saving:false,saved:false,timeout:null}" @init-autosave.window="clearTimeout(timeout); saving=true; saved=false; timeout=setTimeout(()=>{ $wire.autosave(); }, 1200)" x-init="$watch('$wire.autoSaving', v=>saving=v); $watch('$wire.autoSaved', v=>{ if(v){ saving=false; saved=true; setTimeout(()=>saved=false,2500);} });">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100 flex items-center gap-2">
                <span class="inline-flex h-7 w-7 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-300 text-sm font-medium">{{ $post ? 'E' : 'N' }}</span>
                {{ $post ? 'Editar publicación' : 'Nueva publicación' }}
            </h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Redacta y optimiza el contenido del blog.</p>
        </div>
        <div class="flex items-center gap-3 flex-wrap">
            <a href="{{ route('admin.posts') }}" wire:navigate class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-white/70 dark:bg-zinc-800/60 hover:bg-zinc-100 dark:hover:bg-zinc-700/60 backdrop-blur transition-colors shadow-sm">Cancelar</a>
            <button form="post-form" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-tr from-[#021869] to-[#16327e] hover:from-[#021869]/90 hover:to-[#16327e]/90 px-5 py-2.5 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500/70 dark:focus:ring-indigo-400/60 transition-all">Guardar</button>
            <div class="flex items-center text-xs font-medium" :class="saving ? 'text-indigo-600 dark:text-indigo-400' : (saved ? 'text-emerald-600 dark:text-emerald-400' : 'text-zinc-400')">
                <template x-if="saving">
                    <div class="inline-flex items-center gap-1"><flux:icon name="loading" class="h-4 w-4 animate-spin" /> <span>Guardando...</span></div>
                </template>
                <template x-if="!saving && saved">
                    <div class="inline-flex items-center gap-1"><flux:icon name="check" class="h-4 w-4" /> <span>Guardado</span></div>
                </template>
            </div>
        </div>
    </div>

    <form id="post-form" wire:submit="save" class="grid grid-cols-1 gap-10 xl:gap-12 lg:grid-cols-3">
        <div class="space-y-10 lg:col-span-2">
            <!-- Contenido principal -->
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-b from-white to-white/90 dark:from-zinc-900 dark:to-zinc-900/80 shadow-sm backdrop-blur-sm p-6 space-y-8">
                <div class="grid gap-8">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Título</label>
                        <input type="text" wire:model.live="title" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                        @error('title')<div class="text-xs text-red-500 font-medium">{{ $message }}</div>@enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Extracto</label>
                        <textarea wire:model.live="excerpt" rows="3" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm leading-relaxed focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition"></textarea>
                    </div>
                    <div wire:ignore class="space-y-1.5">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Contenido</label>
                        <input id="content-input" type="hidden" value="{{ $content }}" />
                        <trix-editor input="content-input" class="trix-content rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30"></trix-editor>
                        @error('content')<div class="text-xs text-red-500 font-medium">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <!-- SEO -->
            @php
                $seoTitleLen = mb_strlen($seo_title ?? '');
                $seoDescLen = mb_strlen($seo_description ?? '');
            @endphp
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/90 dark:bg-zinc-900/70 backdrop-blur-sm shadow-sm p-6 space-y-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200 flex items-center gap-2">
                        <flux:icon name="sparkles" class="h-4 w-4 text-indigo-500" /> SEO
                    </h2>
                    <span class="text-[11px] text-zinc-500 dark:text-zinc-400">Optimiza para buscadores</span>
                </div>
                <div class="space-y-6">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">SEO Título</label>
                            <span class="text-[11px] font-medium {{ $seoTitleLen > 60 ? 'text-amber-600 dark:text-amber-400' : ($seoTitleLen >= 50 ? 'text-emerald-600 dark:text-emerald-400' : 'text-zinc-400') }}">{{ $seoTitleLen }}/60</span>
                        </div>
                        <input type="text" wire:model.live="seo_title" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                        <div class="h-1 rounded bg-zinc-200 dark:bg-zinc-700 overflow-hidden">
                            <div class="h-full transition-all {{ $seoTitleLen > 60 ? 'bg-amber-500/80' : ($seoTitleLen >= 50 ? 'bg-emerald-500/80' : 'bg-indigo-500/70') }}" style="width: {{ min(100, ($seoTitleLen/60)*100) }}%"></div>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">SEO Descripción</label>
                            <span class="text-[11px] font-medium {{ $seoDescLen > 160 ? 'text-amber-600 dark:text-amber-400' : ($seoDescLen >= 140 ? 'text-emerald-600 dark:text-emerald-400' : 'text-zinc-400') }}">{{ $seoDescLen }}/160</span>
                        </div>
                        <textarea wire:model.live="seo_description" rows="3" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm leading-relaxed focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition"></textarea>
                        <div class="h-1 rounded bg-zinc-200 dark:bg-zinc-700 overflow-hidden">
                            <div class="h-full transition-all {{ $seoDescLen > 160 ? 'bg-amber-500/80' : ($seoDescLen >= 140 ? 'bg-emerald-500/80' : 'bg-indigo-500/70') }}" style="width: {{ min(100, ($seoDescLen/160)*100) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lateral -->
        <div class="space-y-10">
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/90 dark:bg-zinc-900/70 backdrop-blur-sm shadow-sm p-6 space-y-5">
                <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Publicación</h2>
                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Tipo</label>
                    <select wire:model.live="type" class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition">
                        <option value="articulo">Artículo</option>
                        <option value="infografia">Infografía</option>
                        <option value="caso_exito">Caso de éxito</option>
                    </select>
                </div>
                <label class="inline-flex items-center gap-2 text-sm font-medium text-zinc-600 dark:text-zinc-300 select-none"><input type="checkbox" wire:model.live="is_published" class="rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500/30" /> Publicar</label>
            </div>
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/90 dark:bg-zinc-900/70 backdrop-blur-sm shadow-sm p-6 space-y-5">
                <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Imagen destacada</h2>
                <input type="file" wire:model="featured_file" accept="image/*" class="w-full rounded-lg border border-dashed border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                @error('featured_file')<div class="text-xs text-red-500 font-medium">{{ $message }}</div>@enderror
                <div class="text-[11px] text-zinc-500 dark:text-zinc-400">O ruta existente</div>
                <input type="text" wire:model.live="featured_image" placeholder="storage/blog/..." class="w-full rounded-lg border border-zinc-300/80 dark:border-zinc-600 bg-white dark:bg-zinc-800/70 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition" />
                <div class="mt-2">
                    @if($featured_file)
                        <img src="{{ $featured_file->temporaryUrl() }}" class="h-44 w-full rounded-lg object-cover ring-1 ring-zinc-200/70 dark:ring-zinc-700/60" />
                    @elseif($featured_image)
                        <img src="{{ asset('storage/'.$featured_image) }}" class="h-44 w-full rounded-lg object-cover ring-1 ring-zinc-200/70 dark:ring-zinc-700/60" />
                    @endif
                </div>
            </div>
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/90 dark:bg-zinc-900/70 backdrop-blur-sm shadow-sm p-6 space-y-5">
                <h2 class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Acciones</h2>
                <button type="submit" form="post-form" class="w-full inline-flex justify-center items-center gap-2 rounded-lg bg-[#021869] hover:bg-[#021869]/90 px-4 py-2.5 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-1 dark:focus:ring-offset-zinc-900 transition">Guardar cambios</button>
                <a href="{{ route('admin.posts') }}" wire:navigate class="w-full inline-flex justify-center items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2.5 text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-white/70 dark:bg-zinc-800/60 hover:bg-zinc-100 dark:hover:bg-zinc-700/50 transition">Volver</a>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('trix-change', function (event) {
    const html = event.target.value;
    // Sincronizar con Livewire
    if (window.Livewire) {
        const comp = Livewire.find(@this.__instance.id);
        if (comp) {
            @this.set('content', html);
        }
    }
});

document.addEventListener('livewire:navigated', () => {
    const hidden = document.getElementById('content-input');
    if (hidden) hidden.value = @this.get('content') ?? '';
});
</script>
@endpush
