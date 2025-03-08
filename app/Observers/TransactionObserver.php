<?php

namespace App\Observers;

use App\Models\Transaction;
use App\Models\Report;

class TransactionObserver
{
    public function created(Transaction $transaction): void
    {
        Report::updateOrCreate(
            ['activity_name' => 'Pemasukan: ' . $transaction->description],
            [
                'date' => $transaction->created_at,
                'amount' => $transaction->donate_price,
                'description' => $transaction->description,
            ]
        );
    }

    public function deleted(Transaction $transaction): void
    {
        Report::where('activity_name', 'Pemasukan: ' . $transaction->description)->delete();
    }
}
