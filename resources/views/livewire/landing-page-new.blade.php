<div x-data="{showPage: false}" x-init="setTimeout(() => { showPage = true; AOS.init({duration: 800, once: false, mirror: true}); }, 100)" x-cloak>
    <!-- Hero Section con parallax y efectos de animación -->
    <section class="relative overflow-hidden bg-gradient-to-br from-[#021869] via-[#0a1f4c] to-[#0b2252] text-white parallax-bg"
             x-show="showPage"
             x-transition:enter="transition ease-out duration-700 delay-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100">
        <!-- Elementos decorativos de fondo con animación -->
        <div class="absolute inset-0 overflow-hidden opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400/30 rounded-full filter blur-3xl animate-blob"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-indigo-400/30 rounded-full filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-600/20 rounded-full filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 py-28 lg:py-36 lg:flex lg:items-center lg:gap-12 relative">
            <!-- Contenido principal con animación de fade-in -->
            <div class="max-w-2xl" data-aos="fade-up" data-aos-delay="100">
                <h1 class="text-5xl font-extrabold leading-tight sm:text-6xl bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                    Seguridad tecnológica y de campo para México
                </h1>
                <p class="mt-6 text-xl text-blue-100 leading-relaxed">
                    Somos IXXI TECNOLOGÍA, expertos en soluciones integrales: alta tecnología, inteligencia en campo y despliegue táctico.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#contacto" class="group rounded-xl bg-gradient-to-r from-[#d9491e] to-[#e25a2f] px-8 py-3.5 font-semibold text-white shadow-lg transition duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-98 overflow-hidden relative btn-shine">
                        <span class="relative z-10">Cotiza ahora</span>
                        <span class="absolute inset-0 bg-gradient-to-r from-[#e25a2f] to-[#d9491e] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                    <a href="#servicios" class="group rounded-xl border border-white/30 bg-white/10 backdrop-blur-sm px-8 py-3.5 font-semibold text-white transition duration-300 hover:bg-white/20 hover:-translate-y-1 hover:shadow-lg">
                        Ver servicios
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Galería de imágenes con animación de entrada escalonada -->
            <div class="mt-16 lg:mt-0 flex-1" data-aos="fade-left" data-aos-delay="300">
                <div class="grid grid-cols-2 gap-5">
                    @foreach($gallery->take(4) as $index => $item)
                        <div class="overflow-hidden rounded-2xl shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-2 hover:scale-[1.02]"
                            data-aos="fade-up"
                            data-aos-delay="{{ 400 + ($index * 100) }}">
                            <img class="h-48 w-full object-cover transition duration-700 ease-in-out hover:scale-110"
                                 src="{{ asset('storage/'.$item->image_path) }}"
                                 alt="{{ $item->title }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-6 -mt-6 relative pb-12">
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 text-sm text-blue-100 hover:text-white transition-all duration-300 group">
                Ver toda la galería
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Estadísticas con contadores -->
    <section class="py-16 bg-white relative overflow-hidden" data-aos="fade-up">
        <div class="absolute inset-0 bg-[#021869]/5 opacity-30 -z-10"></div>
        <div class="mx-auto max-w-7xl px-6 relative">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl lg:text-5xl font-bold text-[#021869]">{{ $services->count() }}+</div>
                    <p class="mt-2 text-zinc-600">Servicios</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl lg:text-5xl font-bold text-[#021869]">{{ $testimonials->count() }}+</div>
                    <p class="mt-2 text-zinc-600">Clientes satisfechos</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl lg:text-5xl font-bold text-[#021869]">10+</div>
                    <p class="mt-2 text-zinc-600">Años de experiencia</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-4xl lg:text-5xl font-bold text-[#021869]">{{ $visitCount }}+</div>
                    <p class="mt-2 text-zinc-600">Visitas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios Destacados -->
    <section id="servicios-destacados" class="py-24 bg-gradient-to-b from-white to-zinc-50" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="inline-block text-4xl font-bold text-[#021869] relative after:content-[''] after:absolute after:-bottom-2 after:left-1/4 after:w-1/2 after:h-1 after:bg-[#d9491e] after:rounded-full">
                    Servicios Destacados
                </h2>
                <p class="mt-6 text-lg text-zinc-600">Descubre nuestras soluciones más solicitadas para la seguridad y optimización de tu empresa</p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredServices as $index => $service)
                    <div class="hover-float" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                        <div class="relative group rounded-2xl bg-white border border-zinc-200 p-8 shadow-md overflow-hidden h-full flex flex-col">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#021869]/5 to-[#021869]/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="text-5xl text-[#d9491e] transition-transform duration-300 group-hover:scale-110 mb-5">{{ $service->icon }}</div>
                            <h3 class="text-2xl font-bold text-[#021869] mb-3">{{ $service->title }}</h3>
                            <p class="text-zinc-600 flex-1">{{ $service->summary }}</p>
                            <div class="mt-6">
                                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center text-[#d9491e] font-medium group">
                                    <span class="relative">Ver detalles</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Servicios Principales -->
    <section id="servicios" class="mx-auto max-w-7xl px-6 py-24" data-aos="fade-up">
        <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
            Todos Nuestros Servicios
        </h2>
        <p class="mt-4 max-w-2xl text-lg text-zinc-600">Alta tecnología e inteligencia en campo. Diseñados para proteger y optimizar.</p>

        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $index => $service)
                <div class="fade-up-trigger" data-aos="fade-up" data-aos-delay="{{ 150 + ($index * 50) }}">
                    <a href="{{ route('services.show', $service->slug) }}" class="group block rounded-2xl border border-zinc-200 bg-white p-8 shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-2 overflow-hidden relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#021869]/5 to-[#021869]/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="text-4xl text-[#d9491e] transition-transform duration-500 group-hover:scale-110">{{ $service->icon }}</div>
                        <h3 class="mt-5 text-xl font-semibold text-zinc-900 transition group-hover:text-[#021869]">{{ $service->title }}</h3>
                        <p class="mt-3 text-zinc-600">{{ $service->summary }}</p>
                        <div class="mt-6 flex items-center text-[#d9491e] font-medium opacity-0 transform translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                            <span>Más información</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Carrusel de Testimonios -->
    <section class="py-24 bg-gradient-to-b from-zinc-50 to-white" data-aos="fade-up">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between">
                <div>
                    <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
                        Testimonios
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg text-zinc-600">Lo que nuestros clientes dicen sobre nuestros servicios</p>
                </div>
                <a href="{{ route('testimonials.index') }}" class="mt-4 md:mt-0 inline-flex items-center group text-[#d9491e] font-medium hover:text-[#c03f19] transition-all duration-300 btn-shine">
                    <span>Ver todos los testimonios</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Carrusel de Testimonios con Scroll Horizontal y Autoplay -->
            <div class="mt-12 relative" x-data="{ activeSlide: 0, totalSlides: {{ min(count($testimonials), 5) }} }" x-init="
                setInterval(() => {
                    activeSlide = (activeSlide + 1) % totalSlides;
                }, 5000);
            ">
                <div class="overflow-x-auto pb-8 hide-scrollbar snap-x snap-mandatory flex space-x-6">
                    @foreach($testimonials as $index => $t)
                        <div class="snap-start w-full sm:w-[calc(100%/2-12px)] lg:w-[calc(100%/3-16px)] shrink-0"
                            data-aos="fade-up"
                            data-aos-delay="{{ 400 + ($index * 100) }}">

                            <blockquote class="h-full rounded-2xl border border-zinc-200 bg-white p-8 shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-2 hover-float">
                                <div class="flex mb-5">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 {{ $i < ($t->rating ?? 5) ? 'text-yellow-400' : 'text-zinc-300' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-lg text-zinc-700 italic leading-relaxed">
                                    "{{ Str::limit($t->content, 150) }}"
                                </p>
                                <div class="mt-6 pt-6 border-t border-zinc-200 flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-[#021869] to-[#0b2252] flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr($t->author_name ?? 'A', 0, 1)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-semibold text-zinc-900">{{ $t->author_name }}</div>
                                        @if($t->company)
                                            <div class="text-sm text-zinc-500">{{ $t->company }}</div>
                                        @endif
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    @endforeach
                </div>

                <!-- Indicador de scroll horizontal con animación -->
                <div class="mt-8 flex justify-center space-x-2">
                    @for($i = 0; $i < min(count($testimonials), 5); $i++)
                        <button
                            @click="activeSlide = {{ $i }}"
                            class="h-3 w-3 rounded-full transition-all duration-300"
                            :class="activeSlide === {{ $i }} ? 'bg-[#d9491e] scale-125' : 'bg-zinc-300 hover:bg-zinc-400'">
                        </button>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido más reciente con animación -->
    <section class="mx-auto max-w-7xl px-6 py-24" data-aos="fade-up" data-aos-delay="100">
        <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
            Contenido más reciente
        </h2>
        <p class="mt-4 max-w-2xl text-lg text-zinc-600">Actualizaciones, noticias y recursos del sector</p>

        <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach($posts as $index => $post)
                <div data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 150) }}">
                    <a href="{{ route('blog.show', $post->slug) }}" class="group block rounded-2xl bg-white overflow-hidden shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-2">
                        @if($post->featured_image)
                            <div class="h-52 overflow-hidden">
                                <img class="h-full w-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                     src="{{ asset('storage/'.$post->featured_image) }}"
                                     alt="{{ $post->title }}">
                            </div>
                        @endif
                        <div class="p-6 border border-t-0 border-zinc-200 rounded-b-2xl">
                            <div class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-[#021869]">
                                {{ str_replace('_', ' ', $post->type) }}
                            </div>
                            <h3 class="mt-4 text-xl font-semibold text-zinc-900 transition group-hover:text-[#021869]">
                                {{ $post->title }}
                            </h3>
                            <p class="mt-2 text-zinc-600 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                            <div class="mt-6 flex items-center text-[#d9491e] font-medium transition-all duration-300 group-hover:translate-x-1">
                                <span>Leer artículo</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Sección de Contacto con Efecto Parallax -->
    <section id="contacto" class="relative py-24" data-aos="fade-up">
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-50 to-white -z-10"></div>
        <div class="mx-auto max-w-7xl px-6">
            <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
                Contáctanos
            </h2>
            <p class="mt-4 max-w-2xl text-lg text-zinc-600">Estamos listos para ayudarte con soluciones personalizadas</p>

            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-2xl shadow-xl border border-zinc-100 overflow-hidden hover-float"
                    data-aos="fade-right"
                    data-aos-delay="200">
                    <div class="p-8">
                        <livewire:contact-form />
                    </div>
                </div>

                <div class="space-y-8" data-aos="fade-left" data-aos-delay="300">
                    <!-- Mapa con animación de entrada -->
                    <div class="rounded-2xl overflow-hidden shadow-xl border border-zinc-100 hover-float">
                        <iframe class="h-[350px] w-full" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="{{ config('branding.map_embed_src') }}"></iframe>
                    </div>

                    <!-- Información de contacto con iconos animados -->
                    <div class="bg-white p-8 rounded-2xl shadow-xl border border-zinc-100 hover-float">
                        <h3 class="text-xl font-semibold text-[#021869] mb-6">Información de contacto</h3>

                        <div class="space-y-4">
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Teléfono</p>
                                    <p class="mt-1 text-sm text-gray-600">{{ config('branding.phone', '+52 999 123 4567') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start group">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Email</p>
                                    <p class="mt-1 text-sm text-gray-600">{{ config('branding.email', 'contacto@ixxitecnologia.com') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start group">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Dirección</p>
                                    <p class="mt-1 text-sm text-gray-600">{{ config('branding.address', 'Mérida, Yucatán, México') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
