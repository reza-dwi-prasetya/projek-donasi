<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Expenditure;
use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $transactions = Transaction::all();
        $expenditures = Expenditure::all();

        // Sinkronisasi Pemasukan
        foreach ($transactions as $transaction) {
            Report::updateOrCreate(
                ['activity_name' => 'Pemasukan: ' . $transaction->description],
                [
                    'date' => $transaction->created_at,
                    'amount' => $transaction->donate_price,
                    'description' => $transaction->description,
                ]
            );
        }

        // Sinkronisasi Pengeluaran
        foreach ($expenditures as $expenditure) {
            Report::updateOrCreate(
                ['activity_name' => 'Pengeluaran: ' . $expenditure->activity_name],
                [
                    'date' => $expenditure->created_at,
                    'amount' => -1 * $expenditure->amount, // Pengeluaran negatif
                    'description' => $expenditure->description,
                ]
            );
        }
    }
}
