<?php

use App\Services\ItemServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Services\ItemServiceProvider::class,
    ItemServiceProvider::class,
];
