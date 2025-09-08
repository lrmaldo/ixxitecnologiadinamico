<div class="min-h-screen bg-gradient-to-b from-white via-zinc-50/30 to-white"
     x-data="{
        open: false,
        idx: 0,
        loading: true,
        viewMode: 'grid',
        images: @js($items->map(fn($i) => [
            'src' => asset('storage/'.$i->image_path),
            'title' => $i->title,
            'description' => $i->description ?? ''
        ])->values()),
        openLightbox(i){
            this.idx = i;
            this.open = true;
            document.body.style.overflow='hidden';
        },
        close(){
            this.open = false;
            document.body.style.overflow='';
        },
        prev(){
            if(!this.images.length) return;
            this.idx = (this.idx - 1 + this.images.length) % this.images.length;
        },
        next(){
            if(!this.images.length) return;
            this.idx = (this.idx + 1) % this.images.length;
        }
     }"
     x-init="setTimeout(() => loading = false, 300)"
     @keydown.escape.window="close()"
     @keydown.arrow-left.window="prev()"
     @keydown.arrow-right.window="next()">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-[#021869] via-[#0a1f4c] to-[#0b2252] text-white py-24"
             data-aos="fade-down">
        <!-- Elementos decorativos de fondo -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400/30 rounded-full filter blur-3xl animate-blob"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400/30 rounded-full filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-5xl lg:text-6xl font-extrabold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                    Galería
                </h1>
                <p class="text-xl lg:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed font-light">
                    Explora nuestro portafolio visual de proyectos, soluciones tecnológicas y momentos destacados
                </p>
            </div>

            <!-- Estadísticas -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-white mb-2">{{ $items->total() }}+</div>
                    <p class="text-blue-100 text-sm">Imágenes</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-white mb-2">HD</div>
                    <p class="text-blue-100 text-sm">Calidad</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-white mb-2">24/7</div>
                    <p class="text-blue-100 text-sm">Disponible</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Controles de búsqueda y vista -->
    <section class="sticky top-20 z-30 bg-white/90 backdrop-blur-md border-b border-zinc-200/50 py-6 shadow-sm"
             data-aos="fade-down"
             data-aos-delay="100">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <!-- Barra de búsqueda -->
                <div class="relative flex-1 max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                           wire:model.debounce.300ms="q"
                           placeholder="Buscar en la galería..."
                           class="w-full pl-12 pr-4 py-3 rounded-2xl border border-zinc-200 bg-white focus:ring-2 focus:ring-[#0ea5a4] focus:border-[#0ea5a4] transition-all duration-300 text-zinc-900 placeholder-zinc-500" />
                </div>

                <!-- Modo de vista -->
                <div class="flex items-center gap-4">
                    <div class="flex rounded-2xl border border-zinc-200 bg-white overflow-hidden">
                        <button @click="viewMode = 'grid'"
                                :class="viewMode === 'grid' ? 'bg-[#021869] text-white' : 'text-zinc-600 hover:bg-zinc-50'"
                                class="p-3 transition-colors duration-300" title="Vista en cuadrícula">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button @click="viewMode = 'masonry'"
                                :class="viewMode === 'masonry' ? 'bg-[#021869] text-white' : 'text-zinc-600 hover:bg-zinc-50'"
                                class="p-3 transition-colors duration-300" title="Vista mosaico">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 002 2m0 0v10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Loading Spinner -->
    <div x-show="loading"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="flex items-center justify-center py-16">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#021869]"></div>
    </div>

    <!-- Galería Principal -->
    <section class="mx-auto max-w-7xl px-6 py-16" x-show="!loading">
        <div wire:loading.class="opacity-50 pointer-events-none"
             class="transition-opacity duration-300">

            <!-- Vista Grid -->
            <div x-show="viewMode === 'grid'"
                 class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($items as $img)
                    <div class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 cursor-zoom-in hover:-translate-y-2"
                         @click="openLightbox({{ $loop->index }})"
                         data-aos="fade-up"
                         data-aos-delay="{{ 100 + ($loop->index % 8) * 50 }}">

                        <!-- Imagen -->
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="{{ asset('storage/'.$img->image_path) }}"
                                 alt="{{ $img->title }}"
                                 class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                                 loading="lazy" />

                            <!-- Overlay con información -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="absolute bottom-4 left-4 right-4 text-white">
                                    <h3 class="font-semibold text-lg leading-tight">{{ $img->title }}</h3>
                                </div>

                                <!-- Botón de zoom -->
                                <div class="absolute top-4 right-4">
                                    <div class="p-2 rounded-full bg-white/20 backdrop-blur-sm">
                                        <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información de la tarjeta -->
                        <div class="p-5">
                            <h3 class="font-semibold text-zinc-900 text-lg mb-2 group-hover:text-[#021869] transition-colors duration-300">
                                {{ $img->title }}
                            </h3>
                            @if($img->description)
                                <p class="text-zinc-600 text-sm">{{ Str::limit($img->description, 80) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Vista Masonry -->
            <div x-show="viewMode === 'masonry'"
                 class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
                @foreach($items as $img)
                    <div class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 cursor-zoom-in break-inside-avoid hover:-translate-y-1"
                         @click="openLightbox({{ $loop->index }})"
                         data-aos="fade-up"
                         data-aos-delay="{{ 100 + ($loop->index % 8) * 50 }}">

                        <!-- Imagen -->
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/'.$img->image_path) }}"
                                 alt="{{ $img->title }}"
                                 class="w-full object-cover transition duration-700 group-hover:scale-105"
                                 loading="lazy" />

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="absolute bottom-4 left-4 right-4 text-white">
                                    <h3 class="font-semibold leading-tight">{{ $img->title }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Información -->
                        <div class="p-4">
                            <h3 class="font-semibold text-zinc-900 group-hover:text-[#021869] transition-colors duration-300">
                                {{ $img->title }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($items->isEmpty())
                <!-- Estado vacío -->
                <div class="text-center py-16" data-aos="fade-up">
                    <div class="mx-auto max-w-md">
                        <svg class="mx-auto h-16 w-16 text-zinc-300 mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-zinc-900 mb-2">No se encontraron imágenes</h3>
                        <p class="text-zinc-600">Intenta con otros términos de búsqueda.</p>
                        @if($q)
                            <button wire:click="$set('q', '')"
                                    class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-[#021869] text-white rounded-2xl hover:bg-[#0a268b] transition-colors duration-300">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Limpiar búsqueda
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Paginación -->
        @if($items->hasPages())
            <div class="mt-16" data-aos="fade-up" data-aos-delay="200">
                {{ $items->links() }}
            </div>
        @endif
    </section>

    <!-- Lightbox Modal -->
    <div x-show="open"
         x-transition.opacity.duration.300ms
         class="fixed inset-0 z-50 bg-black/90 backdrop-blur-sm flex items-center justify-center p-4"
         role="dialog"
         aria-modal="true"
         @click="close()">

        <div class="relative max-w-6xl w-full" @click.stop>
            <!-- Botón cerrar -->
            <button @click="close()"
                    class="absolute -top-16 right-0 text-white/80 hover:text-white transition-colors duration-300 z-10"
                    aria-label="Cerrar galería">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8">
                    <path d="M6.225 4.811L4.811 6.225 10.586 12l-5.775 5.775 1.414 1.414L12 13.414l5.775 5.775 1.414-1.414L13.414 12l5.775-5.775-1.414-1.414L12 10.586z"/>
                </svg>
            </button>

            <div class="relative overflow-hidden rounded-2xl bg-black/20 ring-1 ring-white/20 backdrop-blur-sm">
                <!-- Imagen principal -->
                <img x-show="open"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     :src="images[idx]?.src"
                     :alt="images[idx]?.title || 'Imagen'"
                     class="mx-auto max-h-[80vh] w-auto object-contain" />

                <!-- Información de la imagen -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-6 text-white">
                    <div class="flex items-end justify-between">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold mb-2" x-text="images[idx]?.title"></h2>
                            <p x-show="images[idx]?.description"
                               class="text-white/90 text-sm"
                               x-text="images[idx]?.description">
                            </p>
                        </div>
                        <div class="text-right text-white/80 text-sm">
                            <span x-text="idx + 1"></span> / <span x-text="images.length"></span>
                        </div>
                    </div>
                </div>

                <!-- Controles de navegación -->
                <button @click.stop="prev()"
                        class="absolute left-4 top-1/2 -translate-y-1/2 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-white/30 transition-all duration-300"
                        aria-label="Imagen anterior">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                    </svg>
                </button>
                <button @click.stop="next()"
                        class="absolute right-4 top-1/2 -translate-y-1/2 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-white/30 transition-all duration-300"
                        aria-label="Siguiente imagen">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Wire loading indicator -->
    <div wire:loading.flex
         class="fixed inset-0 z-40 bg-white/80 backdrop-blur-sm items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4">
            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-[#021869]"></div>
            <span class="text-zinc-700 font-medium">Cargando...</span>
        </div>
    </div>
</div>
