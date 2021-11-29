<?php

namespace Iamhabbeboy\Subscriber;

use Illuminate\Support\ServiceProvider;
use Iamhabbeboy\Subscriber\Subscriber;

class SubscriberServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-subscriber.php', 'laravel-subscriber');

        $this->app->bind('subscriber', function () {
            $service = '\Iamhabbeboy\Subscriber\Contracts\Services\\' . config('laravel-subscriber.service');
            return new Subscriber(new $service);
        });
    }

    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-subscriber.php' => config_path('laravel-subscriber.php'),
        ], 'config');
    }
}
