<div class="p-6">
        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-50 p-3 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Galería</h1>
            <a href="{{ route('admin.gallery.create') }}" class="rounded-md bg-[#021869] px-4 py-2 text-sm font-semibold text-white">Nueva imagen</a>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach($items as $img)
                <div class="rounded-lg border p-2">
                    <img src="{{ asset('storage/'.$img->image_path) }}" alt="{{ $img->title }}" class="h-32 w-full rounded object-cover">
                    <div class="mt-2 flex items-center justify-between text-sm">
                        <div class="truncate">{{ $img->title }}</div>
                        <div class="flex gap-3">
                            <a href="{{ route('admin.gallery.edit', $img->id) }}" class="text-[#021869]">Editar</a>
                            <button wire:click="delete({{ $img->id }})" class="text-red-600">Eliminar</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
