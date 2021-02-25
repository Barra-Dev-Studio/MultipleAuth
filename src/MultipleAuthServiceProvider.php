<?php

/*
 * This file is part of the Multiple Auth package.
 *
 * (c) Khoerul Umam <id.khoerulumam@gmail.com>
 *
 */

namespace BarraDev\MultipleAuth;

use Illuminate\Support\ServiceProvider;
use BarraDev\MultipleAuth\MultipleAuthPublishCommand;

/**
 * Multiple Auth Service Provider
 */
class MultipleAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MultipleAuthPublishCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
