<?php

namespace App\Providers;

use App\Repositories\Eloquent\BankAccountRepository;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BankAccountRepositoryInterface::class, BankAccountRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
