<div>
    <!-- Portada hero con imagen de fondo -->
    <section class="w-full text-white py-24 md:py-32 lg:py-36 relative">
        <!-- Fondo de la portada (con imagen o gradiente) -->
        <div class="absolute inset-0 z-0">
            @if($service->banner_image_path)
                <div class="absolute inset-0 bg-black/50"></div>
                <img src="{{ asset('storage/'.$service->banner_image_path) }}" alt="{{ $service->title }}" class="w-full h-full object-cover" />
            @else
                <div class="w-full h-full bg-gradient-to-br from-zinc-900 to-[#1e2d40]"></div>
            @endif
        </div>

        <!-- Contenido de la portada -->
        <div class="max-w-[95%] xl:max-w-[90%] 2xl:max-w-[85%] mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-6">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white">{{ $service->title }}</h1>
                @if($service->summary)
                    <p class="text-xl md:text-2xl text-zinc-200 leading-relaxed max-w-3xl mx-auto">{{ $service->summary }}</p>
                @endif
                <div class="pt-6">
                    <a href="/#contacto" class="rounded-lg bg-[#204369] hover:bg-[#17314a] px-8 py-3 font-semibold text-white transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#204369]">Contáctenos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal del servicio -->
    <section class="mx-auto max-w-[95%] xl:max-w-[90%] 2xl:max-w-[85%] px-4 py-16 md:py-20">
        <div class="flex flex-col-reverse md:flex-row md:items-start gap-8 lg:gap-14 xl:gap-20">
            <!-- Descripción del servicio -->
            <div class="md:w-1/2 space-y-8">
                <h2 class="text-3xl font-bold text-[#204369] mb-4">Detalles del servicio</h2>
                <div class="text-zinc-600 prose max-w-none prose-headings:text-[#204369] prose-p:text-base prose-p:leading-relaxed">
                    {!! nl2br(e($service->description)) !!}
                </div>
                <div class="pt-6 flex flex-wrap gap-4">
                    <a href="{{ route('home') }}#contacto" class="rounded-full bg-[#204369] px-7 py-3 font-semibold text-white hover:bg-[#17314a] transition-colors focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#204369]">Solicitar información</a>
                    @if(!empty($contactInfo?->whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $contactInfo->whatsapp) }}?text={{ urlencode('Hola, me interesa el servicio: '.$service->title) }}"
                           target="_blank" rel="noopener"
                           class="rounded-full bg-green-600 px-7 py-3 font-semibold text-white hover:bg-green-700 transition-colors focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-700/50">
                            WhatsApp
                        </a>
                    @endif
                </div>
            </div>

            <!-- Imagen del servicio -->
            <div class="md:w-1/2">
                @if($service->image_path)
                    <div class="overflow-hidden rounded-xl shadow-lg h-full">
                        <img class="w-full h-full aspect-[4/3] object-cover" src="{{ asset('storage/'.$service->image_path) }}" alt="{{ $service->title }}">
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
