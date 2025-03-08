<?php

namespace App\Filament\Resources\ExpenditureResource\Pages;

use App\Filament\Resources\ExpenditureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExpenditure extends CreateRecord
{
    protected static string $resource = ExpenditureResource::class;
    public function getTitle(): string
    {
        return 'Tambah Pengeluaran Baru'; // Judul halaman create
    }
}
