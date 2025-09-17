<div class="p-6">
        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-50 p-3 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Usuarios</h1>
            <a href="{{ route('admin.users.create') }}" class="rounded-md bg-[#021869] px-4 py-2 text-sm font-semibold text-white">Nuevo</a>
        </div>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm text-zinc-600">
                    <th class="border-b p-2">Nombre</th>
                    <th class="border-b p-2">Email</th>
                    <th class="border-b p-2">Rol</th>
                    <th class="border-b p-2">Activo</th>
                    <th class="border-b p-2">Correos contacto</th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-sm">
                        <td class="border-b p-2">{{ $user->name }}</td>
                        <td class="border-b p-2">{{ $user->email }}</td>
                        <td class="border-b p-2">{{ $user->role ?? 'editor' }}</td>
                        <td class="border-b p-2">
                            <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="border-b p-2">
                            @if($user->receive_contact_emails)
                                <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-800">
                                    📧 Sí
                                </span>
                            @else
                                <span class="text-gray-400 text-xs">No</span>
                            @endif
                        </td>
                        <td class="border-b p-2 text-right">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-[#021869]">Editar</a>
                            @if (auth()->id() !== $user->id)
                                <button wire:click="delete({{ $user->id }})" class="ml-3 text-red-600">Eliminar</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $users->links() }}</div>
    </div>
