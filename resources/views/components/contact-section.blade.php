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
                <!-- Información de contacto -->
                <div class="bg-white p-8 rounded-xl shadow-xl border border-zinc-100">
                    <h3 class="text-xl font-semibold text-[#021869] mb-6">Información de contacto</h3>

                    @php
                        $contactInfo = App\Models\ContactInformation::first();
                    @endphp

                    @if($contactInfo)
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
                                    @foreach($availableSocials as $name => $url)
                                        <a href="{{ $url }}" target="_blank"
                                           class="w-8 h-8 rounded-full {{ $name === 'whatsapp' ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-[#021869] text-white hover:bg-[#0ea5a4]' }} flex items-center justify-center transition-colors duration-200">
                                            @if($name === 'facebook')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                            @elseif($name === 'twitter')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                            @elseif($name === 'instagram')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.624 5.367 11.99 11.988 11.99s11.987-5.366 11.987-11.99C23.971 5.39 18.641.026 12.017 0zm0 21.785c-5.396 0-9.798-4.402-9.798-9.798S6.621 2.189 12.017 2.189s9.797 4.402 9.797 9.798-4.401 9.798-9.797 9.798z"/><path d="M17.96 6.108c-.398 0-.72.322-.72.72s.322.72.72.72.72-.322.72-.72-.322-.72-.72-.72z"/><path d="M12.017 6.109c-3.237 0-5.877 2.64-5.877 5.877s2.64 5.877 5.877 5.877 5.877-2.64 5.877-5.877-2.64-5.877-5.877-5.877zm0 9.658c-2.083 0-3.781-1.698-3.781-3.781s1.698-3.781 3.781-3.781 3.781 1.698 3.781 3.781-1.698 3.781-3.781 3.781z"/></svg>
                                            @elseif($name === 'linkedin')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                            @elseif($name === 'youtube')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                            @elseif($name === 'whatsapp')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.594z"/></svg>
                                            @endif
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">Información de contacto no disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
