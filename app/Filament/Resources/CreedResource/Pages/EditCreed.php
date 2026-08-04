<?php

namespace App\Filament\Resources\CreedResource\Pages;

use App\Filament\Resources\CreedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreed extends EditRecord
{
    protected static string $resource = CreedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
