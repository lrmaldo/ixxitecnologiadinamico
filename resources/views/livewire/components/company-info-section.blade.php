<!-- SECCIÓN DE MISIÓN, VISIÓN Y VALORES -->
<section class="py-16 md:py-24 bg-gradient-to-br from-[#021869] to-[#0a1f4c] relative overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute top-10 left-10 w-32 h-32 md:w-64 md:h-64 bg-[#0ea5a4]/10 rounded-full filter blur-3xl opacity-50"></div>
    <div class="absolute bottom-10 right-10 w-40 h-40 md:w-80 md:h-80 bg-blue-400/10 rounded-full filter blur-3xl opacity-50"></div>

    <div class="mx-auto max-w-7xl px-4 md:px-6 relative z-10">
        <div class="text-center mb-12 md:mb-16" data-aos="fade-down">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-4">Quiénes Somos</h2>
            <div class="w-24 h-1 bg-[#0ea5a4] mx-auto rounded-full"></div>
            <p class="text-gray-300 mt-6 max-w-2xl mx-auto text-sm md:text-base">Conoce nuestra misión, visión y los valores que nos guían</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Misión -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 md:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="100">
                <div class="text-center mb-6">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-r from-[#0ea5a4] to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-white mb-4">Nuestra Misión</h3>
                </div>
                <p class="text-gray-300 leading-relaxed text-center text-sm md:text-base">
                    @if($companyInfo && $companyInfo->mission)
                        {{ $companyInfo->mission }}
                    @else
                        Proporcionar soluciones tecnológicas innovadoras que impulsen el crecimiento y la transformación digital de nuestros clientes.
                    @endif
                </p>
            </div>

            <!-- Visión -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 md:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group md:col-span-2 lg:col-span-1" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center mb-6">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-white mb-4">Nuestra Visión</h3>
                </div>
                <p class="text-gray-300 leading-relaxed text-center text-sm md:text-base">
                    @if($companyInfo && $companyInfo->vision)
                        {{ $companyInfo->vision }}
                    @else
                        Ser reconocidos como líderes en el sector tecnológico, siendo la primera opción para empresas que buscan excelencia.
                    @endif
                </p>
            </div>

            <!-- Valores -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 md:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group md:col-span-2 lg:col-span-1" data-aos="fade-left" data-aos-delay="300">
                <div class="text-center mb-6">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-white mb-4">Nuestros Valores</h3>
                </div>
                <div class="text-gray-300 leading-relaxed">
                    @if($companyInfo && $companyInfo->values)
                        @foreach(explode("\n", $companyInfo->values) as $value)
                            @if(trim($value))
                                <div class="flex items-start mb-2">
                                    <span class="text-[#0ea5a4] mr-2 mt-1 text-sm">▸</span>
                                    <span class="text-sm md:text-base">{{ trim($value) }}</span>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="flex items-start mb-2">
                            <span class="text-[#0ea5a4] mr-2 mt-1 text-sm">▸</span>
                            <span class="text-sm md:text-base">Innovación</span>
                        </div>
                        <div class="flex items-start mb-2">
                            <span class="text-[#0ea5a4] mr-2 mt-1 text-sm">▸</span>
                            <span class="text-sm md:text-base">Calidad</span>
                        </div>
                        <div class="flex items-start mb-2">
                            <span class="text-[#0ea5a4] mr-2 mt-1 text-sm">▸</span>
                            <span class="text-sm md:text-base">Compromiso</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-[#0ea5a4] mr-2 mt-1 text-sm">▸</span>
                            <span class="text-sm md:text-base">Transparencia</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Área editable: Quiénes somos / About us (solo para usuarios con permiso) --}}

                <div class="mt-8 bg-white/6 backdrop-blur-md p-4 rounded-xl border border-white/10">
                    <h4 class="text-white font-semibold mb-3">Editar sección "Quiénes somos"</h4>
                    <form action="{{ route('admin.company-info.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="about_us" class="text-sm text-gray-200">Texto "Quiénes somos"</label>
                        <textarea name="about_us" id="about_us" rows="5" class="w-full mt-2 p-3 rounded-lg bg-white/10 border border-white/20 text-gray-100 placeholder-gray-400" placeholder="Escribe aquí el texto que aparecerá en la sección 'Quiénes Somos'">@if(isset($companyInfo) && $companyInfo->about_us){{ $companyInfo->about_us }}@endif</textarea>

                        <div class="mt-3 flex items-center gap-3">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#0ea5a4] hover:bg-[#0ca89f] text-white rounded-md shadow-sm">Guardar</button>
                            <a href="{{ route('home') }}" class="text-sm text-gray-300">Cancelar</a>
                        </div>
                    </form>
                    <p class="text-xs text-gray-400 mt-2">El texto puede incluir saltos de línea. Se guardará como contenido enriquecido simple.</p>
                </div>

        </div>
    </div>
</section>
