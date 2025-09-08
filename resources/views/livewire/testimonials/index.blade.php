<div class="bg-white min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-[#021869] via-[#0a268b] to-[#1a365d] py-20 md:py-32">
        <!-- Decorative Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 h-96 w-96 bg-[#0ea5a4]/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 h-96 w-96 bg-blue-500/10 rounded-full blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="flex space-x-8 opacity-5">
                    <div class="flex flex-col space-y-8">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="text-center" data-aos="fade-up" data-aos-duration="800">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-sm px-4 py-2 text-sm font-semibold text-white border border-white/20 mb-6">
                    <svg class="h-4 w-4 text-[#0ea5a4]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    Testimonios de Clientes
                </div>

                <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
                    Lo que dicen nuestros
                    <span class="bg-gradient-to-r from-[#0ea5a4] to-[#14b8a6] bg-clip-text text-transparent">clientes</span>
                </h1>

                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                    La confianza de nuestros clientes es nuestro mayor logro. Descubre las experiencias reales de empresas que han transformado su seguridad con IXXI Tecnología.
                </p>

                <!-- Statistics -->
                @if($stats['total'] > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-bold text-white mb-2">{{ $stats['total'] }}</div>
                        <div class="text-blue-200 text-sm font-medium">Testimonios Totales</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-3xl font-bold text-white">{{ $stats['average_rating'] }}</span>
                            <div class="flex">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-5 w-5 {{ $i <= $stats['average_rating'] ? 'text-yellow-400' : 'text-gray-400' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <div class="text-blue-200 text-sm font-medium">Calificación Promedio</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-bold text-white mb-2">{{ $stats['five_star_count'] }}</div>
                        <div class="text-blue-200 text-sm font-medium">Reseñas 5 Estrellas</div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Search and Filters -->
    <section class="bg-zinc-50 py-12">
        <div class="mx-auto max-w-7xl px-6">
            <div class="max-w-4xl mx-auto" data-aos="fade-up">
                <div class="bg-white rounded-3xl shadow-lg border border-zinc-200/50 p-8">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Search -->
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text"
                                   wire:model.debounce.500ms="q"
                                   placeholder="Buscar testimonios por nombre, empresa o contenido..."
                                   class="w-full pl-12 pr-4 py-4 border border-zinc-300 rounded-2xl focus:ring-2 focus:ring-[#0ea5a4] focus:border-transparent transition-all duration-300 text-base placeholder-zinc-400">
                        </div>

                        <!-- Rating Filter -->
                        <div class="flex-shrink-0">
                            <select wire:model="selectedRating"
                                    class="px-6 py-4 border border-zinc-300 rounded-2xl focus:ring-2 focus:ring-[#0ea5a4] focus:border-transparent transition-all duration-300 text-base font-medium">
                                <option value="0">Todas las calificaciones</option>
                                <option value="5">⭐⭐⭐⭐⭐ (5 estrellas)</option>
                                <option value="4">⭐⭐⭐⭐ (4 estrellas)</option>
                                <option value="3">⭐⭐⭐ (3 estrellas)</option>
                                <option value="2">⭐⭐ (2 estrellas)</option>
                                <option value="1">⭐ (1 estrella)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-16 bg-white">
        <div class="mx-auto max-w-7xl px-6">
            @if($testimonials->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($testimonials as $index => $testimonial)
                        <article class="group relative bg-white rounded-3xl p-8 shadow-lg border border-zinc-200/50 hover:shadow-2xl hover:border-[#0ea5a4]/20 transition-all duration-500 hover:-translate-y-2"
                                data-aos="fade-up"
                                data-aos-delay="{{ $index * 100 }}"
                                data-aos-duration="600">

                            <!-- Quote Icon -->
                            <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-r from-[#0ea5a4] to-[#14b8a6] rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>

                            <!-- Rating -->
                            @if($testimonial->rating)
                            <div class="flex items-center gap-1 mb-4">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-5 w-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }} transition-colors duration-200"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                                <span class="ml-2 text-sm font-semibold text-zinc-600">({{ $testimonial->rating }}/5)</span>
                            </div>
                            @endif

                            <!-- Content -->
                            <blockquote class="text-zinc-700 text-lg leading-relaxed mb-6 font-medium">
                                "{{ $testimonial->content }}"
                            </blockquote>

                            <!-- Author Info -->
                            <div class="flex items-center gap-4">
                                <!-- Avatar -->
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#021869] to-[#0a268b] rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md">
                                        {{ substr($testimonial->author_name, 0, 1) }}
                                    </div>
                                </div>

                                <!-- Author Details -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-[#021869] text-base group-hover:text-[#0ea5a4] transition-colors duration-300">
                                        {{ $testimonial->author_name }}
                                    </h3>
                                    @if($testimonial->author_role || $testimonial->company)
                                        <p class="text-zinc-600 text-sm font-medium">
                                            @if($testimonial->author_role)
                                                {{ $testimonial->author_role }}
                                                @if($testimonial->company) · @endif
                                            @endif
                                            @if($testimonial->company)
                                                <span class="text-[#0ea5a4]">{{ $testimonial->company }}</span>
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Decorative Element -->
                            <div class="absolute bottom-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300">
                                <svg class="h-8 w-8 text-[#0ea5a4]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16" data-aos="fade-up">
                    {{ $testimonials->links('pagination::tailwind') }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16" data-aos="fade-up">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-zinc-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">No se encontraron testimonios</h3>
                        <p class="text-zinc-600 mb-6">Intenta ajustar tus filtros de búsqueda para encontrar más testimonios.</p>
                        <button wire:click="$set('q', '')" wire:click="$set('selectedRating', 0)"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-[#021869] text-white font-semibold rounded-2xl hover:bg-[#0a268b] transition-all duration-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Limpiar Filtros
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-[#021869] to-[#0a268b] py-16">
        <div class="mx-auto max-w-4xl px-6 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                ¿Listo para unirte a nuestros clientes satisfechos?
            </h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Únete a las empresas que ya confían en IXXI Tecnología para proteger su infraestructura. Recibe una cotización personalizada hoy mismo.
            </p>
            <a href="#contacto"
               class="inline-flex items-center gap-3 bg-gradient-to-r from-[#0ea5a4] to-[#14b8a6] text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group">
                <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Solicitar Cotización
                <svg class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>
</div>
