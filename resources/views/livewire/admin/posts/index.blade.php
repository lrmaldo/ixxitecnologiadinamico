<div class="p-6">
        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-50 p-3 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Publicaciones</h1>
            <a href="{{ route('admin.posts.create') }}" class="rounded-md bg-[#021869] px-4 py-2 text-sm font-semibold text-white">Nueva</a>
        </div>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm text-zinc-600">
                    <th class="border-b p-2">Título</th>
                    <th class="border-b p-2">Tipo</th>
                    <th class="border-b p-2">Publicado</th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="text-sm">
                        <td class="border-b p-2">{{ $post->title }}</td>
                        <td class="border-b p-2">{{ $post->type }}</td>
                        <td class="border-b p-2">{{ $post->is_published ? 'Sí' : 'No' }}</td>
                        <td class="border-b p-2 text-right">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-[#021869]">Editar</a>
                            <button wire:click="delete({{ $post->id }})" class="ml-3 text-red-600">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
