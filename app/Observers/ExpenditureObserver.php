<?php

namespace App\Observers;

use App\Models\Expenditure;
use App\Models\Report;

class ExpenditureObserver
{
    public function created(Expenditure $expenditure): void
    {
        Report::updateOrCreate(
            ['activity_name' => 'Pengeluaran: ' . $expenditure->activity_name],
            [
                'date' => $expenditure->created_at,
                'amount' => -1 * $expenditure->amount,
                'description' => $expenditure->description,
            ]
        );
    }

    public function deleted(Expenditure $expenditure): void
    {
        Report::where('activity_name', 'Pengeluaran: ' . $expenditure->activity_name)->delete();
    }
}
