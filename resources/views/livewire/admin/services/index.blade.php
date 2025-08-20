<div class="p-6">
        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-50 p-3 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Servicios</h1>
            <a href="{{ route('admin.services.create') }}" class="rounded-md bg-[#021869] px-4 py-2 text-sm font-semibold text-white">Nuevo</a>
        </div>
    <form wire:submit="exportSelected">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm text-zinc-600">
            <th class="border-b p-2"><input type="checkbox" disabled></th>
                    <th class="border-b p-2">Título</th>
                    <th class="border-b p-2">Activo</th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr class="text-sm">
                        <td class="border-b p-2"><input type="checkbox" value="{{ $service->id }}" wire:model.live="selected"></td>
                        <td class="border-b p-2">{{ $service->title }}</td>
                        <td class="border-b p-2">{{ $service->is_active ? 'Sí' : 'No' }}</td>
                        <td class="border-b p-2 text-right">
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="text-[#021869]">Editar</a>
                            <button wire:click="delete({{ $service->id }})" class="ml-3 text-red-600">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $services->links() }}</div>
        <div class="mt-4">
            <button type="submit" class="rounded-md bg-orange-500 px-4 py-2 text-sm font-semibold text-white disabled:opacity-50" {{ empty($selected) ? 'disabled' : '' }}>Exportar PDF seleccionado</button>
        </div>
        </form>
    </div>
