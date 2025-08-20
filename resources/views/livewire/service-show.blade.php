<div>
    <section class="mx-auto max-w-5xl px-6 py-12">
        <div class="grid gap-8 md:grid-cols-2">
            <div>
                <h1 class="text-4xl font-bold text-[#021869]">{{ $service->title }}</h1>
                @if($service->summary)
                    <p class="mt-3 text-lg text-zinc-700">{{ $service->summary }}</p>
                @endif
                <div class="prose mt-6 max-w-none prose-headings:text-[#021869]">{!! nl2br(e($service->description)) !!}</div>
                <div class="mt-8">
                    <a href="/\#contacto" class="rounded-md bg-orange-500 px-5 py-3 font-semibold text-white hover:bg-orange-600">Solicitar información</a>
                </div>
            </div>
            <div>
                @if($service->image_path)
                    <img class="w-full rounded-xl object-cover" src="{{ asset('storage/'.$service->image_path) }}" alt="{{ $service->title }}">
                @endif
            </div>
        </div>
    </section>
</div>
