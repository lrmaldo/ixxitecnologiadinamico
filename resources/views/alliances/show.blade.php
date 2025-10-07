<x-layouts.public title="{{ $alliance->name }}" :meta-description="$alliance->description">
    <div class="pt-28 pb-16 bg-zinc-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <!-- Cabecera con nombre y logo -->
                <div class="bg-gradient-to-r from-[#204369] to-[#3a6eab] p-8 flex flex-col md:flex-row items-center gap-8">
                    <div class="bg-white p-6 rounded-xl w-48 h-48 flex items-center justify-center">
                        <img src="{{ asset('storage/' . $alliance->logo_path) }}"
                             alt="{{ $alliance->name }}"
                             class="max-h-36 max-w-36 object-contain">
                    </div>
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-bold text-white">{{ $alliance->name }}</h1>
                        @if($alliance->url)
                            <a href="{{ $alliance->url }}"
                               class="mt-2 inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 transition-colors text-white px-4 py-2 rounded-lg"
                               target="_blank" rel="noopener noreferrer">
                                <span>Visitar sitio web</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Contenido de la descripción -->
                <div class="p-8">
                    <h2 class="text-xl font-semibold text-[#204369] mb-4">Acerca de esta alianza</h2>

                    @if($alliance->description)
                        <div class="prose prose-zinc max-w-none">
                            {{ $alliance->description }}
                        </div>
                    @else
                        <p class="text-zinc-500 italic">No hay descripción disponible para esta alianza.</p>
                    @endif
                </div>

                <!-- Información adicional y botones de acción -->
                <div class="bg-zinc-50 p-6 border-t border-zinc-200">
                    <div class="flex flex-wrap justify-between items-center">
                        <div>
                            <p class="text-sm text-zinc-500">Alianza estratégica de IXXI Tecnología</p>
                        </div>
                        <div class="flex gap-4 mt-4 md:mt-0">
                            <a href="{{ route('home') }}#alianzas"
                               class="px-4 py-2 border border-zinc-300 rounded-lg text-zinc-700 hover:bg-zinc-100 transition-colors">
                                Regresar a alianzas
                            </a>
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
            </div>
        </div>
    </div>
</x-layouts.public>
