<?php

namespace App\Traits;

use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            $model->logActivity('CREATE', 'Record created');
        });

        static::updated(function ($model) {
            $changes = $model->getChanges();

            // Kolom yang selalu berubah secara otomatis oleh Laravel dan biasanya tidak perlu dilog sebagai 'UPDATE' signifikan.
            $ignoredColumns = ['updated_at', 'created_at'];

            // === FOKUS UTAMA PERBAIKAN DI SINI ===
            // Deteksi jika ini adalah 'updated' event yang disebabkan oleh 'restore'.
            // Ini terjadi jika hanya 'deleted_at' yang berubah menjadi NULL, dan sebelumnya tidak NULL.
            if (
                array_key_exists('deleted_at', $changes) &&
                is_null($changes['deleted_at']) &&
                !is_null($model->getOriginal('deleted_at')) &&
                count(array_diff_key($changes, array_flip($ignoredColumns))) === 1 // Cek sisa perubahan setelah mengabaikan kolom otomatis
            ) {
                // Jika kondisi di atas terpenuhi, ini adalah 'updated' event yang disebabkan oleh 'restore'.
                // Abaikan logging 'updated' karena 'restored' event sudah menangani lognya.
                return;
            }

            // Filter perubahan untuk mengabaikan kolom-kolom otomatis seperti updated_at.
            $significantChanges = array_diff_key($changes, array_flip($ignoredColumns));

            // Hanya log 'UPDATE' jika ada perubahan signifikan yang tersisa setelah filter.
            if (!empty($significantChanges)) {
                $model->logActivity('UPDATE', 'Record updated', $significantChanges);
            }
            // Jika tidak ada perubahan signifikan (hanya updated_at/created_at yang berubah), maka tidak ada log 'UPDATE'.
        });

        static::deleting(function ($model) {
            // Logika ini tetap sama
        });

        static::deleted(function ($model) {
            if ($model->usesSoftDeletes() && $model->isSoftDeleted()) {
                $action = 'SOFT_DELETE';
                $description = 'Record soft deleted';
            } else {
                $action = 'DELETE';
                $description = 'Record hard deleted';
            }
            $model->logActivity($action, $description);
        });

        static::restored(function ($model) {
            if ($model->usesSoftDeletes()) {
                $model->logActivity('RESTORE', 'Record restored');
            }
        });
    }

    public function logActivity(string $action, string $baseDescription, array $data = [])
    {
        $userId = Auth::check() ? Auth::id() : null;

        Logs::create([
            'user_id'    => $userId,
            'action'     => $action,
            'table_name' => $this->getTable(),
            'record_id'  => $this->id,
            'description' => $this->formatReadableDescription($action, $baseDescription, $data)
        ]);
    }

    protected function formatReadableDescription(string $action, string $baseDescription, array $data): string
    {
        $details = [];

        switch ($action) {
            case 'CREATE':
                $details[] = "ID: {$this->id}";
                break;
            case 'UPDATE':
                if (empty($data)) { // $data di sini sudah filtered dari logActivity
                    $details[] = "No significant changes detected.";
                } else {
                    $changedFields = array_keys($data);
                    $details[] = "Fields changed: " . implode(', ', $changedFields);
                }
                break;
            case 'DELETE':
            case 'SOFT_DELETE':
            case 'RESTORE':
                break;
            default:
                $details[] = "Additional data: " . implode(', ', array_keys($data));
                break;
        }

        if (!empty($details)) {
            return $baseDescription . ' (' . implode('; ', $details) . ')';
        }

        return $baseDescription;
    }

    protected function usesSoftDeletes(): bool
    {
        return in_array(SoftDeletes::class, class_uses($this));
    }

    protected function isSoftDeleted(): bool
    {
        // Check if the model is using SoftDeletes trait
        if (!$this->usesSoftDeletes()) {
            return false;
        }

        // If the model is being force deleted, it's not considered soft deleted
        if (method_exists($this, 'isForceDeleting') && $this->isForceDeleting()) {
            return false;
        }

        return $this->trashed();
    }

    // Remove the isForceDeleting method since it's already provided by SoftDeletes trait
}