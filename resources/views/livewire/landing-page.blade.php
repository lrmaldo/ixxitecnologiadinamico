<div x-data="{showPage: false}" x-init="setTimeout(() => showPage = true, 100)" x-cloak>
    <!    <section class="py-24 bg-gradient-to-b from-white to-zinc-100 dark:from-gray-900 dark:to-gray-800" x-show="showPage" 
            x-transition:enter="transition ease-out duration-700 delay-300" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between">
                <div>
                    <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
                        Testimonios
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg text-zinc-600">Lo que nuestros clientes dicen sobre nuestros servicios</p>
                </div>
                <a href="{{ route('testimonials.index') }}" class="mt-4 md:mt-0 inline-flex items-center group text-[#d9491e] font-medium hover:text-[#c03f19] transition-all duration-300">
                    <span>Ver todos los testimonios</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <!-- Carrusel de Testimonios con Scroll Horizontal -->
            <div class="mt-12 relative">
                <div class="overflow-x-auto pb-8 hide-scrollbar snap-x snap-mandatory flex space-x-6">
                    @foreach($testimonials as $index => $t)
                        <div class="snap-start w-full sm:w-[calc(100%/2-12px)] lg:w-[calc(100%/3-16px)] shrink-0"
                            x-show="showPage" 
                            x-transition:enter="transition ease-out duration-700" 
                            x-transition:enter-start="opacity-0 transform translate-y-12" 
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            style="transition-delay: {{ 400 + ($index * 150) }}ms">
                            
                            <blockquote class="h-full rounded-2xl border border-zinc-200 bg-white p-8 shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
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
                        </div>
                    @endforeach
                </div>
                
                <!-- Indicador de scroll horizontal -->
                <div class="mt-8 flex justify-center space-x-2">
                    @for($i = 0; $i < min(count($testimonials), 5); $i++)
                        <button class="h-2 w-2 rounded-full bg-zinc-300 hover:bg-[#d9491e] focus:bg-[#d9491e] transition-all duration-300"></button>
                    @endfor
                </div>
            </div>
        </div>
    </section>con animación de entrada -->
    <section class="relative overflow-hidden bg-gradient-to-br from-[#021869] via-[#0a1f4c] to-[#0b2252] text-white">
        <!-- Elementos decorativos de fondo con animación -->
        <div class="absolute inset-0 overflow-hidden opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400/30 rounded-full filter blur-3xl animate-blob"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-indigo-400/30 rounded-full filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-600/20 rounded-full filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 py-24 lg:py-32 lg:flex lg:items-center lg:gap-12 relative">
            <!-- Contenido principal con animación de fade-in -->
            <div class="max-w-2xl" x-show="showPage" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform translate-y-8" x-transition:enter-end="opacity-100 transform translate-y-0">
                <h1 class="text-5xl font-extrabold leading-tight sm:text-6xl bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                    Seguridad tecnológica y de campo para el sureste de México
                </h1>
                <p class="mt-6 text-xl text-blue-100 leading-relaxed">
                    Somos IXXI TECNOLOGÍA, expertos en soluciones integrales: alta tecnología, inteligencia en campo y despliegue táctico.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#contacto" class="group rounded-xl bg-gradient-to-r from-[#d9491e] to-[#e25a2f] px-8 py-3.5 font-semibold text-white shadow-lg transition duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-98 overflow-hidden relative">
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
            <div class="mt-16 lg:mt-0 flex-1" x-show="showPage" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 transform translate-y-12" x-transition:enter-end="opacity-100 transform translate-y-0">
                <div class="grid grid-cols-2 gap-5">
                    @foreach($gallery as $index => $item)
                        <div class="overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-2 hover:scale-[1.02]" 
                            x-show="showPage" 
                            x-transition:enter="transition ease-out duration-500" 
                            x-transition:enter-start="opacity-0 transform translate-y-8" 
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            style="transition-delay: {{ 200 + ($index * 100) }}ms">
                            <img class="h-48 w-full object-cover transition duration-700 ease-in-out hover:scale-110" src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-6 -mt-6 relative" x-show="showPage" x-transition:enter="transition ease-out duration-500 delay-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 text-sm text-blue-100 hover:text-white transition-all duration-300 group">
                Ver toda la galería
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </section>

    <section id="servicios" class="mx-auto max-w-7xl px-6 py-24" x-show="showPage" 
            x-transition:enter="transition ease-out duration-700 delay-200" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100">
        <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
            Servicios
        </h2>
        <p class="mt-4 max-w-2xl text-lg text-zinc-600">Alta tecnología e inteligencia en campo. Diseñados para proteger y optimizar.</p>
        
        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $index => $service)
                <div 
                    x-show="showPage" 
                    x-transition:enter="transition ease-out duration-700" 
                    x-transition:enter-start="opacity-0 transform translate-y-12" 
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    style="transition-delay: {{ 300 + ($index * 150) }}ms">
                    
                    <a href="{{ route('services.show', $service->slug) }}" class="group block rounded-2xl border border-zinc-200 bg-white p-8 shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2 overflow-hidden relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#021869]/5 to-[#021869]/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="text-4xl text-[#d9491e] transition-transform duration-300 group-hover:scale-110">{{ $service->icon }}</div>
                        <h3 class="mt-5 text-xl font-semibold text-zinc-900 transition group-hover:text-[#021869]">{{ $service->title }}</h3>
                        <p class="mt-3 text-zinc-600">{{ $service->summary }}</p>
                        <div class="mt-6 flex items-center text-[#d9491e] font-medium opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
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

    <section class="bg-zinc-50 py-16">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex items-end justify-between">
                <h2 class="text-3xl font-bold text-[#021869]">Testimonios</h2>
                <a href="{{ route('testimonials.index') }}" class="text-sm text-[#d9491e] hover:underline">Ver más</a>
            </div>
            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($testimonials as $t)
                    <blockquote class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition hover:shadow-lg hover:-translate-y-1">
                        <p class="text-zinc-800">“{{ $t->content }}”</p>
                        <div class="mt-4 text-sm text-zinc-600">— {{ $t->author_name }} @if($t->company) · {{ $t->company }} @endif</div>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-24" x-show="showPage" 
            x-transition:enter="transition ease-out duration-700 delay-400" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100">
        <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
            Contenido más reciente
        </h2>
        <p class="mt-4 max-w-2xl text-lg text-zinc-600">Actualizaciones, noticias y recursos del sector</p>
        
        <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach($posts as $index => $post)
                <div 
                    x-show="showPage" 
                    x-transition:enter="transition ease-out duration-700" 
                    x-transition:enter-start="opacity-0 transform translate-y-12" 
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    style="transition-delay: {{ 500 + ($index * 150) }}ms">
                    
                    <a href="{{ route('blog.show', $post->slug) }}" class="group block rounded-2xl bg-white overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
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

    <section id="contacto" class="bg-gradient-to-b from-zinc-50 to-white py-24" x-show="showPage" 
            x-transition:enter="transition ease-out duration-700 delay-500" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100">
        <div class="mx-auto max-w-7xl px-6">
            <h2 class="text-4xl font-bold text-[#021869] relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-1/3 after:h-1 after:bg-[#d9491e] after:rounded-full">
                Contáctanos
            </h2>
            <p class="mt-4 max-w-2xl text-lg text-zinc-600">Estamos listos para ayudarte con soluciones personalizadas</p>
            
            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-2xl shadow-xl border border-zinc-100 overflow-hidden" 
                    x-show="showPage" 
                    x-transition:enter="transition ease-out duration-700" 
                    x-transition:enter-start="opacity-0 transform translate-x-12" 
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    style="transition-delay: 600ms">
                    <div class="p-8">
                        <livewire:contact-form />
                    </div>
                </div>
                
                <div class="space-y-8" 
                    x-show="showPage" 
                    x-transition:enter="transition ease-out duration-700" 
                    x-transition:enter-start="opacity-0 transform translate-x-12" 
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    style="transition-delay: 700ms">
                    
                    <!-- Mapa -->
                    <div class="rounded-2xl overflow-hidden shadow-xl border border-zinc-100">
                        <iframe class="h-[350px] w-full" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="{{ config('branding.map_embed_src') }}"></iframe>
                    </div>
                    
                    <!-- Información de contacto -->
                    <div class="bg-white p-8 rounded-2xl shadow-xl border border-zinc-100">
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
            
            <a href="https://wa.me/{{ config('branding.whatsapp') }}" 
               class="fixed bottom-6 right-6 inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-green-600 px-6 py-3 font-medium text-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 active:scale-95 group z-50" 
               target="_blank" rel="noopener"
               x-show="showPage"
               x-transition:enter="transition ease-out duration-700 delay-1000"
               x-transition:enter-start="opacity-0 transform translate-y-12"
               x-transition:enter-end="opacity-100 transform translate-y-0">
                <span class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 relative">
                    <path d="M20.52 3.48A11.94 11.94 0 0012 0C5.38 0 0 5.38 0 12c0 2.11.55 4.18 1.6 6.01L0 24l6.15-1.6A11.93 11.93 0 0012 24c6.62 0 12-5.38 12-12 0-3.2-1.25-6.21-3.48-8.52zM12 22a9.93 9.93 0 01-5.05-1.39l-.36-.21-3.65.95.98-3.56-.24-.37A9.95 9.95 0 1122 12c0 5.52-4.48 10-10 10zm5.64-7.36c-.31-.16-1.83-.9-2.11-1-.28-.1-.48-.16-.68.16-.2.31-.77 1-.94 1.2-.17.2-.35.23-.66.08-.31-.16-1.29-.47-2.46-1.49-.91-.81-1.53-1.81-1.71-2.12-.18-.31-.02-.48.13-.64.13-.13.31-.35.46-.53.15-.18.2-.31.31-.52.1-.2.05-.39-.02-.55-.08-.16-.68-1.64-.93-2.25-.25-.6-.5-.52-.68-.53h-.58c-.2 0-.52.08-.79.39-.27.31-1.04 1.02-1.04 2.5 0 1.48 1.07 2.92 1.22 3.12.16.2 2.1 3.2 5.08 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.88.12.57-.09 1.83-.75 2.09-1.47.26-.72.26-1.34.18-1.47-.08-.13-.28-.2-.59-.36z"/>
                </svg>
                <span class="relative">WhatsApp</span>
            </a>
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
