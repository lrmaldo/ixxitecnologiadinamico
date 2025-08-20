<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <meta name="description" content="{{ $metaDescription ?? 'Soluciones integrales en seguridad tecnológica y de campo.' }}">
        @isset($metaImage)
            <meta property="og:image" content="{{ $metaImage }}" />
        @endisset
        <meta property="og:title" content="{{ $title ?? 'IXXI TECNOLOGÍA' }}" />
        <meta property="og:description" content="{{ $metaDescription ?? 'Soluciones integrales en seguridad tecnológica y de campo.' }}" />
    </head>
    <body class="min-h-screen bg-white font-serif text-zinc-800 antialiased">
        <header class="sticky top-0 z-30 border-b border-zinc-200 bg-white/80 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-3">
                <a href="/" class="flex items-center gap-2 font-bold text-[#021869]">
                    <x-app-logo-icon class="h-6 w-6" />
                    <span>IXXI TECNOLOGÍA</span>
                </a>
                <nav class="hidden gap-6 text-sm font-semibold text-zinc-700 md:flex">
                    <a href="#servicios">Servicios</a>
                    <a href="{{ route('blog.index') }}">Blog</a>
                    <a href="#contacto">Contacto</a>
                </nav>
                <div class="flex items-center gap-3">
                    <a href="#contacto" class="rounded-md bg-[#021869] px-4 py-2 font-sans text-sm font-semibold text-white hover:bg-[#0a268b]">Cotizar</a>
                </div>
            </div>
        </header>

        <main class="font-sans">
            {{ $slot }}
        </main>

        <footer class="mt-16 border-t border-zinc-200 bg-zinc-50 py-10 text-sm text-zinc-600">
            <div class="mx-auto max-w-7xl px-6">
                <div class="flex flex-col items-start justify-between gap-6 md:flex-row">
                    <div>
                        <div class="flex items-center gap-2 font-bold text-[#021869]"><x-app-logo-icon class="h-5 w-5" /> IXXI TECNOLOGÍA</div>
                        <p class="mt-2 max-w-md">Seguridad tecnológica y de campo. Sureste de México.</p>
                    </div>
                    <div class="flex gap-6">
                        <a href="{{ route('blog.index') }}">Blog</a>
                        <a href="#servicios">Servicios</a>
                        <a href="#contacto">Contacto</a>
                    </div>
                </div>
                <div class="mt-6 text-xs">© {{ date('Y') }} IXXI TECNOLOGÍA. Todos los derechos reservados.</div>
            </div>
        </footer>

        @fluxScripts
    </body>
</html>
