<?php

namespace App\Providers;

use App\Services\PaymentProviders\interfaces\PaymentProviderContract;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentProviderContract::class,StripePaymentProvider::class);

        

        $this->app->bind('stripe-provider', fn($app)=>$app->make(StripePaymentProvider::class));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
