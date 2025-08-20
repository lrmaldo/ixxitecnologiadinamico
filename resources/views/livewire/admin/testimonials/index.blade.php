<div class="p-6">
        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-50 p-3 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Testimonios</h1>
            <a href="{{ route('admin.testimonials.create') }}" class="rounded-md bg-[#021869] px-4 py-2 text-sm font-semibold text-white">Nuevo</a>
        </div>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm text-zinc-600">
                    <th class="border-b p-2">Autor</th>
                    <th class="border-b p-2">Activo</th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $t)
                    <tr class="text-sm">
                        <td class="border-b p-2">{{ $t->author_name }}</td>
                        <td class="border-b p-2">{{ $t->is_active ? 'Sí' : 'No' }}</td>
                        <td class="border-b p-2 text-right">
                            <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="text-[#021869]">Editar</a>
                            <button wire:click="delete({{ $t->id }})" class="ml-3 text-red-600">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $testimonials->links() }}</div>
    </div>
