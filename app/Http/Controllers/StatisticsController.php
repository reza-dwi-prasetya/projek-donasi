<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        $selectedMonth = $request->input('month', now()->month);
        // Total donasi untuk bulan yang dipilih
        $totalDonasi = DB::table('transactions')
            ->whereMonth('created_at', $selectedMonth)
            ->sum('donate_price');

        // Total pengeluaran untuk bulan yang dipilih
        $totalPengeluaran = DB::table('expenditures')
            ->whereMonth('created_at', $selectedMonth)
            ->sum('amount');

        // Donatur terbanyak
        $topDonors = DB::table('transactions')
            ->select('username', 'email', DB::raw('SUM(donate_price) as total_donasi'))
            ->groupBy('username', 'email')
            ->orderByDesc('total_donasi')
            ->limit(5)
            ->get();

            $donasiHarian = DB::table('transactions')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(donate_price) as total'))
            ->whereNull('deleted_at')
            ->whereMonth('created_at', $selectedMonth)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Grafik Pengeluaran per Hari
        $pengeluaranHarian = DB::table('expenditures')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(amount) as total'))
            ->whereMonth('created_at', $selectedMonth)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Format Data untuk Grafik
        $donasiLabels = $donasiHarian->pluck('date');
        $donasiDataset = $donasiHarian->pluck('total');
        $pengeluaranLabels = $pengeluaranHarian->pluck('date');
        $pengeluaranDataset = $pengeluaranHarian->pluck('total');

        return view('pages.statistics', [
            'selectedMonth' => $selectedMonth,
            'totalDonasi' => $totalDonasi,
            'totalPengeluaran' => $totalPengeluaran,
            'topDonors' => $topDonors,
            'donasiLabels' => $donasiLabels,
            'donasiDataset' => $donasiDataset,
            'pengeluaranLabels' => $pengeluaranLabels,
            'pengeluaranDataset' => $pengeluaranDataset,
        ]);
    }
}
