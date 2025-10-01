<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <meta name="description" content="{{ $metaDescription ?? 'Soluciones integrales en seguridad tecnológica y de campo.' }}">
        @isset($metaImage)
            <meta property="og:image" content="{{ $metaImage }}" />
        @endisset
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('/img/logo.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('/img/logo.png') }}">

        <!-- SEO Meta Tags -->
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ing Leonardo Maldonado">
        <link rel="canonical" href="{{ request()->url() }}">

        <!-- Social Media Meta Tags -->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="IXXI TECNOLOGÍA">
        <meta property="og:image:alt" content="IXXI TECNOLOGÍA Logo">
        <meta property="og:locale" content="es_MX">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $title ?? 'IXXI TECNOLOGÍA' }}">
        <meta name="twitter:description" content="{{ $metaDescription ?? 'Soluciones integrales en seguridad tecnológica y de campo.' }}">
        @isset($metaImage)
            <meta name="twitter:image" content="{{ $metaImage }}">
        @else
            <meta name="twitter:image" content="{{ asset('/img/logo.png') }}">
        @endisset
        <meta property="og:url" content="{{ request()->fullUrl() }}" />
        <meta property="og:title" content="{{ $title ?? 'IXXI TECNOLOGÍA' }}" />
        <meta property="og:description" content="{{ $metaDescription ?? 'Soluciones integrales en seguridad tecnológica y de campo.' }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
        @livewireStyles
    </head>
    <body class="min-h-screen bg-white font-serif text-zinc-800 antialiased" x-data="{ showContent: false }" x-init="setTimeout(() => {showContent = true}, 100)">
    <div class="fixed inset-0 bg-gradient-to-br from-[#204369]/5 to-white/40 -z-10"></div>

        <!-- Elementos decorativos del fondo con animaciones mejoradas -->
    <div class="fixed top-0 -left-64 w-96 h-96 bg-[#204369]/5 rounded-full blur-3xl -z-10 animate-blob"></div>
    <div class="fixed -top-20 right-20 w-72 h-72 bg-[#204369]/3 rounded-full blur-3xl -z-10 animate-blob animation-delay-2000"></div>
    <div class="fixed bottom-0 -right-64 w-96 h-96 bg-[#C8DBEF]/5 rounded-full blur-3xl -z-10 animate-blob animation-delay-4000"></div>
    <div class="fixed left-40 bottom-20 w-72 h-72 bg-[#C8DBEF]/3 rounded-full blur-3xl -z-10 animate-blob animation-delay-6000"></div>

        <header class="sticky top-0 z-30 border-b border-zinc-200/80 bg-white/95 backdrop-blur-md shadow-sm transition-all duration-500"
                x-data="{ mobileMenuOpen: false, scrolled: false }"
                x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 20 })"
                x-bind:class="{ 'shadow-lg border-zinc-300/50': scrolled, 'py-5': !scrolled, 'py-3': scrolled }"
                x-show="showContent"
                x-transition:enter="transition duration-700 ease-out"
                x-transition:enter-start="opacity-0 transform -translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6">
                <!-- Logo y marca simplificada -->
                    <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                        {{-- Use explicit image to ensure sizing works as expected --}}
                        <img src="{{ asset('/img/logo.png') }}" alt="IXXI Tecnología" class="w-12 h-12 md:w-16 md:h-16 object-contain transition-all duration-300 group-hover:scale-105">
                        <div>
                            <span class="font-black text-[#204369] dark:text-white text-2xl md:text-3xl lg:text-4xl tracking-tight leading-none">
                                IXXI Tecnología
                            </span>
                        </div>
                    </a>

                <!-- Menú de navegación para pantallas medianas y grandes (orden solicitado) -->
                <nav class="hidden lg:flex items-center gap-10">
                    <a href="{{ route('home') }}" class="group relative py-2 px-1 text-base font-semibold text-zinc-700 transition-all duration-300 hover:text-[#204369]">
                        <span class="relative">Inicio</span>
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="/#sobre-nosotros" class="group relative py-2 px-1 text-base font-semibold text-zinc-700 transition-all duration-300 hover:text-[#204369]">
                        <span class="relative">Somos</span>
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <div class="relative group">
                        <a href="{{ route('services.index') }}" class="flex items-center gap-1 py-2 px-1 text-base font-semibold text-zinc-700 transition-all duration-300 hover:text-[#204369]">
                            <span class="relative">Servicios</span>

                            <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </div>

                    <a href="{{ route('testimonials.index') }}" class="group relative py-2 px-1 text-base font-semibold text-zinc-700 transition-all duration-300 hover:text-[#204369]">
                        <span class="relative">Testimonios</span>
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('support.ticket.create') }}" class="group relative py-2 px-1 text-base font-semibold text-zinc-700 transition-all duration-300 hover:text-[#204369]">
                        <span class="relative">Soporte</span>
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="/#contacto" class="group relative py-2 px-1 text-base font-semibold text-zinc-700 transition-all duration-300 hover:text-[#204369]">
                        <span class="relative">Contacto</span>
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </nav>

                <!-- Botón CTA y menú móvil -->
                <div class="flex items-center gap-4">
                    <!-- Botón CTA mejorado -->
                        <a href="#contacto" class="hidden sm:flex group relative overflow-hidden rounded-2xl bg-[#204369] px-6 py-3 font-bold text-white shadow-lg transition-all duration-300 hover:bg-[#C8DBEF] hover:text-[#204369] active:scale-95 btn-shine">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Contáctanos
                        </span>
                        <span class="absolute inset-0 bg-gradient-to-r from-[#C8DBEF] to-[#C8DBEF] opacity-0 transition-opacity duration-300 group-hover:opacity-100"></span>
                    </a>

                    <!-- Botón de menú móvil mejorado -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="lg:hidden relative p-2 text-zinc-700 hover:text-[#204369] focus:outline-none focus:ring-2 focus:ring-[#C8DBEF] focus:ring-opacity-50 rounded-xl transition-all duration-300"
                            :class="{ 'bg-zinc-100': mobileMenuOpen }"
                            aria-label="Menú de navegación">
                        <svg x-show="!mobileMenuOpen"
                             x-transition:enter="transition ease-in-out duration-200"
                             x-transition:enter-start="opacity-0 rotate-90"
                             x-transition:enter-end="opacity-100 rotate-0"
                             xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen"
                             x-transition:enter="transition ease-in-out duration-200"
                             x-transition:enter-start="opacity-0 -rotate-90"
                             x-transition:enter-end="opacity-100 rotate-0"
                             xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menú móvil mejorado -->
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition duration-300 ease-out"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition duration-200 ease-in"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-4"
                 class="border-t border-zinc-200/50 bg-white/98 backdrop-blur-md lg:hidden">
                <nav class="flex flex-col py-4 px-6 space-y-1">
                          <a href="{{ route('home') }}"
                              @click="mobileMenuOpen = false"
                              class="flex items-center gap-3 py-3 px-4 text-lg font-semibold text-zinc-700 hover:text-[#204369] hover:bg-zinc-50 rounded-xl transition-all duration-300">
                        <svg class="h-5 w-5 text-[#C8DBEF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Inicio
                    </a>

                          <a href="/#sobre-nosotros"
                              @click="mobileMenuOpen = false"
                              class="flex items-center gap-3 py-3 px-4 text-lg font-semibold text-zinc-700 hover:text-[#204369] hover:bg-zinc-50 rounded-xl transition-all duration-300">
                        <svg class="h-5 w-5 text-[#C8DBEF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Somos
                    </a>

                          <a href="{{ route('services.index') }}"
                              @click="mobileMenuOpen = false"
                              class="flex items-center gap-3 py-3 px-4 text-lg font-semibold text-zinc-700 hover:text-[#204369] hover:bg-zinc-50 rounded-xl transition-all duration-300">
                                <svg class="h-5 w-5 text-[#C8DBEF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        Servicios
                    </a>
                    <!-- Galería y Blog eliminados en menú móvil -->
                          <a href="{{ route('testimonials.index') }}"
                              @click="mobileMenuOpen = false"
                              class="flex items-center gap-3 py-3 px-4 text-lg font-semibold text-zinc-700 hover:text-[#204369] hover:bg-zinc-50 rounded-xl transition-all duration-300">
                                <svg class="h-5 w-5 text-[#C8DBEF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        Testimonios
                    </a>
                          <a href="{{ route('support.ticket.create') }}"
                              @click="mobileMenuOpen = false"
                              class="flex items-center gap-3 py-3 px-4 text-lg font-semibold text-zinc-700 hover:text-[#204369] hover:bg-zinc-50 rounded-xl transition-all duration-300">
                                <svg class="h-5 w-5 text-[#C8DBEF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728" />
                        </svg>
                        Soporte
                    </a>
                    <a href="/#contacto"
                       @click="mobileMenuOpen = false"
                       class="flex items-center gap-3 py-3 px-4 text-lg font-semibold text-zinc-700 hover:text-[#204369] hover:bg-zinc-50 rounded-xl transition-all duration-300">
                        <svg class="h-5 w-5 text-[#C8DBEF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contacto
                    </a>

                    <!-- CTA en menú móvil -->
                    <div class="pt-4 mt-4 border-t border-zinc-200">
                                <a href="#contacto"
                           @click="mobileMenuOpen = false"
                                    class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-[#204369] text-white font-bold rounded-xl shadow-lg transition-all duration-300 hover:bg-[#C8DBEF] hover:text-[#204369]">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Contáctanos
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        <main class="font-sans"
              x-show="showContent"
              x-transition:enter="transition duration-700"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100">
            {{ $slot }}
        </main>

        <footer class="border-t border-zinc-200 bg-zinc-50 py-12 text-sm text-zinc-600"
                x-show="showContent"
                x-transition:enter="transition duration-700 delay-300"
                x-transition:enter-start="opacity-0 transform translate-y-6"
                x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="mx-auto max-w-7xl px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('/img/logo.png') }}" alt="IXXI Tecnología" class="w-8 h-8 object-contain">
                            <span class="font-bold text-[#204369] dark:text-white text-lg">IXXI TECNOLOGÍA</span>
                        </div>
                        <p class="max-w-md text-zinc-500">GRUPO PRODDEX COMERCIAL S.A. DE C.V.</p>
                        <div class="pt-2 flex space-x-4">
                            <!-- Redes Sociales -->
                            @php
                                $socialLinks = $contactInfo->getSocialMediaLinks();
                            @endphp

                            @if(!empty($socialLinks['facebook']))
                            <a href="{{ $socialLinks['facebook'] }}" class="text-zinc-500 hover:text-[#204369] transition-colors duration-300" aria-label="Facebook" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                            @endif

                            @if(!empty($socialLinks['instagram']))
                            <a href="{{ $socialLinks['instagram'] }}" class="text-zinc-500 hover:text-[#204369] transition-colors duration-300" aria-label="Instagram" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            @endif

                            @if(!empty($socialLinks['twitter']))
                            <a href="{{ $socialLinks['twitter'] }}" class="text-zinc-500 hover:text-[#204369] transition-colors duration-300" aria-label="Twitter" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            @endif

                            @if(!empty($socialLinks['linkedin']))
                            <a href="{{ $socialLinks['linkedin'] }}" class="text-zinc-500 hover:text-[#204369] transition-colors duration-300" aria-label="LinkedIn" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold text-base text-[#204369]">Enlaces rápidos</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('services.index') }}" class="hover:text-[#204369] transition-colors duration-300">Servicios</a></li>
                            <li><a href="{{ route('blog.index') }}" class="hover:text-[#204369] transition-colors duration-300">Blog</a></li>
                            <li><a href="/##contacto" class="hover:text-[#204369] transition-colors duration-300">Contacto</a></li>
                            <li><a href="/##sobre-nosotros" class="hover:text-[#204369] transition-colors duration-300">Somos</a></li>

                        </ul>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold text-base text-[#204369]">Contáctanos</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#204369] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $contactInfo->address }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#204369] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $contactInfo->phone }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#204369] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $contactInfo->email }}</span>
                            </li>
                            @if($contactInfo->whatsapp)
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#204369] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactInfo->whatsapp) }}" target="_blank" class="hover:text-[#C8DBEF] transition-colors">
                                    WhatsApp
                                </a>
                            </li>
                            @endif
                            @if($contactInfo->business_hours_weekdays)
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#204369] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $contactInfo->business_hours_weekdays }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="mt-12 pt-6 border-t border-zinc-200 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="text-xs">© {{ date('Y') }} IXXI TECNOLOGÍA. Todos los derechos reservados.</div>
                    <div class="flex items-center gap-4">
                        <!-- Redes sociales -->
                        @php
                            $socialLinks = $contactInfo->getSocialMediaLinks();
                        @endphp

                        @if(!empty($socialLinks['facebook']))
                        <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="text-zinc-600 hover:text-[#204369] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                        @endif

                        @if(!empty($socialLinks['instagram']))
                        <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="text-zinc-600 hover:text-[#204369] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                        @endif

                        @if(!empty($socialLinks['twitter']))
                        <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="text-zinc-600 hover:text-[#204369] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                            </svg>
                        </a>
                        @endif

                        @if(!empty($socialLinks['linkedin']))
                        <a href="{{ $socialLinks['linkedin'] }}" target="_blank" class="text-zinc-600 hover:text-[#204369] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                            </svg>
                        </a>
                        @endif
                    </div>

                    <div class="flex gap-6 text-xs">
                        <a href="{{ route('terminos') }}" class="hover:text-[#204369] transition-colors duration-300">Términos y Condiciones</a>
                        <a href="{{ route('privacidad') }}" class="hover:text-[#204369] transition-colors duration-300">Política de Privacidad</a>
                    </div>
                </div>
            </div>
        </footer>

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

            /* Animación de hover para tarjetas */
            @keyframes cardFloat {
                0% {
                    transform: translateY(0px);
                }
                50% {
                    transform: translateY(-10px);
                }
                100% {
                    transform: translateY(0px);
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

            .animation-delay-6000 {
                animation-delay: 6s;
            }

            .hover-float:hover {
                animation: cardFloat 3s ease-in-out infinite;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            /* Efecto parallax suave */
            .parallax-bg {
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                transition: background-position 0.5s ease-out;
            }

            /* Ocultar scrollbar pero permitir scroll */
            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            /* Efecto de brillo para botones */
            .btn-shine {
                position: relative;
                overflow: hidden;
            }

            .btn-shine::after {
                content: "";
                position: absolute;
                top: -50%;
                left: -100%;
                width: 20%;
                height: 200%;
                opacity: 0;
                transform: rotate(30deg);
                background: rgba(255, 255, 255, 0.13);
                background: linear-gradient(
                    to right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.13) 77%,
                    rgba(255, 255, 255, 0.5) 92%,
                    rgba(255, 255, 255, 0) 100%
                );
            }

            .btn-shine:hover::after {
                opacity: 1;
                left: 130%;
                transition: left 0.7s ease-in-out;
            }

            /* Ocultar contenido hasta que Alpine.js lo cargue */
            [x-cloak] { display: none !important; }

            /* Efecto de desvanecimiento suave para secciones */
            .fade-up-trigger {
                opacity: 0;
                transform: translateY(40px);
                transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            }

            .fade-up-active {
                opacity: 1;
                transform: translateY(0);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Detecta elementos con fade-up-trigger cuando entran en el viewport
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('fade-up-active');
                        }
                    });
                }, { threshold: 0.1 });

                const fadeTriggers = document.querySelectorAll('.fade-up-trigger');
                if (fadeTriggers && fadeTriggers.length > 0) {
                    fadeTriggers.forEach(el => {
                        observer.observe(el);
                    });
                }
            });
        </script>

        <!-- Botón flotante de WhatsApp -->
        @if($contactInfo->whatsapp)
        <div x-data="{ showWhatsApp: false }"
             x-init="setTimeout(() => showWhatsApp = true, 2000)"
             class="fixed bottom-6 right-6 z-50"
             x-show="showWhatsApp"
             x-transition:enter="transition duration-500 ease-out"
             x-transition:enter-start="opacity-0 scale-0 rotate-180"
             x-transition:enter-end="opacity-100 scale-100 rotate-0">

            <!-- Botón principal de WhatsApp -->
            @if($contactInfo->whatsapp)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactInfo->whatsapp) }}?text=¡Hola!%20Me%20interesa%20conocer%20más%20sobre%20los%20servicios%20de%20IXXI%20Tecnología"
               target="_blank"
               class="group relative flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-110 transition-all duration-300 animate-bounce"
               style="animation-duration: 2s;">
            @else
            <a href="https://wa.me/528123456789?text=¡Hola!%20Me%20interesa%20conocer%20más%20sobre%20los%20servicios%20de%20IXXI%20Tecnología"
               target="_blank"
               class="group relative flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-110 transition-all duration-300 animate-bounce"
               style="animation-duration: 2s;">
            @endif

                <!-- Ondas de pulso -->
                <div class="absolute inset-0 rounded-full bg-green-500 opacity-75 animate-ping"></div>
                <div class="absolute inset-0 rounded-full bg-green-500 opacity-50 animate-ping" style="animation-delay: 0.5s;"></div>

                <!-- Icono de WhatsApp -->
                <svg class="relative z-10 w-8 h-8 text-white transition-transform duration-300 group-hover:scale-110"
                     fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                </svg>

                <!-- Tooltip -->
                <div class="absolute right-20 top-1/2 transform -translate-y-1/2 bg-white text-gray-800 px-4 py-2 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all duration-300 whitespace-nowrap pointer-events-none">
                    <div class="text-sm font-semibold">¡Contáctanos por WhatsApp!</div>
                    <div class="text-xs text-gray-600">Respuesta inmediata</div>
                    <!-- Flecha del tooltip -->
                    <div class="absolute top-1/2 -right-1 transform -translate-y-1/2 w-2 h-2 bg-white rotate-45"></div>
                </div>
            </a>

            <!-- Notificación de mensaje responsive -->
            <div x-data="{ showNotification: false }"
                 x-init="setInterval(() => { showNotification = true; setTimeout(() => showNotification = false, 4000); }, 15000)"
                 x-show="showNotification"
                 x-transition:enter="transition duration-300 ease-out"
                 x-transition:enter-start="opacity-0 transform translate-x-4 translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-x-0 translate-y-0"
                 x-transition:leave="transition duration-300 ease-in"
                 x-transition:leave-start="opacity-100 transform translate-x-0 translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-x-4 translate-y-4"
                 class="absolute -top-20 right-0 sm:right-20 md:-left-72 lg:-left-80 bg-white rounded-2xl shadow-2xl p-3 sm:p-4 w-64 sm:w-72 md:w-80 border border-gray-100 z-10">

                <div class="flex items-start gap-2 sm:gap-3">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-gray-800 mb-1">IXXI Tecnología</div>
                        <div class="text-xs text-gray-600 leading-relaxed">¿Necesitas ayuda? ¡Escríbenos!</div>
                        <div class="text-xs text-gray-400 mt-1">Ahora</div>
                    </div>
                    <button @click="showNotification = false"
                            class="text-gray-400 hover:text-gray-600 transition-colors duration-200 flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Indicador de burbujas de chat -->
                <div class="absolute -bottom-2 left-4 sm:left-6 flex space-x-1">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-bounce" style="animation-delay: 0.1s;"></div>
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
                </div>

                <!-- Flecha apuntando al botón - ajustada para diferentes posiciones -->
                <div class="absolute -bottom-2 right-8 md:-right-2 w-4 h-4 bg-white border-r border-b border-gray-100 rotate-45 transform"></div>
            </div>
        </div>
        @endif

        <!-- Estilos adicionales para efectos avanzados -->
        <style>
            .animate-bounce {
                animation: bounce 1s infinite;
            }

            .animate-ping {
                animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
            }

            @keyframes ping {
                75%, 100% {
                    transform: scale(1.5);
                    opacity: 0;
                }
            }

            .shadow-3xl {
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }

            /* Animación de llamada de atención adicional */
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }

            .animate-shake {
                animation: shake 0.5s ease-in-out infinite;
            }

            /* Scroll suave para toda la página */
            html {
                scroll-behavior: smooth;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Función para manejar navegación suave a anclas desde cualquier página
                function handleAnchorNavigation() {
                    // Obtener todos los enlaces que apuntan a anclas
                    const anchorLinks = document.querySelectorAll('a[href^="/#"]');

                    anchorLinks.forEach(link => {
                        link.addEventListener('click', function(e) {
                            const href = this.getAttribute('href');
                            const currentPath = window.location.pathname;

                            // Si estamos en la página principal
                            if (currentPath === '/' || currentPath === '') {
                                const hash = href.substring(1); // Quitar el "/"
                                if (hash && hash.length > 1) {
                                    const targetId = hash.substring(1); // Quitar el "#"
                                    const targetElement = document.getElementById(targetId);

                                    if (targetElement) {
                                        e.preventDefault();

                                        // Scroll suave al elemento
                                        targetElement.scrollIntoView({
                                            behavior: 'smooth',
                                            block: 'start'
                                        });

                                        // Actualizar URL
                                        history.pushState(null, null, hash);
                                    }
                                }
                            }
                            // Si estamos en otra página, permitir la navegación normal
                        });
                    });
                }

                // Inicializar navegación por anclas
                handleAnchorNavigation();

                // Verificar si hay un hash al cargar la página
                const hash = window.location.hash;
                if (hash && hash.length > 1 && (window.location.pathname === '/' || window.location.pathname === '')) {
                    setTimeout(() => {
                        const targetElement = document.getElementById(hash.substring(1));
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }, 500);
                }
            });
        </script>

        <!-- Debug Script para eventos Livewire -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Escuchar todos los eventos notify que se envían
                window.addEventListener('notify', function(event) {
                    console.log('🚨 Evento notify recibido:', event.detail);
                });

                // Debug general de Livewire
                window.addEventListener('livewire:load', function() {
                    console.log('✅ Livewire cargado correctamente');
                });

                // Debug para actualizaciones
                document.addEventListener('livewire:update', function() {
                    console.log('🔄 Livewire actualizado');
                });
            });
        </script>

        <!-- Sistema de notificaciones -->
        <div x-data="{show:false,title:'',body:'',type:'success'}"
             x-show="show"
             x-transition.opacity.duration.300ms
             @notify.window="title=$event.detail.title || 'Notificación'; body=$event.detail.body || $event.detail.message; type=$event.detail.type || 'success'; show=true; setTimeout(()=>show=false,4000)"
             class="fixed bottom-4 right-4 z-50 w-80 rounded-lg border px-4 py-3 shadow-lg"
             :class="{
                'bg-green-50 border-green-200 text-green-800': type === 'success',
                'bg-red-50 border-red-200 text-red-800': type === 'error',
                'bg-blue-50 border-blue-200 text-blue-800': type === 'info',
                'bg-yellow-50 border-yellow-200 text-yellow-800': type === 'warning'
             }">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg x-show="type === 'success'" class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <svg x-show="type === 'error'" class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <svg x-show="type === 'info'" class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <svg x-show="type === 'warning'" class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium" x-text="title"></p>
                    <p class="mt-1 text-sm" x-text="body"></p>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <button @click="show=false" class="rounded-md text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    @livewireScripts

    <!-- AOS Library (solo una vez) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

        @fluxScripts
    </body>
</html>
