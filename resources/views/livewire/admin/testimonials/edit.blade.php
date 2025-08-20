<div class="p-6">
        <form wire:submit="save" class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block text-sm">Autor</label>
                <input type="text" wire:model.live="author_name" class="mt-1 w-full rounded-md border px-3 py-2" />
                @error('author_name')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm">Cargo</label>
                <input type="text" wire:model.live="author_role" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div>
                <label class="block text-sm">Empresa</label>
                <input type="text" wire:model.live="company" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm">Contenido</label>
                <textarea wire:model.live="content" rows="5" class="mt-1 w-full rounded-md border px-3 py-2"></textarea>
                @error('content')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm">Rating</label>
                <input type="number" min="1" max="5" wire:model.live="rating" class="mt-1 w-full rounded-md border px-3 py-2" />
            </div>
            <div>
                <label class="inline-flex items-center gap-2"><input type="checkbox" wire:model.live="is_active"> Activo</label>
            </div>
            <div class="md:col-span-2">
                <button class="rounded-md bg-[#021869] px-4 py-2 text-white">Guardar</button>
                <a href="{{ route('admin.testimonials') }}" class="ml-3 text-sm">Cancelar</a>
            </div>
        </form>
    </div>
