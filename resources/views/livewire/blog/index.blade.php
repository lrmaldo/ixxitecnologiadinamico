<div>
    <section class="mx-auto max-w-7xl px-6 py-12">
        <h1 class="text-3xl font-bold text-[#021869]">Blog</h1>
        <div class="mt-6">
            <input type="search" wire:model.live="q" placeholder="Buscar" class="w-full rounded-md border border-zinc-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#021869] md:w-80" />
        </div>
        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="group rounded-xl border border-zinc-200 bg-white shadow-sm">
                    @if($post->featured_image)
                        <img class="h-44 w-full rounded-t-xl object-cover" src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}">
                    @endif
                    <div class="p-5">
                        <div class="text-xs uppercase tracking-wide text-orange-600">{{ str_replace('_', ' ', $post->type) }}</div>
                        <h3 class="mt-2 text-lg font-semibold text-zinc-900 group-hover:text-[#021869]">{{ $post->title }}</h3>
                        <p class="mt-1 line-clamp-2 text-zinc-600">{{ $post->excerpt }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-8">{{ $posts->links() }}</div>
    </section>
</div>
