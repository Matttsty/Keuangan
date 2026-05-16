<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route; // <--- ADD THIS LINE
use Illuminate\Support\Facades\URL; // <--- ADD THIS LINE

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/vendor/livewire/livewire.js', $handle);
        });
        if (config('app.env') === 'local') {
            URL::forceScheme('http');
        }
    }
}