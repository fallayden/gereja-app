<?php

namespace App\Filament\Resources\BranchChurchResource\Pages;

use App\Filament\Resources\BranchChurchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBranchChurch extends EditRecord
{
    protected static string $resource = BranchChurchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
