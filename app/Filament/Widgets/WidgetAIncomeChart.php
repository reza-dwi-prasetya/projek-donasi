<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class WidgetAIncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Donasi per Bulan';

    /**
     * Definisikan jenis chart yang digunakan.
     */
    protected function getType(): string
    {
        return 'line'; // Jenis chart line
    }

    /**
     * Ambil data untuk ditampilkan di chart.
     */
    protected function getData(): array
    {
        // Tentukan tahun sekarang
        $year = now()->year;

        // Ambil data donasi per bulan
        $monthlyIncomes = Transaction::query()
            ->selectRaw('MONTH(created_at) as month, SUM(donate_price) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Pastikan semua bulan dari Januari hingga Desember ada di data
        $incomes = collect(range(1, 12))->map(function ($month) use ($monthlyIncomes) {
            return $monthlyIncomes->get($month, 0);
        });

        // Tetapkan label bulan
        $labels = collect(range(1, 12))->map(fn ($month) => Carbon::create($year, $month, 1)->translatedFormat('F'));

        return [
            'datasets' => [
                [
                    'label' => 'Donasi per Bulan',
                    'data' => $incomes->toArray(),
                    'fill' => true,
                    'borderColor' => '#34d399', // Warna garis
                    'backgroundColor' => 'rgba(52, 211, 153, 0.2)', // Warna area
                ],
            ],
            'labels' => $labels->toArray(),
            'options' => [
                'scales' => [
                    'y' => [
                        'min' => 0, // Nilai minimum sumbu Y
                        'max' => 5000000, // Nilai maksimum sumbu Y
                        'ticks' => [
                            'stepSize' => 500000, // Jarak antar nilai pada sumbu Y
                        ],
                    ],
                ],
            ],
        ];
    }
}
