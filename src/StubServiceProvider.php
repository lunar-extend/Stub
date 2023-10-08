<?php

namespace LunarExtend\Stub;

use Illuminate\Support\ServiceProvider;
use LunarExtend\Stub\Managers\StubManager;

class StubServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton('lunar-extend:stub', function ($app) {
            return $app->make(StubManager::class);
        });
    }
}
