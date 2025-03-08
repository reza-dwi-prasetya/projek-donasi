<?php
namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('download')
                ->label('Download PDF')
                ->icon('heroicon-o-cloud-arrow-down')
                ->action('downloadReport'),
        ];
    }
    public function getTitle(): string
    {
        return 'Laporan'; // Judul halaman create
    }

    public function printReport()
    {
        $reports = ReportResource::getEloquentQuery()->get();

        // Load a view and pass the data for the PDF
        $pdf = Pdf::loadView('reports.print', ['reports' => $reports]);

        // Stream the PDF to the browser
        return response()->streamDownload(fn () => print($pdf->output()), 'laporan-keuangan.pdf');
    }

    public function downloadReport()
    {
        $reports = ReportResource::getEloquentQuery()->get();

        // Load a view and pass the data for the PDF
        $pdf = Pdf::loadView('reports.print', ['reports' => $reports]);

        // Save the PDF temporarily
        $path = 'laporan-keuangan-' . now()->format('Y-m-d') . '.pdf';
        Storage::put($path, $pdf->output());

        // Download the PDF file
        return Storage::download($path);
    }
}
