<?php

namespace Bui\Payment;

use Illuminate\Support\ServiceProvider;

class BuiPaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/buipayment.php', 'buipayment');

        $this->app->singleton('buipayment', function ($app) {
            return new BuiPayment();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/buipayment.php' => config_path('buipayment.php'),
        ], 'config');
    }
}
