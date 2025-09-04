<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 text-zinc-800 dark:text-zinc-100 antialiased">
        <flux:sidebar sticky stashable class="border-e border-zinc-200/70 backdrop-blur-sm bg-white/80 dark:border-zinc-700/60 dark:bg-zinc-900/80 supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/60">
            <div class="flex flex-col h-full" x-data="{collapsed:false}" :class="collapsed ? 'w-20' : 'w-64 xl:w-72'">
                <div class="flex items-center gap-2 px-4 pt-4 pb-3 border-b border-zinc-200 dark:border-zinc-700">
                    <flux:sidebar.toggle class="lg:hidden shrink-0" icon="x-mark" />
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2" wire:navigate>
                        <x-app-logo size="sm" class="shrink-0" />
                        <span class="font-semibold tracking-tight text-zinc-700 dark:text-zinc-200 text-lg" :class="collapsed ? 'hidden' : 'sm:inline-block'">TECNOLOGÍA</span>
                    </a>
                    <div class="ms-auto hidden lg:flex items-center gap-1">
                        <button type="button" @click="document.documentElement.classList.toggle('dark')" class="p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" aria-label="Toggle theme">
                            <flux:icon name="sun" class="h-5 w-5 dark:hidden text-amber-500" />
                            <flux:icon name="moon" class="h-5 w-5 hidden dark:inline-block text-indigo-400" />
                        </button>
                        <button type="button" @click="collapsed = !collapsed" class="p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" :aria-expanded="(!collapsed).toString()" :aria-label="collapsed ? 'Expandir sidebar' : 'Colapsar sidebar'">
                            <flux:icon name="chevron-left" class="h-5 w-5" x-show="!collapsed" />
                            <flux:icon name="chevron-right" class="h-5 w-5" x-show="collapsed" />
                        </button>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto overflow-x-hidden px-3 py-4 scrollbar-thin scrollbar-thumb-zinc-300 dark:scrollbar-thumb-zinc-700 scrollbar-track-transparent">
                    <!-- Navegación Principal -->
                    <div class="mb-6">
                        <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400" :class="collapsed ? 'sr-only' : ''">{{ __('Navegación Principal') }}</p>
                        <flux:navlist variant="outline" class="space-y-1">
                            <flux:navlist.item
                                icon="home"
                                :href="route('dashboard')"
                                :current="request()->routeIs('dashboard')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">{{ __('Dashboard') }}</span>
                            </flux:navlist.item>
                        </flux:navlist>
                    </div>

                    <!-- Gestión de Contenido -->
                    <div class="mb-6">
                        <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400" :class="collapsed ? 'sr-only' : ''">{{ __('Gestión de Contenido') }}</p>
                        <flux:navlist variant="outline" class="space-y-1">
                            <flux:navlist.item
                                icon="briefcase"
                                :href="route('admin.services')"
                                :current="request()->routeIs('admin.services*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Servicios</span>
                            </flux:navlist.item>
                            <flux:navlist.item
                                icon="newspaper"
                                :href="route('admin.posts')"
                                :current="request()->routeIs('admin.posts*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Publicaciones</span>
                            </flux:navlist.item>
                            <flux:navlist.item
                                icon="chat-bubble-left-right"
                                :href="route('admin.testimonials')"
                                :current="request()->routeIs('admin.testimonials*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Testimonios</span>
                            </flux:navlist.item>
                            <flux:navlist.item
                                icon="photo"
                                :href="route('admin.gallery')"
                                :current="request()->routeIs('admin.gallery*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Galería</span>
                            </flux:navlist.item>
                            <flux:navlist.item
                                icon="lifebuoy"
                                :href="route('admin.tickets')"
                                :current="request()->routeIs('admin.tickets*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Tickets</span>
                            </flux:navlist.item>
                        </flux:navlist>
                    </div>

                    <!-- Administración -->
                    @if(auth()->user()?->isAdmin())
                    <div class="mb-6">
                        <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400" :class="collapsed ? 'sr-only' : ''">{{ __('Administración') }}</p>
                        <flux:navlist variant="outline" class="space-y-1">
                            <flux:navlist.item
                                icon="users"
                                :href="route('admin.users')"
                                :current="request()->routeIs('admin.users*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Usuarios</span>
                            </flux:navlist.item>

                            <flux:navlist.item
                                icon="layout-grid"
                                :href="route('admin.statistics')"
                                :current="request()->routeIs('admin.statistics*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Estadísticas</span>
                            </flux:navlist.item>

                            <flux:navlist.item
                                icon="phone"
                                :href="route('admin.contact-information.edit')"
                                :current="request()->routeIs('admin.contact-information*')"
                                class="group relative flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/40 hover:bg-zinc-100 dark:hover:bg-zinc-800 aria-[current=true]:bg-indigo-50 dark:aria-[current=true]:bg-indigo-900/30 aria-[current=true]:text-indigo-600 dark:aria-[current=true]:text-indigo-300"
                                wire:navigate
                            >
                                <span class="truncate" :class="collapsed ? 'hidden' : ''">Información de Contacto</span>
                            </flux:navlist.item>
                        </flux:navlist>
                    </div>
                    @endif

                    <!-- Recursos -->

                </div>

                <!-- Desktop User Menu -->
                <div class="mt-auto px-3 pb-4 hidden lg:block">
                    <flux:dropdown position="top" align="start" class="w-full">
                        <div class="w-full">
                            <flux:profile
                                :name="auth()->user()->name"
                                :initials="auth()->user()->initials()"
                                icon:trailing="chevrons-up-down"
                                class="w-full rounded-lg transition-colors duration-200 bg-zinc-100/60 dark:bg-zinc-800/60 hover:bg-zinc-100 dark:hover:bg-zinc-800 border border-zinc-200/70 dark:border-zinc-700/60"
                            />
                        </div>
                        <flux:menu class="w-[260px] rounded-xl shadow-xl border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                            <flux:menu.radio.group>
                                <div class="p-3 text-sm font-normal bg-gradient-to-r from-zinc-50 to-white dark:from-zinc-900 dark:to-zinc-800">
                                    <div class="flex items-center gap-3 text-start">
                                        <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full ring-2 ring-indigo-500/40">
                                            <span class="flex h-full w-full items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-semibold">
                                                {{ auth()->user()->initials() }}
                                            </span>
                                        </span>
                                        <div class="grid flex-1 text-start leading-tight min-w-0">
                                            <span class="truncate font-semibold text-sm">{{ auth()->user()->name }}</span>
                                            <span class="truncate text-[11px] text-zinc-500 dark:text-zinc-400">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>
                            <flux:menu.separator />
                            <flux:menu.radio.group>
                                <flux:menu.item :href="route('settings.profile')" icon="user-circle" class="hover:bg-zinc-100 dark:hover:bg-zinc-800" wire:navigate>
                                    <span class="font-medium">{{ __('Mi Perfil') }}</span>
                                </flux:menu.item>
                                <flux:menu.item :href="route('settings.profile')" icon="cog" class="hover:bg-zinc-100 dark:hover:bg-zinc-800" wire:navigate>
                                    <span class="font-medium">{{ __('Configuración') }}</span>
                                </flux:menu.item>
                            </flux:menu.radio.group>
                            <flux:menu.separator />
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 font-medium">
                                    {{ __('Cerrar Sesión') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
        </flux:sidebar>

        <!-- Mobile Header / User Menu -->
        <flux:header class="lg:hidden sticky top-0 z-40 backdrop-blur-md bg-white/80 dark:bg-zinc-900/70 border-b border-zinc-200/70 dark:border-zinc-700/60">
            <div class="flex items-center w-full px-2 gap-2">
                <flux:sidebar.toggle
                    class="p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
                    icon="bars-2"
                    inset="left"
                />
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2 font-semibold tracking-tight">
                    {{-- <x-app-logo class="h-7 w-auto" /> --}}
                    <span>{{ config('app.name') }}</span>
                </a>
                <flux:spacer />
                <button type="button" @click="document.documentElement.classList.toggle('dark')" class="p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" aria-label="Toggle theme">
                    <flux:icon name="sun" class="h-5 w-5 dark:hidden text-amber-500" />
                    <flux:icon name="moon" class="h-5 w-5 hidden dark:inline-block text-indigo-400" />
                </button>
                <flux:dropdown position="top" align="end">
                    <flux:profile
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevron-down"
                        class="shadow-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg transition-colors duration-200"
                    />
                    <flux:menu class="w-[250px] rounded-xl shadow-xl border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                        <flux:menu.radio.group>
                            <div class="p-3 text-sm font-normal bg-gradient-to-r from-zinc-50 to-white dark:from-zinc-900 dark:to-zinc-800">
                                <div class="flex items-center gap-3 text-start">
                                    <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full ring-2 ring-indigo-500/40">
                                        <span class="flex h-full w-full items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-semibold">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>
                                    <div class="grid flex-1 text-start leading-tight min-w-0">
                                        <span class="truncate font-semibold text-sm">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-[11px] text-zinc-500 dark:text-zinc-400">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>
                        <flux:menu.separator />
                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="user-circle" class="hover:bg-zinc-100 dark:hover:bg-zinc-800" wire:navigate>
                                <span class="font-medium">{{ __('Mi Perfil') }}</span>
                            </flux:menu.item>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" class="hover:bg-zinc-100 dark:hover:bg-zinc-800" wire:navigate>
                                <span class="font-medium">{{ __('Configuración') }}</span>
                            </flux:menu.item>
                        </flux:menu.radio.group>
                        <flux:menu.separator />
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 font-medium">
                                {{ __('Cerrar Sesión') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </flux:header>

        {{ $slot }}

    @stack('scripts')
        @fluxScripts
    </body>
</html>
