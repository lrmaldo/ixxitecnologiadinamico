<x-layouts.public title="{{ $alliance->name }}" :meta-description="$alliance->description">
    <div class="pt-28 pb-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Navegación de regreso -->
            <div class="mb-6">
                <a href="{{ route('home') }}#alianzas" class="inline-flex items-center gap-2 text-[#204369] hover:underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Regresar a alianzas</span>
                </a>
            </div>

            <!-- Cabecera con nombre y logo -->
            <div class="mb-12 flex flex-col md:flex-row items-center md:items-start gap-10">
                <div class="bg-white p-5 rounded-lg shadow-sm w-48 h-48 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $alliance->logo_path) }}"
                         alt="{{ $alliance->name }}"
                         class="max-h-36 max-w-36 object-contain">
                </div>
                <div class="flex-1">
                    <h1 class="text-4xl font-bold text-[#204369] mb-4">{{ $alliance->name }}</h1>

                    @if($alliance->url)
                        <a href="{{ $alliance->url }}"
                           class="inline-flex items-center gap-2 text-[#204369] hover:underline mb-6"
                           target="_blank" rel="noopener noreferrer">
                            <span>{{ $alliance->url }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    @endif

                    <div class="flex gap-4">
                        @if($alliance->url)
                            <a href="{{ $alliance->url }}"
                               class="px-5 py-2 bg-[#204369] text-white rounded-lg hover:bg-[#17314a] transition-colors inline-flex items-center gap-2"
                               target="_blank" rel="noopener noreferrer">
                                <span>Visitar sitio web</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Contenido de la descripción -->
            <div class="max-w-4xl">
                <h2 class="text-2xl font-semibold text-[#204369] mb-6">Acerca de esta alianza</h2>

                @if($alliance->description)
                    <div class="prose prose-lg prose-zinc max-w-none text-zinc-700 leading-relaxed">
                        {{ $alliance->description }}
                    </div>
                @else
                    <p class="text-zinc-500 italic">No hay descripción disponible para esta alianza.</p>
                @endif
            </div>

            <!-- Pie de página con información adicional -->
            <div class="mt-12 pt-8 border-t border-zinc-200">
                <p class="text-zinc-500">Alianza estratégica de IXXI Tecnología</p>
            </div>
        </div>
    </div>
</x-layouts.public>
