<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document';
    protected static ?string $navigationLabel = ' Daftar Kategori';
    protected static ?string $pluralLabel = ' Daftar Kategori';

    protected static ?string $navigationGroup = 'Manajemen Kategori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label('Kegiatan'),
                        Select::make('categories_id')
                            ->label('Kategori')
                            ->relationship('category', 'name') // Relasi yang benar
                            ->required(),
                        RichEditor::make('thumbnail_description')
                            ->required()
                            ->label('Deskripsi Singkat'),
                        RichEditor::make('description')
                            ->required()
                            ->label('Deskripsi Lengkap'),
                        TextInput::make('goal_price')
                            ->required()
                            ->numeric()
                            ->label('Target Dana'),
                        FileUpload::make('photos')
                            ->label('Foto'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Kegiatan'),
                TextColumn::make('category.name') // Mengakses nama kategori
                    ->sortable()
                    ->searchable()
                    ->label('Kategori'),
                TextColumn::make('goal_price')
                    ->sortable()
                    ->searchable()
                    ->label('Target Dana')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('current_price')
                    ->sortable()
                    ->searchable()
                    ->label('Dana Terkumpul')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                ImageColumn::make('photos')
                    ->label('Foto')
                    ->url(fn ($record) => $record->photos ? asset('storage/' . $record->photos) : null),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
