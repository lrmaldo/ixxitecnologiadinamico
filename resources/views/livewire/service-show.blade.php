<div>
    <section class="mx-auto max-w-5xl px-6 py-12">
        <div class="grid gap-8 md:grid-cols-2">
            <div>
                <h1 class="text-4xl font-bold text-[#021869]">{{ $service->title }}</h1>
                @if($service->summary)
                    <p class="mt-3 text-lg text-zinc-700">{{ $service->summary }}</p>
                @endif
                <div class="prose mt-6 max-w-none prose-headings:text-[#021869]">{!! nl2br(e($service->description)) !!}</div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('home') }}#contacto" class="rounded-md bg-[#021869] px-5 py-3 font-semibold text-white hover:bg-[#0ea5a4] transition-colors">Solicitar información</a>
                    @if(!empty($contactInfo?->whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $contactInfo->whatsapp) }}?text={{ urlencode('Hola, me interesa el servicio: '.$service->title) }}"
                           target="_blank" rel="noopener"
                           class="rounded-md bg-green-600 px-5 py-3 font-semibold text-white hover:bg-green-700 transition-colors">
                            WhatsApp
                        </a>
                    @endif
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
