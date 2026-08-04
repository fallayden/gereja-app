<?php

namespace App\Filament\Resources\PastorProfileResource\Pages;

use App\Filament\Resources\PastorProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPastorProfile extends EditRecord
{
    protected static string $resource = PastorProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
