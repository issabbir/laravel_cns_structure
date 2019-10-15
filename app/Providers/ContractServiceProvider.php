<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Interface
use App\Contracts\CompanyInterface;
use App\Contracts\StoreInterface;
//Repositories
use App\Repositories\CompanyRepo;
use App\Repositories\StoreRepo;

class ContractServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->app->bind(CompanyInterface::class, CompanyRepo::class);
        $this->app->bind(StoreInterface::class, StoreRepo::class);
     }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}

