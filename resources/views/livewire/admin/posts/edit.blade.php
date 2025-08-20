<div class="p-6">
        <form wire:submit="save" class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="md:col-span-2">
                <label class="block text-sm">Título</label>
                <input type="text" wire:model.live="title" class="mt-1 w-full rounded-md border px-3 py-2" />
                @error('title')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm">Extracto</label>
                <textarea wire:model.live="excerpt" rows="3" class="mt-1 w-full rounded-md border px-3 py-2"></textarea>
            </div>
            <div class="md:col-span-2" wire:ignore>
                <label class="block text-sm">Contenido</label>
                <input id="content-input" type="hidden" value="{{ $content }}" />
                <trix-editor input="content-input" class="trix-content mt-1 w-full rounded-md border px-3 py-2"></trix-editor>
                @error('content')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm">Imagen destacada</label>
                <input type="file" wire:model="featured_file" accept="image/*" class="mt-1 w-full rounded-md border px-3 py-2" />
                @error('featured_file')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                <div class="mt-2 text-xs text-zinc-500">o proporciona una ruta existente:</div>
                <input type="text" wire:model.live="featured_image" class="mt-1 w-full rounded-md border px-3 py-2" placeholder="storage/blog/..." />
                <div class="mt-3">
                    @if($featured_file)
                        <img src="{{ $featured_file->temporaryUrl() }}" class="h-32 rounded object-cover" />
                    @elseif($featured_image)
                        <img src="{{ asset('storage/'.$featured_image) }}" class="h-32 rounded object-cover" />
                    @endif
                </div>
            </div>
            <div>
                <label class="block text-sm">Tipo</label>
                <select wire:model.live="type" class="mt-1 w-full rounded-md border px-3 py-2">
                    <option value="articulo">Artículo</option>
                    <option value="infografia">Infografía</option>
                    <option value="caso_exito">Caso de éxito</option>
                </select>
            </div>
            <div>
                <label class="inline-flex items-center gap-2"><input type="checkbox" wire:model.live="is_published"> Publicar</label>
            </div>
            <div>
                <label class="block text-sm">SEO Título</label>
                <input type="text" wire:model.live="seo_title" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm">SEO Descripción</label>
                <textarea wire:model.live="seo_description" rows="3" class="mt-1 w-full rounded-md border px-3 py-2"></textarea>
            </div>
            <div class="md:col-span-2">
                <button class="rounded-md bg-[#021869] px-4 py-2 text-white">Guardar</button>
                <a href="{{ route('admin.posts') }}" class="ml-3 text-sm">Cancelar</a>
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
