<?php

namespace App\Filament\Widgets;

use App\Models\Expenditure;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class WidgetExpenseChart extends ChartWidget
{
    protected static ?string $heading = 'Pengeluaran per Bulan';

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

        // Ambil data pengeluaran per bulan
        $monthlyExpenses = Expenditure::query()
            ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Pastikan semua bulan dari Januari hingga Desember ada di data
        $expenses = collect(range(1, 12))->map(function ($month) use ($monthlyExpenses) {
            return $monthlyExpenses->get($month, 0);
        });

        // Tetapkan label bulan
        $labels = collect(range(1, 12))->map(fn ($month) => Carbon::create($year, $month, 1)->translatedFormat('F'));

        return [
            'datasets' => [
                [
                    'label' => 'Pengeluaran per Bulan',
                    'data' => $expenses->toArray(),
                    'fill' => true,
                    'borderColor' => '#f87171', // Warna garis
                    'backgroundColor' => 'rgba(248, 113, 113, 0.2)', // Warna area
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
