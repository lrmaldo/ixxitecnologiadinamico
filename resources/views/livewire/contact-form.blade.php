<div>

    <form wire:submit.prevent="submit" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="md:col-span-1">
            <label class="block text-sm font-medium text-zinc-700">Nombre</label>
         <input type="text"
             wire:model.debounce.500ms="name"
                   placeholder="Escribe tu nombre aquí"
                       class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#204369]" />
            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="md:col-span-1">
            <label class="block text-sm font-medium text-zinc-700">Correo</label>
         <input type="email"
             wire:model.debounce.500ms="email"
                   placeholder="tu@email.com"
                       class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#204369]" />
            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="md:col-span-1">
            <label class="block text-sm font-medium text-zinc-700">Teléfono</label>
         <input type="text"
             wire:model.debounce.500ms="phone"
                   placeholder="123-456-7890"
                   class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869]" />
            @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-zinc-700">Mensaje</label>
            <textarea wire:model.debounce.700ms="message"
                      rows="4"
                      placeholder="Cuéntanos cómo podemos ayudarte..."
                      class="mt-1 w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869]"></textarea>
            @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="md:col-span-2">
            <button type="submit"
                    wire:loading.attr="disabled" wire:target="submit"
                    wire:loading.class="opacity-50 cursor-not-allowed" wire:target="submit"
                       class="inline-flex items-center rounded-md bg-[#204369] px-5 py-2.5 font-semibold text-white hover:bg-[#0a268b] transition-colors">
                <span wire:loading.remove wire:target="submit">Enviar</span>
                <span wire:loading wire:target="submit" class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Enviando...
                </span>
            </button>


            @if(session('status'))
                <span class="ml-3 text-sm text-blue-700 font-semibold">{{ session('status') }}</span>
            @endif

            @if($submitted)
                <span class="ml-3 text-sm text-green-700">Enviado correctamente</span>
            @endif
        </div>
    </form>

    <!-- Mensaje de éxito -->
</div>
