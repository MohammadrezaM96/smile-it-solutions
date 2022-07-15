<?php

namespace App\Providers;

use App\Repositories\Eloquent\BankAccountRepository;
use App\Repositories\Eloquent\TransferRepository;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;
use App\Repositories\Interfaces\TransferRepositoryInterface;
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
        $this->app->bind(TransferRepositoryInterface::class, TransferRepository::class);
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
