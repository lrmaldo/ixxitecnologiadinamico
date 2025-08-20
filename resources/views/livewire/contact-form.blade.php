<form wire:submit="submit" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
    <div class="md:col-span-1">
        <label class="block text-sm font-medium text-zinc-700">Nombre</label>
        <input type="text" wire:model.live="name" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869]" />
        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div class="md:col-span-1">
        <label class="block text-sm font-medium text-zinc-700">Correo</label>
        <input type="email" wire:model.live="email" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869]" />
        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div class="md:col-span-1">
        <label class="block text-sm font-medium text-zinc-700">Teléfono</label>
        <input type="text" wire:model.live="phone" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869]" />
        @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-zinc-700">Mensaje</label>
        <textarea wire:model.live="message" rows="4" class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869]"></textarea>
        @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div class="md:col-span-2">
        <button type="submit" class="inline-flex items-center rounded-md bg-[#021869] px-5 py-2.5 font-semibold text-white hover:bg-[#0a268b]">Enviar</button>
        @if($submitted)
            <span class="ml-3 text-sm text-green-700">Enviado correctamente</span>
        @endif
    </div>
</form>
