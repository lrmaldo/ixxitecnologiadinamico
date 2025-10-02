<div>
    <div class="min-h-screen bg-zinc-50">
        <!-- Hero Section -->
    <section class="relative py-20 bg-[#204369] overflow-hidden">
        <!-- Elementos decorativos de fondo -->
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute top-20 left-20 w-96 h-96 bg-[#0ea5a4]/20 rounded-full filter blur-3xl animate-blob opacity-30"></div>
            <div class="absolute bottom-20 right-20 w-80 h-80 bg-blue-400/20 rounded-full filter blur-3xl animate-blob animation-delay-2000 opacity-30"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-6 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6" data-aos="fade-up">
                Nuestros <span class="text-[#C8DBEF]">Servicios</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100/90 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Soluciones integrales de seguridad tecnológica diseñadas específicamente para proteger y optimizar tu negocio
            </p>

            <!-- Estadísticas rápidas -->
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-[#0ea5a4] mb-2">{{ $services->total() }}+</div>
                    <div class="text-sm text-blue-100/80">Servicios Disponibles</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-[#C8DBEF] mb-2">24/7</div>
                    <div class="text-sm text-blue-100/80">Soporte Técnico</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-[#C8DBEF] mb-2">100+</div>
                    <div class="text-sm text-blue-100/80">Clientes Satisfechos</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-[#0ea5a4] mb-2">10+</div>
                    <div class="text-sm text-blue-100/80">Años de Experiencia</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filtros y búsqueda -->
    <section class="py-12 bg-white border-b border-gray-200">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col md:flex-row gap-6 items-center justify-between">
                <!-- Búsqueda -->
                <div class="relative flex-1 max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Buscar servicios..."
                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-[#204369] focus:border-transparent transition-all duration-200">
                </div>

                <!-- Resultados -->
                <div class="text-sm text-gray-600">
                    {{ $services->total() }} servicio{{ $services->total() !== 1 ? 's' : '' }} encontrado{{ $services->total() !== 1 ? 's' : '' }}
                </div>
            </div>
        </div>
    </section>

    <!-- Grid de servicios -->
    <section class="py-16">
        <div class="mx-auto max-w-7xl px-6">
            @if($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <article class="group bg-zinc-50 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-zinc-200" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <!-- Imagen del servicio -->
                            <div class="relative h-48 bg-zinc-200 overflow-hidden">
                                @php
                                    $image = $service->featured_image ?? $service->image_path;
                                @endphp
                                @if($image)
                                    <img src="{{ asset('storage/' . $image) }}"
                                         alt="{{ $service->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/70" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Contenido -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-[#204369] mb-3">
                                    {{ $service->title }}
                                </h3>

                                <p class="text-zinc-800 mb-4 line-clamp-3 leading-relaxed">
                                    {{ $service->description }}
                                </p>

                                <!-- Características destacadas -->
                                @if(!empty($service->features))
                                    <div class="mb-4">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach(array_slice(explode(',', $service->features), 0, 3) as $feature)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-200 text-zinc-700">
                                                    {{ trim($feature) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Precio -->
                                @if(!empty($service->price))
                                    <div class="mb-4">
                                        <span class="text-2xl font-bold text-[#204369]">
                                            ${{ number_format($service->price, 0) }}
                                        </span>
                                        <span class="text-sm text-gray-500">/ proyecto</span>
                                    </div>
                                @endif

                                <!-- Botón de acción -->
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('services.show', $service->slug) }}"
                                       class="inline-flex items-center gap-2 bg-[#204369] hover:bg-[#17314a] text-white font-semibold px-6 py-3 rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300 group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#204369]">
                                        <span>Ver detalles</span>
                                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>

                                    <!-- Botón de contacto rápido -->
                                    <a href="#contacto"
                                       class="text-[#204369] hover:underline transition-colors duration-300 p-2 focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#204369]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-12">
                    {{ $services->links() }}
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-20">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No se encontraron servicios</h3>
                    <p class="text-gray-500 mb-6">
                        @if($search)
                            Intenta ajustar tu búsqueda.
                        @else
                            Actualmente no hay servicios disponibles.
                        @endif
                    </p>
                    @if($search)
                        <button wire:click="$set('search', '')"
                                class="bg-[#204369] text-white px-6 py-3 rounded-full hover:bg-[#17314a] transition-colors duration-300">
                            Limpiar búsqueda
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-[#204369]">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6" data-aos="fade-up">
                ¿No encuentras lo que buscas?
            </h2>
            <p class="text-xl text-blue-100/90 mb-8" data-aos="fade-up" data-aos-delay="200">
                Contáctanos para una solución personalizada según las necesidades específicas de tu negocio
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
                     <a href="/#contacto"
                         class="bg-[#204369] hover:bg-[#17314a] text-white font-bold px-8 py-4 rounded-full hover:shadow-xl transform hover:scale-105 transition-all duration-300 focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white/60">
                    Contactar Ahora
                </a>
                <a href="{{ route('support.ticket.create') }}"
                   class="border-2 border-white text-white font-bold px-8 py-4 rounded-full hover:bg-white hover:text-[#204369] transition-all duration-300">
                    Soporte Técnico
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de contacto incluida -->
    @include('components.contact-section')
    </div>

    <style>
        /* Animaciones personalizadas */
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(20px, -20px) scale(1.05); }
            50% { transform: translate(0, 20px) scale(0.95); }
            75% { transform: translate(-20px, -15px) scale(1.05); }
        }

        .animate-blob {
            animation: blob 20s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        /* Limitar líneas de texto */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>
