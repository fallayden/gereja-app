<?php

namespace App\Filament\Resources\BranchChurchResource\Pages;

use App\Filament\Resources\BranchChurchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBranchChurches extends ListRecords
{
    protected static string $resource = BranchChurchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
