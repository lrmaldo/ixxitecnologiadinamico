<div>
    <article class="mx-auto max-w-3xl px-6 py-12">
        <h1 class="text-4xl font-bold text-[#021869]">{{ $post->title }}</h1>
        @if($post->featured_image)
            <img class="mt-6 w-full rounded-xl" src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}">
        @endif
        <div class="prose mt-6 max-w-none prose-headings:text-[#021869]">
            {{-- NOTE: El contenido viene desde la base de datos y puede contener HTML. --}}
            {{-- En producción considera sanitizar con HTMLPurifier antes de guardarlo o al mostrarlo para evitar XSS. --}}
            {!! $post->content !!}
        </div>
    </article>
</div>
