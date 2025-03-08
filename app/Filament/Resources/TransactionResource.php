<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Product;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Riwayat Donasi';
    protected static ?string $pluralLabel = 'Riwayat Donasi';

    protected static ?string $navigationGroup = 'Manajemen Keuangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(['default' => 1, 'sm' => 1, 'xl' => 2])
                    ->schema([
                        TextInput::make('username')
                            ->label('Username')
                            ->required()
                            ->placeholder('Nama pengguna'),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->placeholder('Alamat email'),
                        Select::make('products_id')
                            ->label('Produk')
                            ->relationship('product', 'name')
                            ->required()
                            ->placeholder('Pilih produk terkait'),
                        Textarea::make('description')
                            ->label('Pesan')
                            ->rows(4)
                            ->placeholder('Pesan atau keterangan tambahan'),
                        TextInput::make('donate_price')
                            ->label('Jumlah Donasi')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->placeholder('Masukkan jumlah donasi'),
                        Select::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->options([
                                'bank_transfer' => 'Bank Transfer',
                                'credit_card' => 'Kartu Kredit',
                                'ewallet' => 'E-Wallet',
                            ])
                            ->required()
                            ->placeholder('Pilih metode pembayaran'),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'success' => 'Success',
                                'failed' => 'Failed',
                            ])
                            ->default('pending')
                            ->placeholder('Pilih status transaksi'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->sortable()
                    ->searchable()
                    ->label('Username'),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('product.name')
                    ->sortable()
                    ->searchable()
                    ->label('Produk'),
                TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->label('Pesan'),
                TextColumn::make('donate_price')
                    ->label('Donasi')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->sortable()
                    ->searchable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'success',
                        'danger' => 'failed',
                    ])
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Donasi')
                    ->dateTime('d M Y, H:i'),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
