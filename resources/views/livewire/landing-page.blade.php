<div x-data="{
    showPage: false,
    // Carrusel principal (existente)
    currentSlide: 0,
    totalSlides: {{ $gallery && $gallery->count() > 0 ? $gallery->take(6)->count() : 0 }},
    isHovering: false,
    intervalId: null,
    startX: 0, endX: 0,
    startAutoplay(){
        if(!this.intervalId && this.totalSlides > 0)
            this.intervalId = setInterval(()=>{
                if(!this.isHovering)
                    this.currentSlide = (this.currentSlide + 1) % this.totalSlides
            }, 5000)
    },
    stopAutoplay(){ if(this.intervalId){ clearInterval(this.intervalId); this.intervalId = null } },
    // Carrusel crossfade del header
    headerSlide: 0,
    headerTotalSlides: {{ $gallery && $gallery->count() > 0 ? $gallery->take(6)->count() : 0 }},
    headerIntervalId: null,
    startHeaderAutoplay(){
        if(!this.headerIntervalId && this.headerTotalSlides > 0)
            this.headerIntervalId = setInterval(()=>{
                this.headerSlide = (this.headerSlide + 1) % this.headerTotalSlides
            }, 5000)
    },
    stopHeaderAutoplay(){
        if(this.headerIntervalId){
            clearInterval(this.headerIntervalId);
            this.headerIntervalId = null
        }
    }
}"
     x-init="setTimeout(()=>{ showPage = true; startAutoplay(); startHeaderAutoplay() }, 100)"
     x-cloak>

    <!-- 1) HERO PRINCIPAL OPTIMIZADO -->
    <header class="relative min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-[#021869] via-[#0a1f4c] to-[#021869] overflow-hidden">
        <!-- Fondo animado mejorado -->
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute top-1/4 left-10 w-96 h-96 bg-[#0ea5a4]/20 rounded-full filter blur-3xl animate-blob opacity-40"></div>
            <div class="absolute bottom-1/4 right-10 w-80 h-80 bg-blue-400/20 rounded-full filter blur-3xl animate-blob animation-delay-2000 opacity-40"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-indigo-400/10 rounded-full filter blur-3xl animate-pulse opacity-30"></div>
        </div>

        <!-- Contenedor principal del hero -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 pt-20 pb-16" x-show="showPage" x-transition:enter="transition ease-out duration-1200" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <!-- Sección superior: Logo y texto principal -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <div class="relative group inline-block mb-8" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="absolute -inset-8 rounded-full blur-lg bg-gradient-to-r from-[#0ea5a4]/30 to-[#E6A4B4]/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full blur-xl bg-gradient-to-r from-[#0ea5a4]/40 to-[#021869]/40 animate-pulse scale-110"></div>
                        <img src="{{ asset('img/logo.png') }}" alt="IXXI Tecnología" class="h-32 md:h-48 lg:h-56 w-auto relative z-10 transform transition-transform duration-700 hover:scale-105 drop-shadow-2xl" />
                    </div>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6" data-aos="fade-up" data-aos-delay="300">
                    <span class="bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">Seguridad y Tecnología</span>
                    <span class="block text-[#0ea5a4] text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mt-2">para México</span>
                </h1>

                <p class="text-xl md:text-2xl text-blue-100/90 font-light max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="500">
                    Protección de última generación con tecnología avanzada
                </p>

                <div class="flex flex-wrap gap-6 justify-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="#contacto" class="group relative overflow-hidden rounded-full bg-gradient-to-r from-[#0ea5a4] to-[#E6A4B4] px-8 py-4 text-lg font-bold text-white shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-[#0ea5a4]/25">
                        <span class="relative z-10">Contáctanos Ahora</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#E6A4B4] to-[#0ea5a4] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="#galeria" class="rounded-full border-2 border-white/30 px-8 py-4 text-lg font-semibold text-white/95 backdrop-blur-sm transition-all duration-300 hover:bg-white/10 hover:border-white/50">
                        Ver Galería
                    </a>
                </div>
            </div>

            <!-- Carrusel crossfade optimizado -->
            <div class="w-full max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="900">
                @if($gallery && $gallery->count() > 0)
                    <div class="relative h-56 md:h-72 lg:h-80 w-full rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-gray-900">
                        @foreach($gallery->take(6) as $index => $item)
                            <div class="absolute inset-0 transition-opacity duration-2000 ease-in-out"
                                 :class="headerSlide === {{ $index }} ? 'opacity-100' : 'opacity-0'">
                                @if($item->image_path && file_exists(storage_path('app/public/' . $item->image_path)))
                                    <img src="{{ asset('storage/'.$item->image_path) }}"
                                         alt="{{ $item->title ?? 'Proyecto de seguridad' }}"
                                         class="w-full h-full object-cover"
                                         loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                @endif

                                <!-- Fallback cuando la imagen no carga -->
                                <div class="w-full h-full bg-gradient-to-br from-[#0ea5a4]/20 to-[#021869]/40 flex items-center justify-center" style="display: {{ $item->image_path && file_exists(storage_path('app/public/' . $item->image_path)) ? 'none' : 'flex' }};">
                                    <div class="text-center text-white">
                                        <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-lg font-semibold">{{ $item->title ?? 'Proyecto de Seguridad' }}</p>
                                    </div>
                                </div>

                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-2 drop-shadow-lg">{{ $item->title ?? 'Proyecto de Seguridad' }}</h3>
                                    <p class="text-sm md:text-base text-white/95 line-clamp-2 drop-shadow">{{ $item->description ?? 'Solución de seguridad avanzada implementada por IXXI Tecnología' }}</p>
                                </div>
                            </div>
                        @endforeach

                        <!-- Indicadores mejorados -->
                        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3 bg-black/30 backdrop-blur-sm rounded-full px-4 py-2">
                            @foreach($gallery->take(6) as $index => $item)
                                <button @click="headerSlide = {{ $index }}; stopHeaderAutoplay(); setTimeout(() => startHeaderAutoplay(), 1000)"
                                        class="w-3 h-3 md:w-4 md:h-4 rounded-full transition-all duration-300 hover:scale-110"
                                        :class="headerSlide === {{ $index }} ? 'bg-white scale-125 shadow-lg' : 'bg-white/60 hover:bg-white/80'">
                                </button>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Fallback cuando no hay datos de galería -->
                    <div class="relative h-56 md:h-72 lg:h-80 w-full rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-gradient-to-br from-[#0ea5a4]/20 to-[#021869]/40 flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-20 h-20 mx-auto mb-6 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" clip-rule="evenodd"/>
                            </svg>
                            <h3 class="text-2xl md:text-3xl font-bold mb-4">Galería de Proyectos</h3>
                            <p class="text-lg opacity-90">Próximamente mostraremos nuestros mejores proyectos</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Flecha indicadora de scroll -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce" data-aos="fade-up" data-aos-delay="1200">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </header>

    <!-- 2) SECCIÓN DE GALERÍA INTERACTIVA -->
    <section id="galeria" class="relative py-20 bg-gradient-to-br from-gray-50 to-white">
        <!-- Decoración de fondo sutil -->
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute top-20 right-10 w-64 h-64 bg-[#0ea5a4]/5 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#021869]/5 rounded-full filter blur-3xl"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-6">
            <!-- Encabezado de la sección -->
            <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
                <span class="inline-block py-2 px-4 bg-[#0ea5a4]/10 text-[#0ea5a4] rounded-full text-sm font-semibold mb-4">
                    Proyectos Destacados
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#021869] mb-6">
                    Nuestra Galería de Proyectos
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#0ea5a4] to-[#E6A4B4] mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Explora nuestros proyectos de seguridad más exitosos y las soluciones tecnológicas que hemos implementado
                </p>
            </div>

            <!-- Carrusel principal mejorado -->
            <div class="relative" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200"
                 @mouseenter="isHovering = true; stopAutoplay()"
                 @mouseleave="isHovering = false; startAutoplay()"
                 @touchstart.window="startX = $event.touches ? $event.touches[0].clientX : $event.clientX"
                 @touchend.window="endX = $event.changedTouches ? $event.changedTouches[0].clientX : $event.clientX; if(startX - endX > 50) currentSlide = (currentSlide + 1) % totalSlides; if(endX - startX > 50) currentSlide = (currentSlide - 1 + totalSlides) % totalSlides">

                <!-- Contenedor del carrusel -->
                <div class="overflow-hidden rounded-3xl shadow-2xl bg-white">
                    <div class="flex transition-transform duration-700 ease-out"
                         :style="'transform: translateX(-' + (currentSlide * 100) + '%)'">
                        @foreach($gallery->take(6) as $item)
                            <div class="w-full flex-shrink-0 relative group">
                                <!-- Imagen principal -->
                                <div class="aspect-[16/9] bg-gray-100 overflow-hidden">
                                    <img src="{{ asset('storage/'.$item->image_path) }}"
                                         alt="{{ $item->title }}"
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                         loading="lazy">
                                </div>

                                <!-- Overlay con información -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-300">
                                        <h3 class="text-2xl md:text-3xl font-bold mb-3">{{ $item->title }}</h3>
                                        <p class="text-base md:text-lg text-white/90 line-clamp-3 leading-relaxed">{{ $item->description }}</p>
                                    </div>
                                </div>

                                <!-- Badge de categoría -->
                                <div class="absolute top-6 left-6 bg-[#0ea5a4] text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                    Proyecto de Seguridad
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Controles de navegación mejorados -->
                <button @click.prevent="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides"
                        class="absolute left-6 top-1/2 -translate-y-1/2 z-20 bg-white hover:bg-gray-50 text-[#021869] rounded-full p-4 shadow-xl transition-all duration-300 hover:scale-110 group">
                    <svg class="h-6 w-6 transition-transform group-hover:-translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <button @click.prevent="currentSlide = (currentSlide + 1) % totalSlides"
                        class="absolute right-6 top-1/2 -translate-y-1/2 z-20 bg-white hover:bg-gray-50 text-[#021869] rounded-full p-4 shadow-xl transition-all duration-300 hover:scale-110 group">
                    <svg class="h-6 w-6 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Indicadores de navegación -->
                <div class="flex justify-center mt-10 space-x-4">
                    <template x-for="(_, i) in [...Array(totalSlides)]" :key="i">
                        <button @click="currentSlide = i"
                                class="w-4 h-4 rounded-full transition-all duration-300 hover:scale-110"
                                :class="currentSlide === i ? 'bg-[#0ea5a4] scale-125 shadow-lg' : 'bg-gray-300 hover:bg-gray-400'">
                        </button>
                    </template>
                </div>

                <!-- Botón para ver galería completa -->
                <div class="text-center mt-12">
                    <a href="{{ route('gallery.index') }}"
                       class="inline-flex items-center gap-3 bg-gradient-to-r from-[#0ea5a4] to-[#E6A4B4] text-white font-bold px-8 py-4 rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 group">
                        <span>Explorar Galería Completa</span>
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 3) SECCIÓN DE PRESENTACIÓN Y SERVICIOS -->
    <section class="relative py-24 bg-white overflow-hidden">
        <!-- Elementos decorativos de fondo -->
        <div class="absolute inset-0" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#0ea5a4]/20 to-transparent"></div>
            <div class="absolute top-20 right-0 w-96 h-96 bg-[#0ea5a4]/5 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-20 left-0 w-80 h-80 bg-[#021869]/5 rounded-full filter blur-3xl"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-6">
            <!-- Presentación principal -->
            <div class="max-w-5xl mx-auto text-center mb-20">
                <span class="inline-block py-2 px-4 bg-[#0ea5a4]/10 text-[#0ea5a4] rounded-full text-sm font-semibold mb-6" data-aos="fade-down" data-aos-delay="100">
                    Líderes en Seguridad Tecnológica
                </span>

                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#021869] mb-8 leading-tight" data-aos="fade-up" data-aos-delay="200">
                    Somos <span class="bg-gradient-to-r from-[#0ea5a4] to-[#E6A4B4] bg-clip-text text-transparent">IXXI TECNOLOGÍA</span>
                </h2>

                <p class="text-xl md:text-2xl text-gray-600 mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="300">
                    Experiencia comprobada en alta tecnología, inteligencia en campo y despliegue táctico diseñado para las necesidades específicas de seguridad de tu negocio.
                </p>

                <!-- Botones de acción principales -->
                <div class="flex flex-wrap gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="400">
                    <a href="#contacto" class="group relative overflow-hidden bg-gradient-to-r from-[#0ea5a4] to-[#E6A4B4] text-white font-bold px-8 py-4 rounded-full shadow-xl transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                        <span class="relative z-10">Solicitar Consulta Gratuita</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#E6A4B4] to-[#0ea5a4] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="#servicios" class="border-2 border-[#021869] text-[#021869] font-bold px-8 py-4 rounded-full transition-all duration-300 hover:bg-[#021869] hover:text-white hover:scale-105">
                        Explorar Servicios
                    </a>
                </div>

                <!-- Características destacadas con iconos mejorados -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="500">
                    <div class="group bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="flip-left" data-aos-delay="600">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0ea5a4] to-[#E6A4B4] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#021869] mb-3">Certificaciones Profesionales</h3>
                        <p class="text-gray-600 leading-relaxed">Personal altamente capacitado con certificaciones internacionales en seguridad</p>
                    </div>

                    <div class="group bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="flip-left" data-aos-delay="700">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0ea5a4] to-[#E6A4B4] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#021869] mb-3">Equipo Especializado</h3>
                        <p class="text-gray-600 leading-relaxed">Profesionales con experiencia en campo y conocimiento técnico avanzado</p>
                    </div>

                    <div class="group bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="flip-left" data-aos-delay="800">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0ea5a4] to-[#E6A4B4] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#021869] mb-3">Soporte 24/7</h3>
                        <p class="text-gray-600 leading-relaxed">Respuesta inmediata y monitoreo continuo para tu tranquilidad total</p>
                    </div>
                </div>
            </div>

            <!-- Separador visual -->
            <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent my-16"></div>

            <!-- Llamada a la acción final -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="900">
                <h3 class="text-2xl md:text-3xl font-bold text-[#021869] mb-4">
                    ¿Listo para proteger tu negocio?
                </h3>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Contáctanos hoy mismo y descubre cómo podemos fortalecer la seguridad de tu empresa con nuestras soluciones personalizadas.
                </p>
                <a href="#contacto" class="inline-flex items-center gap-3 bg-[#021869] text-white font-bold px-8 py-4 rounded-full shadow-xl hover:bg-[#0ea5a4] transition-all duration-300 hover:scale-105 group">
                    <span>Comenzar Ahora</span>
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 4) ESTADÍSTICAS (mantener estructura para futuros contadores) -->
    <section class="py-20 bg-white relative overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
        <div class="absolute inset-0 bg-gradient-to-r from-[#021869]/5 to-[#0ea5a4]/5 opacity-30 -z-10"></div>
        <div class="mx-auto max-w-7xl px-6 relative">
            <div class="text-center mb-12" data-aos="fade-down">
                <h2 class="text-3xl font-bold text-[#021869]">Nuestra Experiencia en Números</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-12 counter-section">
                <!-- Placeholder para contadores -->
                <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-4xl font-extrabold text-[#021869] counter" data-target="120">0</div>
                    <div class="mt-2 text-sm text-zinc-600">Proyectos</div>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-4xl font-extrabold text-[#021869] counter" data-target="50">0</div>
                    <div class="mt-2 text-sm text-zinc-600">Clientes</div>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-4xl font-extrabold text-[#021869] counter" data-target="24">0</div>
                    <div class="mt-2 text-sm text-zinc-600">Soporte 24/7</div>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-delay="400">
                    <div class="text-4xl font-extrabold text-[#021869] counter" data-target="10">0</div>
                    <div class="mt-2 text-sm text-zinc-600">Años</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de servicios -->
    <section id="servicios" class="py-24 bg-zinc-50" data-aos="fade-up" data-aos-duration="1000">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Nuestros Servicios</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Soluciones integrales de seguridad diseñadas específicamente para proteger tu negocio y optimizar tus operaciones</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredServices as $index => $service)
                    <a href="{{ route('services.show', $service->slug) }}" class="group block rounded-xl overflow-hidden bg-white shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        @if($service->image_path)
                            <div class="h-48 overflow-hidden">
                                <img class="h-full w-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                     src="{{ asset('storage/'.$service->image_path) }}"
                                     alt="{{ $service->title }}">
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="text-3xl text-[#0ea5a4]">{{ $service->icon }}</div>
                            <h3 class="mt-4 text-xl font-semibold text-[#021869]">{{ $service->title }}</h3>
                            <p class="mt-2 text-zinc-600">{{ $service->summary }}</p>
                            <div class="mt-6 flex items-center text-[#0ea5a4] font-medium">
                                <span>Más información</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="600">
                <a href="#servicios" class="inline-flex items-center gap-2 font-semibold text-[#0ea5a4] hover:text-[#c6789f] group">
                    Ver todos los servicios
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de testimonios -->
    <section class="py-24 bg-white" data-aos="fade-up" data-aos-duration="1000">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Testimonios</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Lo que nuestros clientes dicen sobre nuestros servicios</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials->take(3) as $index => $t)
                    <blockquote class="h-full rounded-xl bg-zinc-50 p-8 shadow-sm hover:shadow-md transition-all duration-300 border border-zinc-100" data-aos="fade-up" data-aos-delay="{{ 150 * ($index + 1) }}">
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

            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="500">
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
    <section class="py-24 bg-zinc-50" data-aos="fade-up" data-aos-duration="1000">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Contenido Reciente</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Actualizaciones, noticias y recursos del sector</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $index => $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group block rounded-xl bg-white overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ 200 * ($index + 1) }}">
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

            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="700">
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
    <section id="contacto" class="py-24 bg-gradient-to-b from-white to-zinc-50" data-aos="fade-up" data-aos-duration="1000">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl md:text-4xl font-bold text-[#021869]">Contáctanos</h2>
                <div class="w-24 h-1 bg-[#0ea5a4] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-zinc-600 max-w-3xl mx-auto">Estamos listos para ayudarte con soluciones personalizadas</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-xl shadow-xl border border-zinc-100 overflow-hidden" data-aos="fade-right" data-aos-delay="200">
                    <div class="p-8">
                        <livewire:contact-form />
                    </div>
                </div>

                <div class="space-y-8" data-aos="fade-left" data-aos-delay="400">
                   {{--  <!-- Mapa -->
                    <div class="rounded-xl overflow-hidden shadow-xl border border-zinc-100">
                        <iframe class="h-[350px] w-full" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="{{ config('branding.map_embed_src') }}"></iframe>
                    </div> --}}

                    <!-- Información de contacto -->
                    <div class="bg-white p-8 rounded-xl shadow-xl border border-zinc-100">
                        <h3 class="text-xl font-semibold text-[#021869] mb-6">Información de contacto</h3>

                        <div class="space-y-4">
                            @if($contactInfo->phone)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Teléfono</p>
                                    <a href="tel:{{ $contactInfo->phone }}" class="text-gray-600 hover:text-[#0ea5a4] transition-colors">{{ $contactInfo->phone }}</a>
                                </div>
                            </div>
                            @endif

                            @if($contactInfo->email)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Correo electrónico</p>
                                    <a href="mailto:{{ $contactInfo->email }}" class="text-gray-600 hover:text-[#0ea5a4] transition-colors">{{ $contactInfo->email }}</a>
                                </div>
                            </div>
                            @endif

                            @if($contactInfo->address)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Dirección</p>
                                    <p class="text-gray-600">{{ $contactInfo->address }}</p>
                                </div>
                            </div>
                            @endif

                            @if($contactInfo->whatsapp)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.594z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">WhatsApp</p>
                                    <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank" class="text-gray-600 hover:text-green-600 transition-colors">Enviar mensaje</a>
                                </div>
                            </div>
                            @endif

                            @if($contactInfo->business_hours_weekdays || $contactInfo->business_hours_weekends)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Horarios de atención</p>
                                    @if($contactInfo->business_hours_weekdays)
                                        <p class="text-gray-600 text-sm">{{ $contactInfo->business_hours_weekdays }}</p>
                                    @endif
                                    @if($contactInfo->business_hours_weekends)
                                        <p class="text-gray-600 text-sm">{{ $contactInfo->business_hours_weekends }}</p>
                                    @endif
                                </div>
                            </div>
                            @endif

                            @php
                                $socialLinks = $contactInfo->getSocialMediaLinks();
                                $availableSocials = array_filter($socialLinks);
                            @endphp

                            @if(!empty($availableSocials))
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm font-medium text-gray-900 mb-3">Síguenos en redes sociales</p>
                                <div class="flex space-x-3">
                                    @if(!empty($socialLinks['facebook']))
                                        <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if(!empty($socialLinks['instagram']))
                                        <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="w-8 h-8 bg-pink-600 rounded-full flex items-center justify-center text-white hover:bg-pink-700 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.611-3.132-1.551-.684-.94-.684-2.08 0-3.02.684-.94 1.835-1.551 3.132-1.551 1.297 0 2.448.611 3.132 1.551.684.94.684 2.08 0 3.02-.684.94-1.835 1.551-3.132 1.551zm7.718 0c-1.297 0-2.448-.611-3.132-1.551-.684-.94-.684-2.08 0-3.02.684-.94 1.835-1.551 3.132-1.551 1.297 0 2.448.611 3.132 1.551.684.94.684 2.08 0 3.02-.684.94-1.835 1.551-3.132 1.551z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if(!empty($socialLinks['twitter']))
                                        <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="w-8 h-8 bg-black rounded-full flex items-center justify-center text-white hover:bg-gray-800 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if(!empty($socialLinks['linkedin']))
                                        <a href="{{ $socialLinks['linkedin'] }}" target="_blank" class="w-8 h-8 bg-blue-700 rounded-full flex items-center justify-center text-white hover:bg-blue-800 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @endif
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

        /* Transición lenta para crossfade */
        .duration-2000 {
            transition-duration: 2000ms;
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

        /* Animación de flotación suave */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* Animación de deslizamiento desde la izquierda */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        /* Animación de deslizamiento desde la derecha */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        /* Animación de aparición con zoom */
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-zoom-in {
            animation: zoomIn 0.6s ease-out;
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

        /* Animaciones al scroll personalizado */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease-out;
        }

        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.6s ease-out;
        }

        .scroll-reveal-left.active {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.6s ease-out;
        }

        .scroll-reveal-right.active {
            opacity: 1;
            transform: translateX(0);
        }

        /* Efectos de hover mejorados */
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(14, 165, 164, 0.4);
            transform: translateY(-2px);
        }

        .hover-scale:hover {
            transform: scale(1.05);
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

        /* Personalización de AOS */
        [data-aos] {
            pointer-events: none;
        }

        [data-aos].aos-animate {
            pointer-events: auto;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Efectos de parallax suave */
        .parallax-element {
            transform: translateY(var(--parallax-offset, 0));
            transition: transform 0.1s ease-out;
        }
    </style>

    <!-- Script personalizado para animaciones adicionales -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Efecto parallax suave
            function updateParallax() {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.parallax-element');

                parallaxElements.forEach(element => {
                    const speed = element.dataset.speed || 0.5;
                    const yPos = -(scrolled * speed);
                    element.style.setProperty('--parallax-offset', `${yPos}px`);
                });
            }

            // Animación de contador para las estadísticas
            function animateCounters() {
                const counters = document.querySelectorAll('.counter');

                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2000; // 2 segundos
                    const start = performance.now();

                    function updateCounter(currentTime) {
                        const elapsed = currentTime - start;
                        const progress = Math.min(elapsed / duration, 1);

                        // Función de easing para suavizar la animación
                        const easeOutQuart = 1 - Math.pow(1 - progress, 4);

                        const current = Math.floor(target * easeOutQuart);
                        counter.textContent = current > 10 ? `+${current}` : current;

                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target > 10 ? `+${target}` : target;
                        }
                    }

                    requestAnimationFrame(updateCounter);
                });
            }

            // Observador de intersección para activar animaciones cuando entran en viewport
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');

                        // Activar contador si tiene la clase counter
                        if (entry.target.classList.contains('counter-section')) {
                            setTimeout(() => {
                                animateCounters();
                            }, 500);
                        }
                    }
                });
            }, observerOptions);

            // Observar elementos con animaciones personalizadas
            document.querySelectorAll('.scroll-reveal, .counter-section').forEach(el => {
                observer.observe(el);
            });

            // Actualizar parallax en scroll (throttled)
            let ticking = false;
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        updateParallax();
                        ticking = false;
                    });
                    ticking = true;
                }
            });

            // Efecto de aparición gradual de elementos
            setTimeout(() => {
                document.querySelectorAll('[data-aos]').forEach((el, index) => {
                    el.style.transitionDelay = `${index * 100}ms`;
                });
            }, 100);
        });
    </script>
</div>
