<?php

namespace App\Filament\Resources\ProspekKarirResource\Pages;

use App\Filament\Resources\ProspekKarirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProspekKarir extends EditRecord
{
    protected static string $resource = ProspekKarirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
