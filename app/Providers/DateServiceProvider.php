<?php

namespace App\Providers;

use App\Services\DateService;
use App\Services\DateServiceInterface;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            DateServiceInterface::class,
            DateService::class
        );
    }
}
