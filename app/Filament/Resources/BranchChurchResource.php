<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchChurchResource\Pages;
use App\Models\BranchChurch;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class BranchChurchResource extends Resource
{
    protected static ?string $model = BranchChurch::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

    protected static string|\UnitEnum|null $navigationGroup = 'Profil & Informasi';

    protected static ?string $navigationLabel = 'Tunas Jemaat';

    protected static ?string $modelLabel = 'Tunas Jemaat';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Tunas Jemaat')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Cabang / Pos Pelayanan')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('pastor_name')
                            ->label('Nama Gembala / Pelayanan')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('address')
                            ->label('Alamat Lokasi')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(1),

                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto Lokasi')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('branches')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Tunas Jemaat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pastor_name')
                    ->label('Pelayan / Gembala')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->limit(40),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBranchChurches::route('/'),
            'create' => Pages\CreateBranchChurch::route('/create'),
            'edit' => Pages\EditBranchChurch::route('/{record}/edit'),
        ];
    }
}
