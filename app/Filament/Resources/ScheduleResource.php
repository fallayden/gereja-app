<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static string|\UnitEnum|null $navigationGroup = 'Profil & Informasi';

    protected static ?string $navigationLabel = 'Jadwal Ibadah';

    protected static ?string $modelLabel = 'Jadwal Ibadah';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Jadwal')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Kebaktian / Persekutuan')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('day')
                            ->label('Hari')
                            ->options([
                                'Minggu' => 'Minggu',
                                'Senin' => 'Senin',
                                'Selasa' => 'Selasa',
                                'Rabu' => 'Rabu',
                                'Kamis' => 'Kamis',
                                'Jumat' => 'Jumat',
                                'Sabtu' => 'Sabtu',
                            ])
                            ->required(),

                        Forms\Components\TimePicker::make('start_time')
                            ->label('Jam Mulai')
                            ->required(),

                        Forms\Components\TimePicker::make('end_time')
                            ->label('Jam Selesai')
                            ->required(),

                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi')
                            ->placeholder('Gedung Utama GBIA GRAMMATA'),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),

                        Forms\Components\TextInput::make('note')
                            ->label('Catatan Tambahan')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Ibadah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->label('Hari')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Mulai')
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('Selesai')
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->limit(30),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
