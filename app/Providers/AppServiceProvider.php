<?php

namespace App\Providers;

use App\Interfaces\WhatsAppRepositoryInterface;
use App\Repositories\WhatsAppRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            WhatsAppRepositoryInterface::class,
            WhatsAppRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
