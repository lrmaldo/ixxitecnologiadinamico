<div>
    <section class="relative overflow-hidden bg-[#021869] text-white">
        <div class="mx-auto max-w-7xl px-6 py-24 lg:flex lg:items-center lg:gap-12">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-extrabold leading-tight sm:text-5xl">Seguridad tecnológica y de campo para el sureste de México</h1>
                <p class="mt-4 text-lg text-zinc-200">Somos IXXI TECNOLOGÍA, expertos en soluciones integrales: alta tecnología, inteligencia en campo y despliegue táctico.</p>
                <div class="mt-8 flex gap-4">
                    <a href="#contacto" class="rounded-md bg-orange-500 px-6 py-3 font-semibold text-white shadow hover:bg-orange-600">Cotiza ahora</a>
                    <a href="#servicios" class="rounded-md border border-white/20 px-6 py-3 font-semibold text-white hover:bg-white/10">Ver servicios</a>
                </div>
            </div>
            <div class="mt-10 grid flex-1 grid-cols-2 gap-4 lg:mt-0">
                @foreach($gallery as $item)
                    <img class="h-40 w-full rounded-xl object-cover" src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}">
                @endforeach
            </div>
        </div>
    </section>

    <section id="servicios" class="mx-auto max-w-7xl px-6 py-16">
        <h2 class="text-3xl font-bold text-[#021869]">Servicios</h2>
        <p class="mt-2 max-w-2xl text-zinc-600">Alta tecnología e inteligencia en campo. Diseñados para proteger y optimizar.</p>
        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="block rounded-xl border border-zinc-200 bg-white p-6 shadow-sm hover:shadow">
                    <div class="text-3xl">{{ $service->icon }}</div>
                    <h3 class="mt-4 text-xl font-semibold text-zinc-900">{{ $service->title }}</h3>
                    <p class="mt-2 text-zinc-600">{{ $service->summary }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="bg-zinc-50 py-16">
        <div class="mx-auto max-w-7xl px-6">
            <h2 class="text-3xl font-bold text-[#021869]">Testimonios</h2>
            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($testimonials as $t)
                    <blockquote class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
                        <p class="text-zinc-800">“{{ $t->content }}”</p>
                        <div class="mt-4 text-sm text-zinc-600">— {{ $t->author_name }} @if($t->company) · {{ $t->company }} @endif</div>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-16">
        <h2 class="text-3xl font-bold text-[#021869]">Contenido más reciente</h2>
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
    </section>

    <section id="contacto" class="bg-zinc-50 py-16">
        <div class="mx-auto max-w-7xl px-6">
            <h2 class="text-3xl font-bold text-[#021869]">Contacto</h2>
            <livewire:contact-form />
            <div class="mt-8">
                <iframe class="h-72 w-full rounded-xl border" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="{{ config('branding.map_embed_src') }}"></iframe>
            </div>
            <a href="https://wa.me/{{ config('branding.whatsapp') }}" class="fixed bottom-6 right-6 inline-flex items-center gap-2 rounded-full bg-green-500 px-5 py-3 font-semibold text-white shadow-lg hover:bg-green-600" target="_blank" rel="noopener">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M20.52 3.48A11.94 11.94 0 0012 0C5.38 0 0 5.38 0 12c0 2.11.55 4.18 1.6 6.01L0 24l6.15-1.6A11.93 11.93 0 0012 24c6.62 0 12-5.38 12-12 0-3.2-1.25-6.21-3.48-8.52zM12 22a9.93 9.93 0 01-5.05-1.39l-.36-.21-3.65.95.98-3.56-.24-.37A9.95 9.95 0 1122 12c0 5.52-4.48 10-10 10zm5.64-7.36c-.31-.16-1.83-.9-2.11-1-.28-.1-.48-.16-.68.16-.2.31-.77 1-.94 1.2-.17.2-.35.23-.66.08-.31-.16-1.29-.47-2.46-1.49-.91-.81-1.53-1.81-1.71-2.12-.18-.31-.02-.48.13-.64.13-.13.31-.35.46-.53.15-.18.2-.31.31-.52.1-.2.05-.39-.02-.55-.08-.16-.68-1.64-.93-2.25-.25-.6-.5-.52-.68-.53h-.58c-.2 0-.52.08-.79.39-.27.31-1.04 1.02-1.04 2.5 0 1.48 1.07 2.92 1.22 3.12.16.2 2.1 3.2 5.08 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.88.12.57-.09 1.83-.75 2.09-1.47.26-.72.26-1.34.18-1.47-.08-.13-.28-.2-.59-.36z"/></svg>
                WhatsApp
            </a>
        </div>
    </section>
</div>
