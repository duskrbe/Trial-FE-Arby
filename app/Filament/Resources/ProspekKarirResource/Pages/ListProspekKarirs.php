<?php

namespace App\Filament\Resources\ProspekKarirResource\Pages;

use App\Filament\Resources\ProspekKarirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProspekKarirs extends ListRecords
{
    protected static string $resource = ProspekKarirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
