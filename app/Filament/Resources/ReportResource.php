<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Report;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Laporan Keuangan';
    protected static ?string $navigationLabel = 'Laporan';
    protected static ?string $pluralLabel = 'Laporan';



    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('row_number') // Nomor urut biasa
                    ->label('No')
                    ->rowIndex(), // Menggunakan row index dari Filament
                TextColumn::make('date')
                    ->label('Tanggal')
                    ->date(),
                TextColumn::make('activity_type') // Aktivitas (Pemasukan/Pengeluaran)
                    ->label('Aktivitas')
                    ->getStateUsing(function ($record) {
                        return $record->amount > 0 ? 'Pemasukan' : 'Pengeluaran';
                    }),
                TextColumn::make('activity_name') // Nama Kegiatan
                    ->label('Nama Kegiatan'),
                TextColumn::make('amount')
                    ->label('Jumlah (Rp)')
                    ->money('IDR', true),
                TextColumn::make('description')
                    ->label('Keterangan'),
            ])
            ->filters([
                Tables\Filters\Filter::make('pemasukan')
                    ->query(fn ($query) => $query->where('amount', '>', 0))
                    ->label('Pemasukan'),
                Tables\Filters\Filter::make('pengeluaran')
                    ->query(fn ($query) => $query->where('amount', '<', 0))
                    ->label('Pengeluaran'),
            ])
            ->defaultSort('date', 'asc'); // Urutkan berdasarkan tanggal secara default
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
        ];
    }
    /**
     * Generate and print the report
     */
    public function printReport()
    {
        $reports = Report::all();

        // Load a view and pass data for the PDF
        $pdf = Pdf::loadView('reports.print', ['reports' => $reports]);

        // Stream the PDF for browser preview (print dialog will show)
        return $pdf->stream('laporan-keuangan.pdf');
    }

    /**
     * Generate and download the report as PDF
     */
    public function downloadReport()
    {
        $reports = Report::all();

        // Load a view and pass data for the PDF
        $pdf = Pdf::loadView('reports.print', ['reports' => $reports]);

        // Force download the PDF
        return $pdf->download('laporan-keuangan.pdf');
    }
}
