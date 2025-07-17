<?php

namespace App\Filament\Resources\BannerProdiResource\Pages;

use App\Filament\Resources\BannerProdiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBannerProdi extends EditRecord
{
    protected static string $resource = BannerProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
