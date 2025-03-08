<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\Transaction;
use App\Models\Expenditure;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        // Ambil filter tanggal dari page
        $startDate = !is_null($this->filters['startDate'] ?? null)
            ? Carbon::parse($this->filters['startDate'])
            : Carbon::createFromTimestamp(0);

        $endDate = !is_null($this->filters['endDate'] ?? null)
            ? Carbon::parse($this->filters['endDate'])
            : now();

        // Pemasukan: Group berdasarkan tanggal dari tabel transactions
        $pemasukanData = Transaction::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(donate_price) as total')
            ->groupBy('date')
            ->pluck('total', 'date')
            ->toArray();

        // Pengeluaran: Group berdasarkan tanggal dari tabel expenditures
        $pengeluaranData = Expenditure::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->pluck('total', 'date')
            ->toArray();

        // Gabungkan tanggal pemasukan dan pengeluaran
        $dates = array_unique(array_merge(array_keys($pemasukanData), array_keys($pengeluaranData)));
        sort($dates);

        // Siapkan data chart
        $pemasukanChart = [];
        $pengeluaranChart = [];
        $selisihChart = [];

        foreach ($dates as $date) {
            $pemasukan = $pemasukanData[$date] ?? 0;
            $pengeluaran = $pengeluaranData[$date] ?? 0;
            $selisih = $pemasukan - $pengeluaran;

            $pemasukanChart[] = $pemasukan;
            $pengeluaranChart[] = $pengeluaran;
            $selisihChart[] = $selisih;
        }

        // Hitung total pemasukan, pengeluaran, dan selisih
        $totalPemasukan = array_sum($pemasukanChart);
        $totalPengeluaran = array_sum($pengeluaranChart);
        $totalSelisih = $totalPemasukan - $totalPengeluaran;

        // Return data untuk dashboard
        return [
            Stat::make('Total Donasi', 'Rp. ' . number_format($totalPemasukan, 2, ',', '.'))
                ->description('Total donasi yang masuk')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($pemasukanChart)
                ->color('success'),
            Stat::make('Total Pengeluaran', 'Rp. ' . number_format($totalPengeluaran, 2, ',', '.'))
                ->description('Total pengeluaran saat ini')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart($pengeluaranChart)
                ->color('danger'),
            Stat::make('Selisih', 'Rp. ' . number_format($totalSelisih, 2, ',', '.'))
                ->description('Selisih antara donasi dan pengeluaran')
                ->chart($selisihChart)
                ->color($totalSelisih >= 0 ? 'success' : 'danger'),
        ];
    }
}
