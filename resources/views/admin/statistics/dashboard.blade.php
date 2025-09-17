<x-layouts.app :title="__('Estadísticas del sitio')">
    <div class="space-y-10 animate-fade-in-up">
        <!-- Resumen de métricas -->
        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <!-- Visitas hoy -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Visitas hoy</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ $summary['today'] }}</p>
                    </div>
                    <div class="rounded-xl bg-indigo-500/10 p-3 text-indigo-600 dark:text-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4v16M3 4l4 4"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs">
                    <span class="text-zinc-500 dark:text-zinc-400">Ayer: {{ $summary['yesterday'] }}</span>

                    @if($summary['percent_change'] > 0)
                        <span class="ml-2 flex items-center text-emerald-500 dark:text-emerald-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            {{ $summary['percent_change'] }}%
                        </span>
                    @elseif($summary['percent_change'] < 0)
                        <span class="ml-2 flex items-center text-rose-500 dark:text-rose-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                            {{ abs($summary['percent_change']) }}%
                        </span>
                    @else
                        <span class="ml-2 flex items-center text-zinc-500 dark:text-zinc-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                            0%
                        </span>
                    @endif
                </div>
            </div>

            <!-- Visitas este mes -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-emerald-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Este mes</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ $summary['this_month'] }}</p>
                    </div>
                    <div class="rounded-xl bg-emerald-500/10 p-3 text-emerald-600 dark:text-emerald-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs">
                    <span class="text-zinc-500 dark:text-zinc-400">Mes anterior: {{ $summary['last_month'] }}</span>

                    @if($summary['month_percent_change'] > 0)
                        <span class="ml-2 flex items-center text-emerald-500 dark:text-emerald-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            {{ $summary['month_percent_change'] }}%
                        </span>
                    @elseif($summary['month_percent_change'] < 0)
                        <span class="ml-2 flex items-center text-rose-500 dark:text-rose-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                            {{ abs($summary['month_percent_change']) }}%
                        </span>
                    @else
                        <span class="ml-2 flex items-center text-zinc-500 dark:text-zinc-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                            0%
                        </span>
                    @endif
                </div>
            </div>

            <!-- Total de visitas -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Total histórico</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">{{ $summary['total'] }}</p>
                    </div>
                    <div class="rounded-xl bg-indigo-500/10 p-3 text-indigo-600 dark:text-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 text-xs text-zinc-500 dark:text-zinc-400">Desde el inicio de la medición</div>
            </div>

            <!-- Promedio diario -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-950 p-5 shadow-sm">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-500/10 blur-xl"></div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Promedio diario</p>
                        <p class="mt-2 text-3xl font-bold text-zinc-800 dark:text-zinc-100 tabular-nums">
                            {{ round($summary['this_month'] / now()->day) }}
                        </p>
                    </div>
                    <div class="rounded-xl bg-indigo-500/10 p-3 text-indigo-600 dark:text-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 text-xs text-zinc-500 dark:text-zinc-400">Este mes</div>
            </div>
        </div>

        <!-- Gráfico de visitas -->
        <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/50 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/40 shadow-sm p-6">
            <h3 class="text-sm font-semibold tracking-wide text-zinc-600 dark:text-zinc-300 uppercase mb-4">Tendencia de visitas</h3>

            <div class="flex gap-4 mb-6">
                <button type="button" class="period-btn active px-4 py-2 text-xs font-medium rounded-md bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300" data-period="daily">Diario</button>
                <button type="button" class="period-btn px-4 py-2 text-xs font-medium rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 hover:text-indigo-600 dark:hover:text-indigo-300" data-period="monthly">Mensual</button>
            </div>

            <div id="visits-chart" style="height: 350px;"></div>
        </div>

        <div class="grid gap-8 lg:grid-cols-2">
            <!-- Páginas más visitadas -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/50 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/40 shadow-sm">
                <div class="px-6 pt-5 pb-4">
                    <h3 class="text-sm font-semibold tracking-wide text-zinc-600 dark:text-zinc-300 uppercase">Páginas más visitadas</h3>
                </div>
                <div class="divide-y divide-zinc-200/70 dark:divide-zinc-700/60">
                    @forelse($topPages as $index => $page)
                        <div class="px-6 py-4 flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 flex items-center justify-center text-sm font-semibold">
                                {{ $index + 1 }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-zinc-800 dark:text-zinc-100 truncate">{{ $page->page }}</p>
                                <p class="mt-0.5 text-xs text-zinc-500 dark:text-zinc-400 flex items-center gap-2">
                                    {{ $page->total_visits }} visitas
                                </p>
                            </div>
                            <div class="text-xs font-medium text-indigo-600 dark:text-indigo-400">
                                {{ round(($page->total_visits / $summary['total']) * 100, 1) }}%
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-10 text-center text-sm text-zinc-500 dark:text-zinc-400">Sin datos disponibles</div>
                    @endforelse
                </div>
            </div>

            <!-- Distribución de tráfico (placeholder) -->
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/50 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/40 shadow-sm">
                <div class="px-6 pt-5 pb-4">
                    <h3 class="text-sm font-semibold tracking-wide text-zinc-600 dark:text-zinc-300 uppercase">Distribución de tráfico</h3>
                </div>
                <div class="p-6">
                    <div id="traffic-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Asegurar que los gráficos se inicialicen correctamente
        function initializeCharts() {
            // Inicializar datos
            const dailyLabels = @json($dailyStats->pluck('day'));
            const dailyData = @json($dailyStats->pluck('visits'));
            const monthlyLabels = @json($monthlyStats->pluck('month'));
            const monthlyData = @json($monthlyStats->pluck('visits'));

            // Variables globales para los gráficos
            window.visitsChart = window.visitsChart || null;
            window.trafficChart = window.trafficChart || null;

            // Gráfico de visitas
            let currentPeriod = 'daily';
            const chartOptions = {
                series: [{
                    name: 'Visitas',
                    data: dailyData
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, sans-serif',
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: dailyLabels,
                    labels: {
                        style: {
                            colors: '#71717a',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif',
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#71717a',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif',
                        }
                    }
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy'
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                },
                grid: {
                    borderColor: '#e2e8f0',
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                colors: ['#4f46e5']
            };

            const visitsContainerEl = document.querySelector("#visits-chart");

            // Destruir gráfico existente si existe
            if (window.visitsChart) {
                try {
                    window.visitsChart.destroy();
                } catch(e) {}
                window.visitsChart = null;
            }

            // Esperar a que el contenedor tenga dimensiones reales
            if (visitsContainerEl) {
                // Forzar el cálculo de dimensiones y esperar a que esté visible
                const checkAndCreateChart = () => {
                    const rect = visitsContainerEl.getBoundingClientRect();
                    const isVisible = rect.width > 0 && rect.height > 0 &&
                                    visitsContainerEl.offsetParent !== null;

                    if (isVisible) {
                        window.visitsChart = new ApexCharts(visitsContainerEl, chartOptions);
                        window.visitsChart.render().then(() => {
                            setTimeout(() => {
                                try {
                                    if (window.visitsChart && typeof window.visitsChart.resize === 'function') {
                                        window.visitsChart.resize();
                                    }
                                } catch(e) {}
                            }, 300);
                        }).catch(()=>{});
                    } else {
                        // Reintentar después de un breve delay
                        setTimeout(checkAndCreateChart, 100);
                    }
                };

                checkAndCreateChart();
            }

            // Gráfico de distribución de tráfico
            // Datos de distribución provistos por el servidor
            const trafficData = @json($trafficDistribution);

            const trafficOptions = {
                series: trafficData.map(item => item.value),
                chart: {
                    width: '100%',
                    type: 'donut',
                    fontFamily: 'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, sans-serif',
                },
                labels: trafficData.map(item => item.name),
                colors: ['#4f46e5', '#10b981', '#f59e0b', '#f43f5e'],
                legend: {
                    position: 'bottom',
                    fontFamily: 'Inter, sans-serif',
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            const trafficContainerEl = document.querySelector("#traffic-chart");

            // Destruir gráfico existente si existe
            if (window.trafficChart) {
                try {
                    window.trafficChart.destroy();
                } catch(e) {}
                window.trafficChart = null;
            }

            if (trafficContainerEl) {
                // Verificar dimensiones y visibilidad del contenedor
                const checkAndCreateTrafficChart = () => {
                    const rect = trafficContainerEl.getBoundingClientRect();
                    const isVisible = rect.width > 0 && rect.height > 0 &&
                                    trafficContainerEl.offsetParent !== null;

                    if (isVisible) {
                        window.trafficChart = new ApexCharts(trafficContainerEl, trafficOptions);
                        window.trafficChart.render().then(() => {
                            setTimeout(() => {
                                try {
                                    if (window.trafficChart && typeof window.trafficChart.resize === 'function') {
                                        window.trafficChart.resize();
                                    }
                                } catch(e) {}
                            }, 300);
                        }).catch(()=>{});
                    } else {
                        // Reintentar después de un breve delay
                        setTimeout(checkAndCreateTrafficChart, 100);
                    }
                };

                checkAndCreateTrafficChart();
            }

            // Cambiar entre datos diarios y mensuales
            const periodButtons = document.querySelectorAll('.period-btn');
            if (periodButtons && periodButtons.length > 0) {
                periodButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                    const period = this.getAttribute('data-period');

                    // No hacer nada si ya estamos en este periodo
                    if (period === currentPeriod) return;

                    // Actualizar UI de botones
                    document.querySelectorAll('.period-btn').forEach(b => {
                        b.classList.remove('active', 'bg-indigo-50', 'dark:bg-indigo-900/30', 'text-indigo-600', 'dark:text-indigo-300');
                        b.classList.add('bg-zinc-100', 'dark:bg-zinc-800', 'text-zinc-600', 'dark:text-zinc-400');
                    });
                    this.classList.remove('bg-zinc-100', 'dark:bg-zinc-800', 'text-zinc-600', 'dark:text-zinc-400');
                    this.classList.add('active', 'bg-indigo-50', 'dark:bg-indigo-900/30', 'text-indigo-600', 'dark:text-indigo-300');

                    // Actualizar datos del gráfico
                    if (window.visitsChart) {
                        if (period === 'monthly') {
                            if (window.visitsChart && typeof window.visitsChart.updateOptions === 'function') {
                                const p = window.visitsChart.updateOptions({ xaxis: { categories: monthlyLabels } });
                                if (p && typeof p.catch === 'function') p.catch(()=>{});
                            }
                            if (window.visitsChart && typeof window.visitsChart.updateSeries === 'function') {
                                try { window.visitsChart.updateSeries([{ name: 'Visitas', data: monthlyData }]); } catch(e){}
                            }
                        } else {
                            if (window.visitsChart && typeof window.visitsChart.updateOptions === 'function') {
                                const p = window.visitsChart.updateOptions({ xaxis: { categories: dailyLabels } });
                                if (p && typeof p.catch === 'function') p.catch(()=>{});
                            }
                            if (window.visitsChart && typeof window.visitsChart.updateSeries === 'function') {
                                try { window.visitsChart.updateSeries([{ name: 'Visitas', data: dailyData }]); } catch(e){}
                            }
                        }
                    }

                    // Forzar resize tras actualizar datos para evitar canvas vacío
                    setTimeout(() => {
                        try {
                            if (window.visitsChart) window.visitsChart.resize();
                            if (window.trafficChart) window.trafficChart.resize();
                        } catch (e) {}
                    }, 100);

                    currentPeriod = period;
                    });
                });
            }

            // Aplicar tema oscuro a los gráficos si corresponde
            function applyDarkTheme(isDark) {
                const textColor = isDark ? '#d4d4d8' : '#52525b';
                const gridColor = isDark ? '#3f3f46' : '#e2e8f0';

                // Tomar referencias a los contenedores actuales por si Livewire los ha reemplazado
                const visitsContainerEl = document.getElementById('visits-chart');
                const trafficContainerEl = document.getElementById('traffic-chart');

                // Actualizar visitasChart con protecciones
                try {
                    if (window.visitsChart && visitsContainerEl && document.contains(visitsContainerEl)) {
                        try {
                            const p = window.visitsChart.updateOptions({
                                chart: { background: isDark ? '#18181b' : '#ffffff' },
                                xaxis: { labels: { style: { colors: textColor } } },
                                yaxis: { labels: { style: { colors: textColor } } },
                                grid: { borderColor: gridColor }
                            });
                            if (p && typeof p.catch === 'function') p.catch(()=>{});
                        } catch(e) {
                            // ignore synchronous errors from ApexCharts internals
                        }
                    }
                } catch (e) {
                    // ignore outer errors
                }

                // Actualizar trafficChart con protecciones
                try {
                    if (window.trafficChart && trafficContainerEl && document.contains(trafficContainerEl)) {
                        try {
                            const p2 = window.trafficChart.updateOptions({
                                chart: { background: isDark ? '#18181b' : '#ffffff' },
                                legend: { labels: { colors: textColor } }
                            });
                            if (p2 && typeof p2.catch === 'function') p2.catch(()=>{});
                        } catch(e) {
                            // ignore
                        }
                    }
                } catch (e) {
                    // ignore
                }
            }

            // Verificar tema actual
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                applyDarkTheme(true);
            }

            // Observar cambios en el tema
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class') {
                        const isDark = document.documentElement.classList.contains('dark');
                        applyDarkTheme(isDark);
                    }
                });
            });

            observer.observe(document.documentElement, {
                attributes: true
            });

            // Observar visibilidad/estilos del contenedor del gráfico y forzar resize cuando cambie
            try {
                const visitsContainer = document.querySelector('#visits-chart');
                    if (visitsContainer) {
                    const visObs = new MutationObserver(() => {
                        try {
                            if (window.visitsChart && visitsContainer && document.contains(visitsContainer)) {
                                window.visitsChart.resize();
                            }
                            if (window.trafficChart && trafficContainerEl && document.contains(trafficContainerEl)) {
                                window.trafficChart.resize();
                            }
                        } catch (e) {}
                    });
                    visObs.observe(visitsContainer, { attributes: true, attributeFilter: ['style', 'class'] });
                    // También un observer para el body en caso de que el contenedor sea mostrado por JS
                    const bodyObs = new MutationObserver(() => {
                        try {
                            if (window.visitsChart && visitsContainer && document.contains(visitsContainer)) {
                                window.visitsChart.resize();
                            }
                            if (window.trafficChart && trafficContainerEl && document.contains(trafficContainerEl)) {
                                window.trafficChart.resize();
                            }
                        } catch(e){}
                    });
                    bodyObs.observe(document.body, { attributes: true, subtree: false, attributeFilter: ['class', 'style'] });
                }
            } catch (e) {}
        }

        // Inicializar cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            initializeCharts();
        });

        // Reinicializar cuando Livewire termine de actualizar
        document.addEventListener('livewire:navigated', function() {
            setTimeout(() => {
                initializeCharts();
            }, 100);
        });

        // También escuchar eventos de Livewire v3
        document.addEventListener('livewire:load', function() {
            setTimeout(() => {
                initializeCharts();
            }, 100);
        });

        // Escuchar cambios de contenido
        document.addEventListener('livewire:update', function() {
            setTimeout(() => {
                initializeCharts();
            }, 100);
        });
    </script>
    @endpush
</x-layouts.app>
