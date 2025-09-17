<div class="max-w-3xl mx-auto px-4">
    <h1 class="text-2xl font-extrabold mb-6 text-gray-900 dark:text-gray-100">Nuevo Ticket</h1>

    <form wire:submit.prevent="save" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow transition-shadow hover:shadow-lg border border-transparent dark:border-gray-700" x-data="{ open: false }" @click.outside="open=false">
        @if (session('success'))
            <div class="p-3 bg-green-50/80 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-2xl">{{ session('success') }}</div>
        @endif

        <div class="relative">
            <div class="flex items-end justify-between">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Cliente</label>
                <button type="button" class="text-sm text-teal-500 hover:underline dark:text-teal-400" wire:click="$set('newClienteOpen', true)">Nuevo cliente</button>
            </div>
            <div class="mt-1">
                <input type="text" wire:model.debounce.250ms="clienteSearch" @focus="open=true" @keydown.escape="open=false" placeholder="Buscar por nombre o email" class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-300" />
                <input type="hidden" wire:model="cliente_id" />
            </div>
            @error('cliente_id') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror

            @if(!empty($clienteOptions))
                <div x-show="open" x-transition.opacity class="absolute z-10 mt-2 w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-lg max-h-60 overflow-auto">
                    <ul class="py-2">
                        @foreach($clienteOptions as $opt)
                            <li>
                                <button type="button" @click="open=false" wire:click="selectCliente({{ $opt['id'] }})" class="w-full text-left px-4 py-2 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <div class="font-medium text-gray-800 dark:text-gray-100">{{ $opt['text'] }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $opt['sub'] }}</div>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($newClienteOpen)
                <div class="mt-3 p-4 border rounded-2xl bg-gray-50 dark:bg-gray-900 dark:border-gray-700">
                    <div class="grid md:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-sm text-gray-700 dark:text-gray-200">Nombre</label>
                            <input type="text" wire:model.defer="newClienteNombre" class="mt-1 w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-300" />
                            @error('newClienteNombre') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" wire:model.defer="newClienteEmail" class="mt-1 w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-300" />
                            @error('newClienteEmail') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700 dark:text-gray-200">Teléfono</label>
                            <input type="text" wire:model.defer="newClienteTelefono" class="mt-1 w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-300" />
                            @error('newClienteTelefono') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-3 flex justify-end gap-2">
                        <button type="button" class="px-3 py-2 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200" wire:click="cancelNewCliente">Cancelar</button>
                        <button type="button" class="px-3 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-2xl shadow" wire:click="createCliente">Crear y seleccionar</button>
                    </div>
                </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Título</label>
            <input type="text" wire:model="titulo" class="mt-1 w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-300" />
            @error('titulo') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
            <textarea rows="5" wire:model="descripcion" class="mt-1 w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-300"></textarea>
            @error('descripcion') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Prioridad</label>
            <select wire:model="prioridad" class="mt-1 w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-teal-300">
                <option value="baja">Baja</option>
                <option value="media">Media</option>
                <option value="alta">Alta</option>
            </select>
            @error('prioridad') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.tickets') }}" class="px-4 py-2 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 shadow-sm">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-2xl shadow">Crear</button>
        </div>
    </form>
</div>
