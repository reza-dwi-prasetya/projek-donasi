<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ExpenditureResource\Pages;
use App\Models\Expenditure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextArea;
use Filament\Tables\Filters\SelectFilter;

class ExpenditureResource extends Resource
{
    protected static ?string $model = Expenditure::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';
    protected static ?string $navigationLabel = 'Pengeluaran';
    protected static ?string $pluralLabel = 'Pengeluaran';

    protected static ?string $navigationGroup = 'Manajemen Keuangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Kolom kategori diubah agar tidak lagi memilih donatur secara manual, melainkan berdasarkan produk (kategori)
                Select::make('products_id') // Menggunakan 'products_id' untuk relasi dengan produk
                    ->label('Daftar Kategori')
                    ->relationship('product', 'name') // Relasi ke 'product' model
                    ->required(),
                TextInput::make('activity_name')
                    ->label('Nama Kegiatan')
                    ->required(),
                TextInput::make('amount')
                    ->label('Nominal Pengeluaran')
                    ->numeric()
                    ->required(),
                FileUpload::make('photo_proof')
                    ->label('Bukti Pengeluaran')
                    ->image()
                    ->directory('proofs')
                    ->nullable(),
                TextArea::make('description')
                    ->label('Keterangan')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Perbaiki relasi email untuk donatur, sehingga menampilkan email dari user yang terhubung di transaction
                TextColumn::make('product.name') // Perbaiki relasi ke 'product' untuk kategori yang sesuai
                    ->label('Daftar Kategori'),
                TextColumn::make('activity_name')
                    ->label('Nama Kegiatan'),
                TextColumn::make('amount')
                    ->label('Nominal Pengeluaran')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')), // Format manual untuk Rp
                ImageColumn::make('photo_proof')
                    ->label('Bukti'),
                TextColumn::make('created_at')
                    ->label('Tanggal Pengeluaran')
                    ->dateTime(),
            ])
            ->filters([
                // Memfilter berdasarkan kategori produk
                SelectFilter::make('products_id')
                    ->label('Products')
                    ->relationship('product', 'name'),
                // Menambahkan filter berdasarkan donatur, mengacu pada email user yang terkait dengan transaksi
                SelectFilter::make('user_id')
                    ->label('Donatur (Email)')
                    ->relationship('transaction.user', 'email'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenditures::route('/'),
            'create' => Pages\CreateExpenditure::route('/create'),
            'edit' => Pages\EditExpenditure::route('/{record}/edit'),
        ];
    }
}
