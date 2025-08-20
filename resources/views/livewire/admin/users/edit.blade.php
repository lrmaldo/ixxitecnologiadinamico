<div class="p-6">
        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-50 p-3 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        <h1 class="mb-4 text-2xl font-bold">{{ $user ? 'Editar usuario' : 'Nuevo usuario' }}</h1>
        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block text-sm font-medium">Nombre</label>
                <input type="text" wire:model.defer="name" class="mt-1 w-full rounded-md border p-2" />
                @error('name') <div class="text-sm text-red-600">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" wire:model.defer="email" class="mt-1 w-full rounded-md border p-2" />
                @error('email') <div class="text-sm text-red-600">{{ $message }}</div> @enderror
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium">Contraseña</label>
                    <input type="password" wire:model.defer="password" class="mt-1 w-full rounded-md border p-2" />
                    @error('password') <div class="text-sm text-red-600">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Confirmar contraseña</label>
                    <input type="password" wire:model.defer="password_confirmation" class="mt-1 w-full rounded-md border p-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium">Rol</label>
                    <select wire:model.defer="role" class="mt-1 w-full rounded-md border p-2">
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="viewer">Viewer</option>
                    </select>
                    @error('role') <div class="text-sm text-red-600">{{ $message }}</div> @enderror
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input id="is_active" type="checkbox" wire:model.defer="is_active" class="h-4 w-4" />
                    <label for="is_active" class="text-sm">Activo</label>
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="rounded-md bg-[#021869] px-4 py-2 text-sm font-semibold text-white">Guardar</button>
                <a href="{{ route('admin.users') }}" class="ml-2 text-sm">Cancelar</a>
            </div>
        </form>
    </div>
