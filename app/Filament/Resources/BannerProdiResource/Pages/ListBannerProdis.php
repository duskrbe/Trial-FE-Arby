<?php

namespace App\Filament\Resources\BannerProdiResource\Pages;

use App\Filament\Resources\BannerProdiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBannerProdis extends ListRecords
{
    protected static string $resource = BannerProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
