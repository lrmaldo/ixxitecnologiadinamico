<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        {{-- Fondo con degradado suave y elementos decorativos --}}
        <div class="relative flex min-h-svh items-center justify-center p-6 md:p-10">
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none absolute -left-24 -top-24 h-64 w-64 rounded-full bg-gradient-to-tr from-indigo-200 via-sky-100 to-white opacity-60 blur-3xl dark:from-indigo-900 dark:via-sky-800 dark:to-neutral-900"></div>
                <div class="pointer-events-none absolute -right-20 -bottom-20 h-56 w-56 rounded-full bg-gradient-to-bl from-pink-100 via-amber-50 to-white opacity-50 blur-2xl dark:from-pink-900 dark:via-amber-900 dark:to-neutral-900"></div>
            </div>

            <div class="relative w-full max-w-sm">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium mb-4" wire:navigate>
                    <div class="flex items-center gap-2">
                       {{--  <x-app-logo size="sm" />
                        <span class="font-bold text-[#021869] dark:text-white text-xl">TECNOLOGÍA</span> --}}
                    </div>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>

                {{-- Tarjeta principal con transición y efecto glass --}}
                <div class="auth-card opacity-0 translate-y-4 transform transition duration-500 ease-out will-change-transform">
                    <div class="rounded-2xl border border-gray-100/60 dark:border-neutral-800/50 bg-white/80 dark:bg-neutral-900/60 backdrop-blur-md shadow-lg p-6 sm:p-8 hover:shadow-2xl hover:scale-105 transition-transform duration-300">
                        <div class="flex flex-col gap-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts

        {{-- Micro-script para la animación de entrada (aplica clases para animar cuando el DOM esté listo) --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var card = document.querySelector('.auth-card');
                if (!card) return;
                // Forzar reflow para que la transición se aplique correctamente
                void card.offsetWidth;
                card.classList.remove('opacity-0', 'translate-y-4');
                card.classList.add('opacity-100', 'translate-y-0');
            });
        </script>
    </body>
</html>
