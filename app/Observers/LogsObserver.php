<?php

namespace App\Observers;

use App\Models\Logs;
use Filament\Notifications\Notification; // <-- Ganti dari Laravel ke Filament

class LogsObserver

{
    public function created(Logs $log): void
    {
        $user = auth()->user();
        if (!$user) return;

        // Map aksi ke label
        $actionLabels = [
            'CREATE'      => 'membuat',
            'UPDATE'      => 'mengupdate',
            'SOFT_DELETE' => 'menghapus',
            'RESTORE'     => 'merestore',
            'DELETE'      => 'menghapus permanen',
        ];

        // Map tabel ke label Indonesia
        $tableLabels = [
            'akreditasi'     => 'akreditasi',
            'alumni'         => 'alumni',
            'banner_prodi'   => 'banner prodi',
            'dosen'          => 'dosen',
            'fasilitas'      => 'fasilitas',
            'kurikulum'      => 'kurikulum',
            'mata_kuliah'    => 'mata kuliah',
            'mitra'          => 'mitra',
            'penelitian'     => 'penelitian',
            'prestasi'       => 'prestasi',
            'program_studi'  => 'program studi',
            'prospek_karir'  => 'prospek karir',
            'spotlight'      => 'spotlight',
        ];

        // Buat teks perubahan jika UPDATE
        $fieldChanges = '';
        if ($log->action === 'UPDATE' && is_array($log->changes)) {
            $filtered = array_filter(
                $log->changes,
                fn($v, $k) => !in_array($k, ['updated_at', 'created_at']),
                ARRAY_FILTER_USE_BOTH
            );
            if (!empty($filtered)) {
                $fieldList = implode(', ', array_keys($filtered));
                $fieldChanges = " di kolom $fieldList";
            }
        }

        // Label final
        $label = $actionLabels[$log->action] ?? strtolower($log->action);
        $tableLabel = $tableLabels[$log->table_name] ?? $log->table_name;

        // Buat notifikasi
        $notification = Notification::make()
            ->title($log->user->name)
            ->body("Telah $label data pada tabel $tableLabel$fieldChanges. Tanggal $log->created_at")
            ->success()
            ->actions([
                \Filament\Notifications\Actions\Action::make('Lihat')
                    ->button()
                    ->url(self::generateViewUrl($log), shouldOpenInNewTab: true)
            ]);

        // Kirim hanya ke user yang sedang login (pembuat log)
        $notification->sendToDatabase($user);
    }

    protected static function generateViewUrl(Logs $log): ?string
    {
        $resourceMap = [
            'akreditasi'  => \App\Filament\Resources\AkreditasiResource::class,
            'alumni'    => \App\Filament\Resources\AlumniResource::class,
            'banner_prodi' => \App\Filament\Resources\BannerProdiResource::class,
            'dosen'    => \App\Filament\Resources\DosenResource::class,
            'fasilitas' => \App\Filament\Resources\FasilitasResource::class ,
            'kurikulum' => \App\Filament\Resources\KurikulumResource::class,
            'mata_kuliah' => \App\Filament\Resources\MataKuliahResource::class,
            'mitra' => \App\Filament\Resources\MitraResource::class,
            'penelitian' => \App\Filament\Resources\PenelitianResource::class,
            'prestasi' => \App\Filament\Resources\PrestasiResource::class,
            'program_studi' => \App\Filament\Resources\ProgramStudiResource::class,
            'prospek_karir' => \App\Filament\Resources\ProspekKarirResource::class,
            'spotlight' => \App\Filament\Resources\SpotlightResource::class,
        ];

        $resourceClass = $resourceMap[$log->table_name] ?? null;

        return $resourceClass && method_exists($resourceClass, 'getUrl')
            ? $resourceClass::getUrl('view', ['record' => $log->record_id], shouldOpenInNewTab: true)
            : null;
    }
}
