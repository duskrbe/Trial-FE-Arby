<?php

namespace App\Filament\Resources\BannerProdiResource\Pages;

use App\Filament\Resources\BannerProdiResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class CreateBannerProdi extends CreateRecord
{
    protected static string $resource = BannerProdiResource::class;

     protected function handleRecordCreation(array $data): Model
    {
        $totalBanner = static::getModel()::count();

        if ($totalBanner >= 2) {
            Notification::make()
                ->title('Maksimal Banner Tercapai')
                ->body('Hanya bisa memiliki maksimal 2 banner per prodi. Silakan hapus banner lama jika ingin menambah.')
                ->warning()
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'limit' => 'Maksimal jumlah banner sudah tercapai (2 banner).',
            ]);
        }

        return parent::handleRecordCreation($data);
    }
}
