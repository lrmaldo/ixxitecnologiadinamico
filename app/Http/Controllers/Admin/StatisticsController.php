<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteStatistic;

class StatisticsController extends Controller
{
    /**
     * Mostrar el dashboard de estadísticas
     */
    public function dashboard()
    {
        $summary = SiteStatistic::getSummary();
        $dailyStats = SiteStatistic::getDailyStats(30);
        $monthlyStats = SiteStatistic::getMonthlyStats(12);
        $topPages = SiteStatistic::getTopPages(10);

        return view('admin.statistics.dashboard', compact(
            'summary',
            'dailyStats',
            'monthlyStats',
            'topPages'
        ));
    }

    /**
     * Obtener datos de estadísticas en formato JSON para gráficos
     */
    public function chartData()
    {
        $period = request('period', 'daily');

        if ($period === 'monthly') {
            $stats = SiteStatistic::getMonthlyStats(12);
            $labels = $stats->pluck('month')->toArray();
            $data = $stats->pluck('visits')->toArray();
        } else {
            $stats = SiteStatistic::getDailyStats(30);
            $labels = $stats->pluck('day')->toArray();
            $data = $stats->pluck('visits')->toArray();
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
