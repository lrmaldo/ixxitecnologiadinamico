<div class="p-6">
        <form wire:submit="save" class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block text-sm">Título</label>
                <input type="text" wire:model.live="title" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div>
                <label class="block text-sm">Cargar imagen</label>
                <input type="file" wire:model="file" accept="image/*" class="mt-1 w-full rounded-md border px-3 py-2" />
                @error('file')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                <div class="mt-2 text-xs text-zinc-500">o proporciona una ruta existente:</div>
                <input type="text" wire:model.live="image_path" class="mt-1 w-full rounded-md border px-3 py-2" placeholder="storage/imagenes/..." />
                @error('image_path')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                <div class="mt-3">
                    @if($file)
                        <img src="{{ $file->temporaryUrl() }}" class="h-32 rounded object-cover" />
                    @elseif($image_path)
                        <img src="{{ asset('storage/'.$image_path) }}" class="h-32 rounded object-cover" />
                    @endif
                </div>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm">Descripción</label>
                <textarea wire:model.live="description" rows="4" class="mt-1 w-full rounded-md border px-3 py-2"></textarea>
            </div>
            <div>
                <label class="block text-sm">Posición</label>
                <input type="number" wire:model.live="position" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div>
                <label class="inline-flex items-center gap-2"><input type="checkbox" wire:model.live="is_active"> Activo</label>
            </div>
            <div class="md:col-span-2">
                <button class="rounded-md bg-[#021869] px-4 py-2 text-white">Guardar</button>
                <a href="{{ route('admin.gallery') }}" class="ml-3 text-sm">Cancelar</a>
            </div>
        </form>
    </div>
