<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\User; 
use App\Models\Items;
use App\Models\Categories;
use App\Notifications\LogCreatedNotification;
use App\Policies\ItemsPolicy;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification; // <-- Ganti dari Laravel ke Filament

class LogsObserver

{
    
}
