<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Nuevo Ticket</h1>

    <form wire:submit.prevent="save" class="space-y-4 bg-white p-6 rounded-2xl shadow transition hover:shadow-lg" x-data="{ open: false }" @click.outside="open=false">
        @if (session('success'))
            <div class="p-3 bg-green-50 text-green-700 rounded-2xl">{{ session('success') }}</div>
        @endif

        <div class="relative">
            <div class="flex items-end justify-between">
                <label class="block text-sm font-medium">Cliente</label>
                <button type="button" class="text-sm text-[#0ea5a4] hover:underline" wire:click="$set('newClienteOpen', true)">Nuevo cliente</button>
            </div>
            <div class="mt-1">
                <input type="text" wire:model.debounce.250ms="clienteSearch" @focus="open=true" @keydown.escape="open=false" placeholder="Buscar por nombre o email" class="w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]" />
                <input type="hidden" wire:model="cliente_id" />
            </div>
            @error('cliente_id') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror

            @if(!empty($clienteOptions))
                <div x-show="open" x-transition.opacity class="absolute z-10 mt-2 w-full bg-white border border-gray-200 rounded-2xl shadow-lg max-h-60 overflow-auto">
                    <ul class="py-2">
                        @foreach($clienteOptions as $opt)
                            <li>
                                <button type="button" @click="open=false" wire:click="selectCliente({{ $opt['id'] }})" class="w-full text-left px-4 py-2 hover:bg-gray-50">
                                    <div class="font-medium">{{ $opt['text'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $opt['sub'] }}</div>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($newClienteOpen)
                <div class="mt-3 p-4 border rounded-2xl bg-gray-50">
                    <div class="grid md:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-sm">Nombre</label>
                            <input type="text" wire:model.defer="newClienteNombre" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]" />
                            @error('newClienteNombre') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm">Email</label>
                            <input type="email" wire:model.defer="newClienteEmail" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]" />
                            @error('newClienteEmail') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm">Teléfono</label>
                            <input type="text" wire:model.defer="newClienteTelefono" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]" />
                            @error('newClienteTelefono') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-3 flex justify-end gap-2">
                        <button type="button" class="px-3 py-2 rounded-2xl border shadow-sm" wire:click="cancelNewCliente">Cancelar</button>
                        <button type="button" class="px-3 py-2 bg-[#0ea5a4] text-white rounded-2xl shadow" wire:click="createCliente">Crear y seleccionar</button>
                    </div>
                </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium">Título</label>
            <input type="text" wire:model="titulo" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]" />
            @error('titulo') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Descripción</label>
            <textarea rows="5" wire:model="descripcion" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]"></textarea>
            @error('descripcion') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Prioridad</label>
            <select wire:model="prioridad" class="mt-1 w-full rounded-2xl border-gray-300 focus:ring-[#0ea5a4]">
                <option value="baja">Baja</option>
                <option value="media">Media</option>
                <option value="alta">Alta</option>
            </select>
            @error('prioridad') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.tickets') }}" class="px-4 py-2 rounded-2xl border shadow-sm">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-[#0ea5a4] text-white rounded-2xl shadow hover:opacity-90">Crear</button>
        </div>
    </form>
</div>
