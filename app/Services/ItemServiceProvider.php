<?php

namespace App\Services;

use App\Services\Impl\ItemServiceImpl;
use Illuminate\Support\ServiceProvider;

class ItemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(ItemService::class, ItemServiceImpl::class);
    }
}
