<div class="p-4 sm:p-6 space-y-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100">{{ $post ? 'Editar publicación' : 'Nueva publicación' }}</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Redacta y optimiza el contenido del blog.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.posts') }}" wire:navigate class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-700/50 transition-colors">Cancelar</a>
            <button form="post-form" class="inline-flex items-center gap-2 rounded-lg bg-[#021869] hover:bg-[#021869]/90 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition-colors">Guardar</button>
        </div>
    </div>

    <form id="post-form" wire:submit="save" class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="space-y-8 lg:col-span-2">
            <!-- Contenido principal -->
            <div class="rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white dark:bg-zinc-900/50 backdrop-blur shadow-sm p-6 space-y-6">
                <div class="grid gap-6">
                    <div>
                        <label class="block text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Título</label>
                        <input type="text" wire:model.live="title" class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                        @error('title')<div class="mt-1 text-xs text-red-500">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Extracto</label>
                        <textarea wire:model.live="excerpt" rows="3" class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30"></textarea>
                    </div>
                    <div wire:ignore>
                        <label class="block text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Contenido</label>
                        <input id="content-input" type="hidden" value="{{ $content }}" />
                        <trix-editor input="content-input" class="trix-content mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30"></trix-editor>
                        @error('content')<div class="mt-1 text-xs text-red-500">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white dark:bg-zinc-900/50 backdrop-blur shadow-sm p-6 space-y-6">
                <h2 class="text-sm font-semibold text-zinc-600 dark:text-zinc-300 tracking-wide uppercase">SEO</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">SEO Título</label>
                        <input type="text" wire:model.live="seo_title" class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">SEO Descripción</label>
                        <textarea wire:model.live="seo_description" rows="3" class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lateral -->
        <div class="space-y-8">
            <div class="rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white dark:bg-zinc-900/50 backdrop-blur shadow-sm p-6 space-y-4">
                <h2 class="text-sm font-semibold text-zinc-600 dark:text-zinc-300 tracking-wide uppercase">Publicación</h2>
                <div>
                    <label class="block text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Tipo</label>
                    <select wire:model.live="type" class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                        <option value="articulo">Artículo</option>
                        <option value="infografia">Infografía</option>
                        <option value="caso_exito">Caso de éxito</option>
                    </select>
                </div>
                <label class="inline-flex items-center gap-2 text-sm font-medium text-zinc-600 dark:text-zinc-300"><input type="checkbox" wire:model.live="is_published" class="rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500/30" /> Publicar</label>
            </div>
            <div class="rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white dark:bg-zinc-900/50 backdrop-blur shadow-sm p-6 space-y-4">
                <h2 class="text-sm font-semibold text-zinc-600 dark:text-zinc-300 tracking-wide uppercase">Imagen destacada</h2>
                <input type="file" wire:model="featured_file" accept="image/*" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                @error('featured_file')<div class="text-xs text-red-500">{{ $message }}</div>@enderror
                <div class="text-[11px] text-zinc-500 dark:text-zinc-400">O ruta existente</div>
                <input type="text" wire:model.live="featured_image" placeholder="storage/blog/..." class="w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                <div class="mt-2">
                    @if($featured_file)
                        <img src="{{ $featured_file->temporaryUrl() }}" class="h-40 w-full rounded-lg object-cover" />
                    @elseif($featured_image)
                        <img src="{{ asset('storage/'.$featured_image) }}" class="h-40 w-full rounded-lg object-cover" />
                    @endif
                </div>
            </div>
            <div class="rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white dark:bg-zinc-900/50 backdrop-blur shadow-sm p-6 space-y-4">
                <h2 class="text-sm font-semibold text-zinc-600 dark:text-zinc-300 tracking-wide uppercase">Guardar</h2>
                <button type="submit" form="post-form" class="w-full inline-flex justify-center items-center gap-2 rounded-lg bg-[#021869] hover:bg-[#021869]/90 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors">Guardar cambios</button>
                <a href="{{ route('admin.posts') }}" wire:navigate class="w-full inline-flex justify-center items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2.5 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-700/40 transition-colors">Volver</a>
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
