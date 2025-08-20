<x-layouts.app :title="$service ? 'Editar servicio' : 'Nuevo servicio'">
    <div class="p-6">
        <form wire:submit="save" class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block text-sm">Título</label>
                <input type="text" wire:model.live="title" class="mt-1 w-full rounded-md border px-3 py-2" />
                @error('title')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm">Resumen</label>
                <input type="text" wire:model.live="summary" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm">Descripción</label>
                <textarea wire:model.live="description" rows="6" class="mt-1 w-full rounded-md border px-3 py-2"></textarea>
            </div>
            <div>
                <label class="block text-sm">Ícono</label>
                <input type="text" wire:model.live="icon" class="mt-1 w-full rounded-md border px-3 py-2" placeholder="emoji o nombre de icono" />
            </div>
            <div>
                <label class="block text-sm">Imagen</label>
                <input type="file" wire:model="image_file" accept="image/*" class="mt-1 w-full rounded-md border px-3 py-2" />
                @error('image_file')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                <div class="mt-2 text-xs text-zinc-500">o proporciona una ruta existente:</div>
                <input type="text" wire:model.live="image_path" class="mt-1 w-full rounded-md border px-3 py-2" placeholder="storage/services/..." />
                <div class="mt-3">
                    @if($image_file)
                        <img src="{{ $image_file->temporaryUrl() }}" class="h-32 rounded object-cover" />
                    @elseif($image_path)
                        <img src="{{ asset('storage/'.$image_path) }}" class="h-32 rounded object-cover" />
                    @endif
                </div>
            </div>
            <div>
                <label class="inline-flex items-center gap-2"><input type="checkbox" wire:model.live="is_active"> Activo</label>
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
                <a href="{{ route('admin.services') }}" class="ml-3 text-sm">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
