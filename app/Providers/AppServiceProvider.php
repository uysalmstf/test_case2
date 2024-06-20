<?php

namespace App\Providers;

use App\Services\Interfaces\IDBInterface;
use App\Services\Repositories\IntegrationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IDBInterface::class, IntegrationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
