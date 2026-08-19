<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PastorProfileResource\Pages;
use App\Models\PastorProfile;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PastorProfileResource extends Resource
{
    protected static ?string $model = PastorProfile::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user';

    protected static string|\UnitEnum|null $navigationGroup = 'Profil & Informasi';

    protected static ?string $navigationLabel = 'Profil Gembala';

    protected static ?string $modelLabel = 'Profil Gembala';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Gembala')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap Gembala')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('title')
                            ->label('Gelar / Jabatan')
                            ->placeholder('Gembala Jemaat GBIA GRAMMATA')
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto Gembala')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('pastor')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('greeting')
                            ->label('Kata Sambutan Gembala')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Profil Utama')
                            ->default(true),
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
                    ->label('Nama Gembala')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Gelar'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
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
            'index' => Pages\ListPastorProfiles::route('/'),
            'create' => Pages\CreatePastorProfile::route('/create'),
            'edit' => Pages\EditPastorProfile::route('/{record}/edit'),
        ];
    }
}
