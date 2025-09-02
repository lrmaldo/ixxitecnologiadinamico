<div x-data="{showPage: false}" x-init="setTimeout(() => { showPage = true; AOS.init({duration: 800, once: false, mirror: true}); }, 100)" x-cloak>
    <!-- Hero Section con parallax y efectos de animación mejorados -->
    <section class="relative overflow-hidden min-h-[90vh] flex items-center bg-gradient-to-br from-[#021869] via-[#0a1f4c] to-[#0b2252] text-white"
             x-show="showPage"
             x-transition:enter="transition ease-out duration-700 delay-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100">
        <!-- Elementos decorativos de fondo con animación -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Partículas animadas con efecto de profundidad -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400/30 rounded-full filter blur-3xl animate-blob opacity-20"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-indigo-400/30 rounded-full filter blur-3xl animate-blob animation-delay-2000 opacity-20"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-600/20 rounded-full filter blur-3xl animate-blob animation-delay-4000 opacity-20"></div>

            <!-- Elementos geométricos flotantes -->
            <div class="hidden lg:block absolute top-32 right-24 w-64 h-64 border-2 border-white/10 rounded-full animate-spin-slow"></div>
            <div class="hidden lg:block absolute bottom-40 left-20 w-40 h-40 border-2 border-white/10 rounded-full animate-spin-slow animation-delay-2000"></div>

            <!-- Grid de fondo -->
            <div class="absolute inset-0 bg-[url('/img/grid-pattern.svg')] bg-center opacity-5"></div>

            <!-- Gradiente de oscurecimiento -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#021869] via-transparent to-transparent opacity-40"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 py-16 w-full relative z-10">
            <div class="grid lg:grid-cols-5 gap-12 items-center">
                <!-- Contenido principal con animación de fade-in -->
                <div class="lg:col-span-3" data-aos="fade-right" data-aos-duration="1000">
                    <div class="relative">
                        <!-- Elemento decorativo -->
                        <div class="absolute -left-6 -top-6 w-20 h-20 border-l-2 border-t-2 border-[#d9491e]/70 rounded-tl-xl"></div>

                        <span class="inline-block py-1 px-3 bg-[#d9491e]/20 text-[#d9491e] rounded-full text-sm font-semibold mb-4 backdrop-blur-sm border border-[#d9491e]/20">
                            Soluciones de Seguridad Integrales
                        </span>

                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200 mb-6">
                            <span class="block">Seguridad tecnológica</span>
                            <span class="relative">
                                y de campo para México
                                <svg class="absolute -bottom-3 left-0 w-48 h-3 text-[#d9491e]" viewBox="0 0 200 8" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5.5C47.6667 -0.5 154.6 -1.7 199 5.5" stroke="currentColor" stroke-width="3" fill="none"/>
                                </svg>
                            </span>
                        </h1>

                        <p class="mt-8 text-xl text-blue-100 leading-relaxed max-w-2xl">
                            Somos <span class="font-semibold text-white">IXXI TECNOLOGÍA</span>, expertos en soluciones integrales: alta tecnología, inteligencia en campo y despliegue táctico diseñado específicamente para las necesidades de seguridad de tu negocio.
                        </p>

                        <div class="mt-10 flex flex-wrap gap-5">
                            <a href="#contacto" class="group rounded-xl bg-gradient-to-r from-[#d9491e] to-[#e25a2f] px-8 py-4 font-semibold text-white shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 overflow-hidden relative">
                                <span class="relative z-10">Cotiza ahora</span>
                                <span class="absolute inset-0 bg-gradient-to-r from-[#e25a2f] to-[#d9491e] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                <!-- Animación de brillo al hover -->
                                <span class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-40 group-hover:animate-shine"></span>
                            </a>

                            <a href="#servicios" class="group rounded-xl border border-white/30 bg-white/10 backdrop-blur-sm px-8 py-4 font-semibold text-white transition-all duration-300 hover:bg-white/20 hover:-translate-y-1 hover:shadow-lg flex items-center">
                                <span>Ver servicios</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        <!-- Insignias o etiquetas -->
                        <div class="mt-12 flex flex-wrap gap-4">
                            <div class="flex items-center bg-white/10 backdrop-blur-sm py-2 px-4 rounded-full border border-white/20">
                                <svg class="h-5 w-5 text-[#d9491e]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 text-sm">Certificados</span>
                            </div>
                            <div class="flex items-center bg-white/10 backdrop-blur-sm py-2 px-4 rounded-full border border-white/20">
                                <svg class="h-5 w-5 text-[#d9491e]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                <span class="ml-2 text-sm">Personal Capacitado</span>
                            </div>
                            <div class="flex items-center bg-white/10 backdrop-blur-sm py-2 px-4 rounded-full border border-white/20">
                                <svg class="h-5 w-5 text-[#d9491e]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 text-sm">Respuesta Inmediata</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Galería de imágenes con diseño moderno -->
                <div class="lg:col-span-2 relative" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                    <!-- Marco decorativo -->
                    <div class="absolute -inset-4 border-2 border-white/10 rounded-2xl -z-10 hidden lg:block"></div>

                    <!-- Grid de imágenes con efectos -->
                    <div class="grid grid-cols-2 gap-6">
                        @foreach($gallery->take(4) as $index => $item)
                            <div class="group relative rounded-2xl overflow-hidden shadow-lg transition-all duration-500 {{ $index % 2 == 0 ? 'translate-y-6' : '' }}"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ 400 + ($index * 100) }}">
                                <!-- Capa de gradiente al hover -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[#021869]/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                                <img class="h-56 w-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110"
                                     src="{{ asset('storage/'.$item->image_path) }}"
                                     alt="{{ $item->title }}">

                                <!-- Texto que aparece al hover -->
                                <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-20">
                                    <p class="text-white font-medium text-sm">{{ $item->title }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Botón de ver más -->
                    <div class="mt-8 text-center lg:text-right">
                        <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 text-sm text-blue-100 hover:text-white transition-all duration-300 group px-4 py-2 rounded-full hover:bg-white/10">
                            Ver toda la galería
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Wave divider -->
            <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white to-transparent"></div>
        </div>

        <!-- Waves SVG -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-[100px]">
                <path fill="#ffffff" fill-opacity="1" d="M0,224L80,213.3C160,203,320,181,480,181.3C640,181,800,203,960,213.3C1120,224,1280,224,1360,224L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Estadísticas con contadores y animaciones -->
    <section class="py-20 bg-white relative overflow-hidden" data-aos="fade-up">
        <!-- Fondo con efecto de patrón y gradiente -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#021869]/5 to-[#d9491e]/5 opacity-30 -z-10"></div>
        <div class="absolute inset-0 bg-[url('/img/dot-pattern.svg')] opacity-10 -z-10"></div>

        <div class="mx-auto max-w-7xl px-6 relative">
            <!-- Título de sección -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-[#021869]">Nuestra Experiencia en Números</h2>
                <div class="w-24 h-1 bg-[#d9491e] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-12">
                <!-- Servicios con animación de contador -->
                <div class="relative group" data-aos="zoom-in" data-aos-delay="100">
                    <!-- Círculo decorativo con gradiente -->
                    <div class="absolute -inset-1 bg-gradient-to-br from-[#021869] to-[#0b2252] rounded-lg opacity-70 blur group-hover:opacity-100 transition duration-500 group-hover:duration-200 animate-tilt"></div>

                    <div class="relative p-6 bg-white rounded-lg shadow-lg border border-zinc-100 text-center transform transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#021869] to-[#0b2252] rounded-full flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="text-4xl lg:text-5xl font-bold text-[#021869]"
                                 x-data="{ count: 0, target: {{ $services->count() }} }"
                                 x-init="() => {
                                     let interval = setInterval(() => {
                                         count = count + 1;
                                         if(count >= target) {
                                             count = target;
                                             clearInterval(interval);
                                         }
                                     }, 50);
                                 }"
                                 x-text="count + '+'">0+</div>
                            <p class="mt-3 text-zinc-600 font-medium">Servicios</p>
                        </div>
                    </div>
                </div>

                <!-- Clientes satisfechos con animación de contador -->
                <div class="relative group" data-aos="zoom-in" data-aos-delay="200">
                    <div class="absolute -inset-1 bg-gradient-to-br from-[#d9491e] to-[#e25a2f] rounded-lg opacity-70 blur group-hover:opacity-100 transition duration-500 group-hover:duration-200 animate-tilt"></div>

                    <div class="relative p-6 bg-white rounded-lg shadow-lg border border-zinc-100 text-center transform transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#d9491e] to-[#e25a2f] rounded-full flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905a3.61 3.61 0 01-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="text-4xl lg:text-5xl font-bold text-[#d9491e]"
                                 x-data="{ count: 0, target: {{ $testimonials->count() }} }"
                                 x-init="() => {
                                     let interval = setInterval(() => {
                                         count = count + 1;
                                         if(count >= target) {
                                             count = target;
                                             clearInterval(interval);
                                         }
                                     }, 40);
                                 }"
                                 x-text="count + '+'">0+</div>
                            <p class="mt-3 text-zinc-600 font-medium">Clientes satisfechos</p>
                        </div>
                    </div>
                </div>

                <!-- Años de experiencia con animación de contador -->
                <div class="relative group" data-aos="zoom-in" data-aos-delay="300">
                    <div class="absolute -inset-1 bg-gradient-to-br from-[#021869] to-[#0b2252] rounded-lg opacity-70 blur group-hover:opacity-100 transition duration-500 group-hover:duration-200 animate-tilt"></div>

                    <div class="relative p-6 bg-white rounded-lg shadow-lg border border-zinc-100 text-center transform transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#021869] to-[#0b2252] rounded-full flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="text-4xl lg:text-5xl font-bold text-[#021869]"
                                 x-data="{ count: 0, target: 10 }"
                                 x-init="() => {
                                     let interval = setInterval(() => {
                                         count = count + 1;
                                         if(count >= target) {
                                             count = target;
                                             clearInterval(interval);
                                         }
                                     }, 200);
                                 }"
                                 x-text="count + '+'">0+</div>
                            <p class="mt-3 text-zinc-600 font-medium">Años de experiencia</p>
                        </div>
                    </div>
                </div>

                <!-- Visitas con animación de contador -->
                <div class="relative group" data-aos="zoom-in" data-aos-delay="400">
                    <div class="absolute -inset-1 bg-gradient-to-br from-[#d9491e] to-[#e25a2f] rounded-lg opacity-70 blur group-hover:opacity-100 transition duration-500 group-hover:duration-200 animate-tilt"></div>

                    <div class="relative p-6 bg-white rounded-lg shadow-lg border border-zinc-100 text-center transform transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#d9491e] to-[#e25a2f] rounded-full flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="text-4xl lg:text-5xl font-bold text-[#d9491e]"
                                 x-data="{ count: 0, target: {{ $visitCount }} }"
                                 x-init="() => {
                                     let interval = setInterval(() => {
                                         count = Math.min(count + Math.ceil(target/20), target);
                                         if(count >= target) {
                                             count = target;
                                             clearInterval(interval);
                                         }
                                     }, 30);
                                 }"
                                 x-text="count + '+'">0+</div>
                            <p class="mt-3 text-zinc-600 font-medium">Visitas</p>
                        </div>
                    </div>
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

    <!-- Sección de Contacto con Efecto Parallax y Diseño Moderno -->
    <section id="contacto" class="relative py-24 overflow-hidden" data-aos="fade-up">
        <!-- Elementos decorativos de fondo con animación -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute top-20 right-0 w-96 h-96 bg-[#021869]/10 rounded-full filter blur-3xl animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-10 left-20 w-80 h-80 bg-[#d9491e]/5 rounded-full filter blur-3xl animate-blob"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 relative">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-4xl font-bold text-[#021869] relative inline-block mx-auto after:content-[''] after:absolute after:-bottom-2 after:left-1/4 after:w-1/2 after:h-1 after:bg-[#d9491e] after:rounded-full">
                    Contáctanos
                </h2>
                <p class="mt-6 max-w-2xl text-lg text-zinc-600 mx-auto">Estamos listos para ayudarte a implementar soluciones personalizadas de seguridad para tu negocio</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <!-- Formulario de contacto con diseño mejorado -->
                <div class="lg:col-span-3 relative" data-aos="fade-right" data-aos-delay="200">
                    <div class="bg-white rounded-2xl shadow-xl border border-zinc-100 overflow-hidden hover-float backdrop-blur-sm relative z-10 transform transition-all duration-500">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#021869]/5 to-[#021869]/0 opacity-30 rounded-2xl"></div>
                        <div class="p-8 lg:p-10">
                            <livewire:contact-form />
                        </div>
                    </div>
                </div>

                <!-- Tarjetas de información de contacto con diseño moderno -->
                <div class="lg:col-span-2" data-aos="fade-left" data-aos-delay="300">
                    <!-- Tarjetas de información con animaciones y efectos hover -->
                    <div class="space-y-6">
                        <div class="bg-gradient-to-r from-[#021869] to-[#0b2252] p-1 rounded-2xl hover-float group">
                            <div class="bg-white rounded-xl p-6 h-full transform transition duration-500 group-hover:bg-opacity-95">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#021869]/10 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5">
                                        <h3 class="text-lg font-semibold text-[#021869]">Llámanos</h3>
                                        <p class="mt-1 text-zinc-600 text-lg">{{ $contactInfo->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-[#d9491e] to-[#e25a2f] p-1 rounded-2xl hover-float group">
                            <div class="bg-white rounded-xl p-6 h-full transform transition duration-500 group-hover:bg-opacity-95">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#d9491e]/10 flex items-center justify-center text-[#d9491e] group-hover:bg-[#d9491e] group-hover:text-white transition-all duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5">
                                        <h3 class="text-lg font-semibold text-[#021869]">Escríbenos</h3>
                                        <p class="mt-1 text-zinc-600 text-lg">{{ $contactInfo->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-[#0a1f4c] to-[#021869] p-1 rounded-2xl hover-float group">
                            <div class="bg-white rounded-xl p-6 h-full transform transition duration-500 group-hover:bg-opacity-95">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#021869]/10 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5">
                                        <h3 class="text-lg font-semibold text-[#021869]">Visítanos</h3>
                                        <p class="mt-1 text-zinc-600 text-lg">{{ $contactInfo->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Horarios de Atención -->
                        <div class="bg-gradient-to-r from-[#021869] to-[#0b2252] p-1 rounded-2xl hover-float group">
                            <div class="bg-white rounded-xl p-6 h-full transform transition duration-500 group-hover:bg-opacity-95">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#021869]/10 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5">
                                        <h3 class="text-lg font-semibold text-[#021869]">Horario de Atención</h3>
                                        <p class="mt-1 text-zinc-600">{{ $contactInfo->business_hours_weekdays }}</p>
                                        <p class="text-zinc-600">{{ $contactInfo->business_hours_weekends }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Redes Sociales -->
            <div class="mt-16 flex justify-center" data-aos="fade-up" data-aos-delay="400">
                <div class="flex items-center space-x-6">
                    @php
                        $socialLinks = $contactInfo->getSocialMediaLinks();
                    @endphp

                    @if(!empty($socialLinks['facebook']))
                    <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="group">
                        <div class="w-12 h-12 rounded-full bg-zinc-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-300 transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                        </div>
                    </a>
                    @endif

                    @if(!empty($socialLinks['instagram']))
                    <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="group">
                        <div class="w-12 h-12 rounded-full bg-zinc-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-300 transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                    </a>
                    @endif

                    @if(!empty($socialLinks['twitter']))
                    <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="group">
                        <div class="w-12 h-12 rounded-full bg-zinc-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-300 transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </div>
                    </a>
                    @endif

                    @if(!empty($socialLinks['linkedin']))
                    <a href="{{ $socialLinks['linkedin'] }}" target="_blank" class="group">
                        <div class="w-12 h-12 rounded-full bg-zinc-100 flex items-center justify-center text-[#021869] group-hover:bg-[#021869] group-hover:text-white transition-all duration-300 transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                            </svg>
                        </div>
                    </a>
                    @endif
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
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 15s linear infinite;
        }

        /* Animación de brillo para botones */
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
