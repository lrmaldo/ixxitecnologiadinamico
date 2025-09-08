<div x-data="{
    showPage: false,
    // Carrusel
    currentSlide: 0,
    totalSlides: {{ $gallery->take(6)->count() }},
    isHovering: false,
    intervalId: null,
    startX: 0, endX: 0,
    startAutoplay(){ if(!this.intervalId) this.intervalId = setInterval(()=>{ if(!this.isHovering) this.currentSlide = (this.currentSlide + 1) % this.totalSlides }, 5000) },
    stopAutoplay(){ if(this.intervalId){ clearInterval(this.intervalId); this.intervalId = null } }
}"
     x-init="setTimeout(()=>{ showPage = true; AOS.init({duration:800, once:false, mirror:true}); startAutoplay() }, 100)"
     x-cloak>

    <!-- 1) HERO PRINCIPAL (FONDO AZUL + LOGO) -->
    <header class="relative flex justify-center items-center py-32 md:py-40 lg:py-48 bg-gradient-to-r from-[#021869] to-[#0a1f4c] overflow-hidden">
        <!-- fondo animado -->
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute top-10 left-20 w-[500px] h-[500px] bg-blue-400/20 rounded-full filter blur-3xl animate-blob opacity-30"></div>
            <div class="absolute bottom-0 right-20 w-[400px] h-[400px] bg-indigo-400/20 rounded-full filter blur-3xl animate-blob animation-delay-2000 opacity-30"></div>
            <div class="absolute inset-0 bg-[url('/img/grid-pattern.svg')] bg-center opacity-5"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center" x-show="showPage" x-transition:enter="transition ease-out duration-1200" x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100">
            <div class="flex flex-col items-center gap-6">
                <div class="relative group">
                    <div class="absolute -inset-6 rounded-full blur-lg bg-gradient-to-r from-[#021869]/30 to-[#D988B9]/30 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <!-- Glowing aura effect -->
                        <div class="absolute inset-0 rounded-full blur-xl bg-gradient-to-r from-[#D988B9]/60 to-[#021869]/60 animate-pulse-soft scale-110"></div>
                        <!-- Logo with increased size -->
                        <img src="{{ asset('img/logo.png') }}" alt="IXXI Tecnología" class="h-52 md:h-72 lg:h-80 w-auto relative z-10 transform transition-transform duration-700 hover:scale-105 drop-shadow-lg" />
                    </div>
                </div>

                <h1 class="mt-8 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                    <span class="block">Seguridad y Tecnología para México</span>
                </h1>
                <p class="mt-3 text-lg md:text-xl text-blue-100/80 italic font-light">Protección de última generación</p>
                <div class="mt-8 flex flex-wrap gap-4 justify-center">
                    <a href="#contacto" class="group rounded-full bg-gradient-to-r from-[#D988B9] to-[#E6A4B4] px-6 py-3 text-white font-semibold shadow-lg hover:shadow-xl transition">Contáctanos</a>
                    <a href="#servicios" class="rounded-full border border-white/20 px-6 py-3 text-white/90">Ver servicios</a>
                </div>
            </div>
        </div>
    </header>

    <!-- 2) CARRUSEL (debe aparecer inmediatamente debajo del fondo azul) -->
    <section class="relative py-16 bg-gradient-to-br from-[#021869] to-[#0a1f4c] overflow-hidden">
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400/30 rounded-full filter blur-3xl animate-blob opacity-20"></div>
            <div class="absolute bottom-40 right-20 w-96 h-96 bg-indigo-400/30 rounded-full filter blur-3xl animate-blob animation-delay-2000 opacity-20"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-white">Nuestra Galería</h2>
                <div class="w-24 h-1 bg-[#D988B9] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-blue-100 max-w-lg mx-auto">Descubre nuestros proyectos e implementaciones de seguridad</p>
            </div>

            <div class="relative mt-8" data-aos="fade-up"
                 @mouseenter="isHovering = true; stopAutoplay()"
                 @mouseleave="isHovering = false; startAutoplay()"
                 @touchstart.window="startX = $event.touches ? $event.touches[0].clientX : $event.clientX"
                 @touchend.window="endX = $event.changedTouches ? $event.changedTouches[0].clientX : $event.clientX; if(startX - endX > 50) currentSlide = (currentSlide + 1) % totalSlides; if(endX - startX > 50) currentSlide = (currentSlide - 1 + totalSlides) % totalSlides">

                <div class="overflow-hidden rounded-xl shadow-2xl">
                    <div class="flex transition-transform duration-500 ease-in-out"
                         :style="'transform: translateX(-' + (currentSlide * 100) + '%)'">
                        @foreach($gallery->take(6) as $item)
                            <div class="w-full flex-shrink-0 relative aspect-video bg-zinc-100">
                                <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#021869]/80 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-xl md:text-2xl font-bold">{{ $item->title }}</h3>
                                    <p class="text-sm md:text-base text-white/90 mt-2 line-clamp-2">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- controls -->
                <button @click.prevent="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 text-white rounded-full p-3 shadow-lg">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </button>
                <button @click.prevent="currentSlide = (currentSlide + 1) % totalSlides" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 text-white rounded-full p-3 shadow-lg">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                </button>

                <!-- indicators -->
                <div class="flex justify-center mt-8 space-x-3">
                    <template x-for="(_, i) in [...Array(totalSlides)]" :key="i">
            <button @click="currentSlide = i" class="w-3 h-3 md:w-4 md:h-4 rounded-full transition-transform duration-300"
                :class="currentSlide === i ? 'bg-[#D988B9] scale-125' : 'bg-white/30 hover:bg-white/60'"></button>
                    </template>
                </div>

                <div class="text-center mt-8">
                    <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 text-white font-semibold px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 border border-white/30">Ver galería completa</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 3) SECCIÓN BLANCA: SERVICIOS, CTA Y INSIGNIAS -->
    <section class="relative py-20 bg-white text-zinc-800" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block py-1 px-3 bg-[#D988B9]/10 text-[#D988B9] rounded-full text-sm font-semibold mb-4">Soluciones de Seguridad Integrales</span>
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869] mt-4">Somos IXXI TECNOLOGÍA</h2>
                <p class="mt-4 text-lg text-zinc-600">Experiencia en alta tecnología, inteligencia en campo y despliegue táctico diseñado para las necesidades de seguridad de tu negocio.</p>

                <div class="mt-8 flex flex-wrap gap-4 justify-center">
                    <a href="#contacto" class="group rounded-full bg-gradient-to-r from-[#D988B9] to-[#E6A4B4] px-6 py-3 text-white font-semibold shadow transition">Contáctanos</a>
                    <a href="#servicios" class="rounded-full border border-zinc-200 px-6 py-3 text-zinc-700">Ver servicios</a>
                </div>

                    <div class="mt-12 flex flex-wrap gap-4 justify-center">
                    <div class="flex items-center bg-zinc-50 py-2 px-4 rounded-full border border-zinc-100">
                        <svg class="h-5 w-5 text-[#D988B9]" fill="currentColor" viewBox="0 0 20 20"><path d="M6.267 3.455a3.066..."/></svg>
                        <span class="ml-2 text-sm">Certificados</span>
                    </div>
                    <div class="flex items-center bg-zinc-50 py-2 px-4 rounded-full border border-zinc-100">
                        <svg class="h-5 w-5 text-[#D988B9]" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="ml-2 text-sm">Personal Capacitado</span>
                    </div>
                    <div class="flex items-center bg-zinc-50 py-2 px-4 rounded-full border border-zinc-100">
                        <svg class="h-5 w-5 text-[#D988B9]" fill="currentColor" viewBox="0 0 20 20"><path d="M2.166 4.999..."/></svg>
                        <span class="ml-2 text-sm">Respuesta Inmediata</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4) ESTADÍSTICAS (mantener estructura para futuros contadores) -->
    <section class="py-20 bg-white relative overflow-hidden" data-aos="fade-up">
        <div class="absolute inset-0 bg-gradient-to-r from-[#021869]/5 to-[#0ea5a4]/5 opacity-30 -z-10"></div>
        <div class="mx-auto max-w-7xl px-6 relative">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#021869]">Nuestra Experiencia en Números</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-12">
                <!-- Placeholder para contadores -->
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-[#021869]">+120</div>
                    <div class="mt-2 text-sm text-zinc-600">Proyectos</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-[#021869]">+50</div>
                    <div class="mt-2 text-sm text-zinc-600">Clientes</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-[#021869]">24/7</div>
                    <div class="mt-2 text-sm text-zinc-600">Soporte</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-[#021869]">+10</div>
                    <div class="mt-2 text-sm text-zinc-600">Años</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de servicios -->
    <section id="servicios" class="py-24 bg-zinc-50" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Nuestros Servicios</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Soluciones integrales de seguridad diseñadas específicamente para proteger tu negocio y optimizar tus operaciones</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredServices as $service)
                    <a href="{{ route('services.show', $service->slug) }}" class="group block rounded-xl overflow-hidden bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        @if($service->image_path)
                            <div class="h-48 overflow-hidden">
                                <img class="h-full w-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                     src="{{ asset('storage/'.$service->image_path) }}"
                                     alt="{{ $service->title }}">
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="text-3xl text-[#D988B9]">{{ $service->icon }}</div>
                            <h3 class="mt-4 text-xl font-semibold text-[#021869]">{{ $service->title }}</h3>
                            <p class="mt-2 text-zinc-600">{{ $service->summary }}</p>
                            <div class="mt-6 flex items-center text-[#D988B9] font-medium">
                                <span>Más información</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-16">
                <a href="#servicios" class="inline-flex items-center gap-2 font-semibold text-[#D988B9] hover:text-[#c6789f] group">
                    Ver todos los servicios
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de testimonios -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Testimonios</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Lo que nuestros clientes dicen sobre nuestros servicios</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials->take(3) as $t)
                    <blockquote class="h-full rounded-xl bg-zinc-50 p-8 shadow-sm hover:shadow-md transition-all duration-300 border border-zinc-100">
                        <div class="flex mb-5">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="h-5 w-5 {{ $i < ($t->rating ?? 5) ? 'text-yellow-400' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-lg text-zinc-700 italic leading-relaxed">
                            "{{ Str::limit($t->content, 150) }}"
                        </p>
                        <div class="mt-6 pt-6 border-t border-zinc-200 flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-r from-[#021869] to-[#0b2252] flex items-center justify-center text-white font-bold">
                                {{ substr($t->author_name, 0, 1) }}
                            </div>
                            <div class="ml-4">
                                <p class="font-medium text-zinc-900">{{ $t->author_name }}</p>
                                @if($t->company)
                                    <p class="text-sm text-zinc-600">{{ $t->company }}</p>
                                @endif
                            </div>
                        </div>
                    </blockquote>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('testimonials.index') }}" class="inline-flex items-center gap-2 font-semibold text-[#0ea5a4] hover:text-[#0c8e8d] group">
                    Ver todos los testimonios
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Blog / Entradas recientes -->
    <section class="py-24 bg-zinc-50" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Contenido Reciente</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Actualizaciones, noticias y recursos del sector</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group block rounded-xl bg-white overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        @if($post->featured_image)
                            <div class="h-52 overflow-hidden">
                                <img class="h-full w-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                     src="{{ asset('storage/'.$post->featured_image) }}"
                                     alt="{{ $post->title }}">
                            </div>
                        @endif
                        <div class="p-6 border border-t-0 border-zinc-200 rounded-b-xl">
                            <div class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-[#021869]">
                                {{ str_replace('_', ' ', $post->type) }}
                            </div>
                            <h3 class="mt-4 text-xl font-semibold text-zinc-900 transition group-hover:text-[#021869]">
                                {{ $post->title }}
                            </h3>
                            <p class="mt-2 text-zinc-600 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                            <div class="mt-6 flex items-center text-[#0ea5a4] font-medium">
                                <span>Leer artículo</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 font-semibold text-[#0ea5a4] hover:text-[#0c8e8d] group">
                    Ver todas las entradas
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de contacto -->
    <section id="contacto" class="py-24 bg-gradient-to-b from-white to-zinc-50" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Contáctanos</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Estamos listos para ayudarte con soluciones personalizadas</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-xl shadow-xl border border-zinc-100 overflow-hidden">
                    <div class="p-8">
                        <livewire:contact-form />
                    </div>
                </div>

                <div class="space-y-8">
                   {{--  <!-- Mapa -->
                    <div class="rounded-xl overflow-hidden shadow-xl border border-zinc-100">
                        <iframe class="h-[350px] w-full" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="{{ config('branding.map_embed_src') }}"></iframe>
                    </div> --}}

                    <!-- Información de contacto -->
                    <div class="bg-white p-8 rounded-xl shadow-xl border border-zinc-100">
                        <h3 class="text-xl font-semibold text-[#021869] mb-6">Información de contacto</h3>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Teléfono</p>
                                    <p class="text-gray-600">{{ config('branding.phone', '+52 999 123 4567') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Correo electrónico</p>
                                    <p class="text-gray-600">{{ config('branding.email', 'contacto@ixxitecnologia.com') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Dirección</p>
                                    <p class="text-gray-600">{{ config('branding.address', 'Mérida, Yucatán, México') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Estilos personalizados -->
    <style>
        /* Animaciones de blob para el fondo */
        @keyframes blob {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            25% {
                transform: translate(20px, -20px) scale(1.05);
            }
            50% {
                transform: translate(0, 20px) scale(0.95);
            }
            75% {
                transform: translate(-20px, -15px) scale(1.05);
            }
        }

        .animate-blob {
            animation: blob 20s infinite;
        }

        /* Animación de rotación lenta */
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 15s linear infinite;
        }

        /* Animación de pulso suave */
        @keyframes pulse-soft {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .animate-pulse-soft {
            animation: pulse-soft 4s ease-in-out infinite;
        }

        /* Animación de rebote sutil */
        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 5s ease-in-out infinite;
        }

        /* Efecto de brillo en botones */
        @keyframes shine {
            from {
                left: -100%;
            }
            to {
                left: 200%;
            }
        }

        .animate-shine {
            animation: shine 1.5s linear;
        }

        /* Animación de inclinación sutil */
        @keyframes tilt {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(1deg);
            }
            75% {
                transform: rotate(-1deg);
            }
        }

        .animate-tilt {
            animation: tilt 10s infinite linear;
        }

        /* Escalas y transiciones adicionales */
        .scale-98 {
            transform: scale(0.98);
        }

        .hover-float {
            transition: transform 0.3s ease;
        }

        .hover-float:hover {
            transform: translateY(-10px);
        }

        /* Efecto de brillo en botones */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }

        .btn-shine:hover::before {
            content: '';
            position: absolute;
            top: 0;
            width: 45%;
            height: 100%;
            left: -100%;
            transform: skewX(-20deg);
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 1s;
        }

        /* Delays de animación */
        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Ocultar scrollbar pero permitir scroll */
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Ocultar contenido hasta que Alpine.js lo cargue */
        [x-cloak] { display: none !important; }
    </style>
</div>
