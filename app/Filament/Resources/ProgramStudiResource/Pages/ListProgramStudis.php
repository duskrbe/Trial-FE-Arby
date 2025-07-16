<?php

namespace App\Filament\Resources\ProgramStudiResource\Pages;

use App\Filament\Resources\ProgramStudiResource;
use App\Models\ProgramStudi;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListProgramStudis extends ListRecords
{
    protected static string $resource = ProgramStudiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
