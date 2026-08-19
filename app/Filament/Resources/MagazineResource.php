<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MagazineResource\Pages;
use App\Models\Magazine;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class MagazineResource extends Resource
{
    protected static ?string $model = Magazine::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected static string|\UnitEnum|null $navigationGroup = 'Publikasi & Buletin';

    protected static ?string $navigationLabel = 'Majalah Pedang Roh';

    protected static ?string $modelLabel = 'Majalah Pedang Roh';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Majalah')
                    ->schema([
                        Forms\Components\TextInput::make('edition_number')
                            ->label('Nomor Edisi (contoh: Edisi 140)')
                            ->required()
                            ->maxLength(50)
                            ->unique(Magazine::class, 'edition_number', ignoreRecord: true),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul Edisi Majalah')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('publish_date')
                            ->label('Tanggal Terbit')
                            ->default(now())
                            ->required(),

                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Foto Kover Majalah (Potret 3:4)')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('magazines/covers'),

                        Forms\Components\FileUpload::make('pdf_file')
                            ->label('Berkas PDF Majalah')
                            ->acceptedFileTypes(['application/pdf'])
                            ->disk('public')
                            ->visibility('public')
                            ->directory('magazines/pdfs')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi / Rangkuman Singkat')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Kover')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('edition_number')
                    ->label('Edisi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Majalah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publish_date')
                    ->label('Tanggal Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('publish_date', 'desc')
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
            'index' => Pages\ListMagazines::route('/'),
            'create' => Pages\CreateMagazine::route('/create'),
            'edit' => Pages\EditMagazine::route('/{record}/edit'),
        ];
    }
}
