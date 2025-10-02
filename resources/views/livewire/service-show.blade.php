<div>
    <section class="mx-auto max-w-5xl px-6 py-12">
        <div class="grid gap-8 md:grid-cols-2">
            <div class="bg-zinc-50 rounded-2xl p-6 md:p-8 border border-zinc-200 shadow-sm">
                <h1 class="text-4xl font-bold text-[#204369] mb-2">{{ $service->title }}</h1>
                @if($service->summary)
                    <p class="mt-1 text-lg text-zinc-700">{{ $service->summary }}</p>
                @endif
                <div class="mt-6 text-zinc-800 prose max-w-none prose-headings:text-[#204369]">
                    {!! nl2br(e($service->description)) !!}
                </div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('home') }}#contacto" class="rounded-full bg-[#204369] px-6 py-3 font-semibold text-white hover:bg-[#17314a] transition-colors focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#204369]">Solicitar información</a>
                    @if(!empty($contactInfo?->whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $contactInfo->whatsapp) }}?text={{ urlencode('Hola, me interesa el servicio: '.$service->title) }}"
                           target="_blank" rel="noopener"
                           class="rounded-full bg-green-600 px-6 py-3 font-semibold text-white hover:bg-green-700 transition-colors focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-700/50">
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
