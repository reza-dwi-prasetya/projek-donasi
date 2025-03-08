<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\TextColumn;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    protected static ?string $navigationGroup = 'Managemen Donatur';

    protected static ?string $label = 'Pesan Donatur';

    protected static ?string $pluralLabel = 'Pesan Donatur';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nama')
                ->required()
                ->disabled(),
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->disabled(),
            TextInput::make('subject')
                ->label('Subjek')
                ->required()
                ->disabled(),
            Textarea::make('message')
                ->label('Pesan')
                ->required()
                ->disabled(),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')
                ->label('Nama'),
            TextColumn::make('email')
                ->label('Email'),
            TextColumn::make('subject')
                ->label('Subjek'),
            TextColumn::make('message')
                ->label('Pesan')
                ->limit(50),
            TextColumn::make('created_at')
                ->label('Tanggal Dikirim')
                ->dateTime('d M Y, H:i'),
        ])
        ->filters([
            SelectFilter::make('created_at')
                ->label('Hari Ini')
                ->query(fn ($query) => $query->whereDate('created_at', today())),
        ])
        ->actions([])
        ->bulkActions([]);
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}
