<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreedResource\Pages;
use App\Models\Creed;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CreedResource extends Resource
{
    protected static ?string $model = Creed::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    protected static string|\UnitEnum|null $navigationGroup = 'Profil & Informasi';

    protected static ?string $navigationLabel = 'Pengakuan Iman';

    protected static ?string $modelLabel = 'Pengakuan Iman';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Section::make('Butir Pengakuan Iman')
                    ->schema([
                        Forms\Components\TextInput::make('number')
                            ->label('Nomor Butir (1-31)')
                            ->required()
                            ->numeric(),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul / Ringkasan')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(1),

                        Forms\Components\Textarea::make('content')
                            ->label('Isi Lengkap Pengakuan Iman')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->label('Butir Ke-')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul / Ringkasan')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('content')
                    ->label('Isi Pengakuan')
                    ->limit(60),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('number', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCreeds::route('/'),
            'create' => Pages\CreateCreed::route('/create'),
            'edit' => Pages\EditCreed::route('/{record}/edit'),
        ];
    }
}
