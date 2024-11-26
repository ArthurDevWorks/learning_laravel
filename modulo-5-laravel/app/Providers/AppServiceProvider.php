<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\CieloController;
use App\Http\Controllers\StripeController;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\StripePaymentProvider;
use App\Services\PaymentProviders\interfaces\PaymentProviderContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(StripeController::class)
            ->needs(PaymentProviderContract::class)
            ->give(StripePaymentProvider::class);

        $this->app->when(CieloController::class)
            ->needs(PaymentProviderContract::class)
            ->give(CieloPaymentProvider::class);

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
