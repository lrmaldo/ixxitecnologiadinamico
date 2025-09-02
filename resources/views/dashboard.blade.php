<x-layouts.app :title="__('Dashboard')">
    @php
        // Estadísticas de visitas
        $siteStats = new \App\Models\SiteStatistic();
        $visitStats = $siteStats->getSummary();
        $visits = $visitStats['total'] ?? cache('site_visits', 0);
        $todayVisits = $visitStats['today'] ?? 0;
        $yesterdayVisits = $visitStats['yesterday'] ?? 0;
        $percentChange = $visitStats['percent_change'] ?? 0;

        // Datos del sitio
        $servicesCount = \App\Models\Service::count();
        $postsCount = \App\Models\Post::count();
        $latestPosts = \App\Models\Post::latest()->take(5)->get(['id','title','created_at','is_published']);
        $latestServices = \App\Models\Service::latest()->take(5)->get(['id','title','created_at','is_active']);
    @endphp

    <div class="space-y-10 animate-fade-in-up">
        <!-- Tarjetas de métricas -->
        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <!-- Visitas -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Visitas</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ number_format($visits) }}</p>
                    </div>
                    <a href="{{ auth()->user()->isAdmin() ? route('admin.statistics') : '#' }}" class="rounded-xl bg-indigo-500/10 p-3 text-indigo-600 dark:text-indigo-300 hover:bg-indigo-500/20 transition-colors">
                        <flux:icon name="layout-grid" class="h-6 w-6" />
                    </a>
                </div>
                <div class="mt-3 flex items-center text-xs">
                    <span class="text-zinc-500 dark:text-zinc-400">Hoy: {{ number_format($todayVisits) }}</span>

                    @if($percentChange > 0)
                        <span class="ml-2 flex items-center text-emerald-500 dark:text-emerald-400">
                            <flux:icon name="trending-up" class="h-3 w-3 mr-0.5" />
                            {{ $percentChange }}%
                        </span>
                    @elseif($percentChange < 0)
                        <span class="ml-2 flex items-center text-rose-500 dark:text-rose-400">
                            <flux:icon name="trending-down" class="h-3 w-3 mr-0.5" />
                            {{ abs($percentChange) }}%
                        </span>
                    @else
                        <span class="ml-2 flex items-center text-zinc-500 dark:text-zinc-400">
                            <flux:icon name="minus" class="h-3 w-3 mr-0.5" />
                            0%
                        </span>
                    @endif
                </div>
            </div>

            <!-- Servicios -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-emerald-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Servicios</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ $servicesCount }}</p>
                    </div>
                    <div class="rounded-xl bg-emerald-500/10 p-3 text-emerald-600 dark:text-emerald-300">
                        <flux:icon name="layout-grid" class="h-6 w-6" />
                    </div>
                </div>
                <div class="mt-3 text-xs text-zinc-500 dark:text-zinc-400">Activos actualmente</div>
            </div>

            <!-- Publicaciones -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-rose-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Publicaciones</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ $postsCount }}</p>
                    </div>
                    <div class="rounded-xl bg-rose-500/10 p-3 text-rose-600 dark:text-rose-300">
                        <flux:icon name="book-open-text" class="h-6 w-6" />
                    </div>
                </div>
                <div class="mt-3 text-xs text-zinc-500 dark:text-zinc-400">Totales creadas</div>
            </div>

            <!-- Placeholder crecimiento -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-10 -bottom-8 h-32 w-32 rounded-full bg-indigo-400/10 blur-2xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Actividad</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ $latestPosts->count() + $latestServices->count() }}</p>
                    </div>
                    <div class="rounded-xl bg-indigo-400/10 p-3 text-indigo-500 dark:text-indigo-300">
                        <flux:icon name="folder-git-2" class="h-6 w-6" />
                    </div>
                </div>
                <div class="mt-3 text-xs text-zinc-500 dark:text-zinc-400">Registros recientes</div>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-2">
            <!-- Últimas publicaciones -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/50 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/40 shadow-sm">
                <div class="px-6 pt-5 pb-4 flex items-center justify-between">
                    <h3 class="text-sm font-semibold tracking-wide text-zinc-600 dark:text-zinc-300 uppercase">Últimas publicaciones</h3>
                    <a href="{{ route('admin.posts') }}" wire:navigate class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:underline">Ver todas</a>
                </div>
                <div class="divide-y divide-zinc-200/70 dark:divide-zinc-700/60">
                    @forelse($latestPosts as $post)
                        <div class="px-6 py-4 flex items-center gap-4 hover:bg-zinc-50/80 dark:hover:bg-zinc-800/40 transition-colors">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-zinc-800 dark:text-zinc-100 truncate">{{ $post->title }}</p>
                                <p class="mt-0.5 text-xs text-zinc-500 dark:text-zinc-400 flex items-center gap-2">
                                    <span>{{ $post->created_at->diffForHumans(null, true) }}</span>
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-medium {{ $post->is_published ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-300' : 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300' }}">
                                        {{ $post->is_published ? 'Publicado' : 'Borrador' }}
                                    </span>
                                </p>
                            </div>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" wire:navigate class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:underline">Editar</a>
                        </div>
                    @empty
                        <div class="px-6 py-10 text-center text-sm text-zinc-500 dark:text-zinc-400">Sin publicaciones recientes</div>
                    @endforelse
                </div>
            </div>

            <!-- Últimos servicios -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/50 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/40 shadow-sm">
                <div class="px-6 pt-5 pb-4 flex items-center justify-between">
                    <h3 class="text-sm font-semibold tracking-wide text-zinc-600 dark:text-zinc-300 uppercase">Últimos servicios</h3>
                    <a href="{{ route('admin.services') }}" wire:navigate class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:underline">Ver todos</a>
                </div>
                <div class="divide-y divide-zinc-200/70 dark:divide-zinc-700/60">
                    @forelse($latestServices as $service)
                        <div class="px-6 py-4 flex items-center gap-4 hover:bg-zinc-50/80 dark:hover:bg-zinc-800/40 transition-colors">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-zinc-800 dark:text-zinc-100 truncate">{{ $service->title }}</p>
                                <p class="mt-0.5 text-xs text-zinc-500 dark:text-zinc-400 flex items-center gap-2">
                                    <span>{{ $service->created_at->diffForHumans(null, true) }}</span>
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-medium {{ $service->is_active ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-300' : 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300' }}">
                                        {{ $service->is_active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </p>
                            </div>
                            <a href="{{ route('admin.services.edit', $service->id) }}" wire:navigate class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:underline">Editar</a>
                        </div>
                    @empty
                        <div class="px-6 py-10 text-center text-sm text-zinc-500 dark:text-zinc-400">Sin servicios recientes</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Placeholder gráfico / pattern -->
        <div class="relative overflow-hidden rounded-2xl border border-dashed border-zinc-300 dark:border-zinc-700/70 p-8 text-center bg-zinc-50/60 dark:bg-zinc-900/40">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/10 dark:stroke-neutral-100/10" />
            <div class="relative mx-auto max-w-md space-y-3">
                <h4 class="text-sm font-semibold tracking-wide text-zinc-600 dark:text-zinc-300 uppercase">Próximo módulo</h4>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Aquí podrás añadir pronto gráficos o analíticas más detalladas del comportamiento de tu plataforma.</p>
            </div>
        </div>
    </div>
</x-layouts.app>
