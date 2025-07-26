<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logs extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'logs';

    protected $fillable = [
        'user_id',
        'action',
        'table_name',
        'record_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createLog(
        string $action,
        string $table_name,
        int $recordId,
        string $description,
        ?int $userId = null,
    ): Logs {
        return self::create([
            'user_id' => $userId,
            'action' => $action,
            'table_name' => $table_name,
            'record_id' => $recordId,
            'description' => $description,
        ]);
    }
}
