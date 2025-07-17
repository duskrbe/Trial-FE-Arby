<?php

namespace App\Filament\Resources\AkreditasiResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AkreditasiResource;
use Illuminate\Validation\ValidationException;

class CreateAkreditasi extends CreateRecord
{
    protected static string $resource = AkreditasiResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $existingAkreditasi = static::getModel()::where('prodi_id', $data['prodi_id'])->first();

        if ($existingAkreditasi) {
            $editUrl = static::getResource()::getUrl('edit', ['record' => $existingAkreditasi->id]);

            Notification::make()
                ->title('Akreditasi sudah ada')
                ->body('Akreditasi untuk program studi ini sudah ada. Silahkan edit data yang sudah ada')
                ->warning()
                ->actions([
                    Action::make('edit')
                        ->label('Edit Akreditasi Ini')
                        ->url($editUrl)
                        ->button(),
                ])
                ->persistent()
                ->send();
             throw ValidationException::withMessages([
                'prodi_id' => 'Akreditasi untuk program studi ini sudah ada. Silakan edit data yang sudah ada.',
            ]);
        }
        return parent::handleRecordCreation($data);
    }
}
