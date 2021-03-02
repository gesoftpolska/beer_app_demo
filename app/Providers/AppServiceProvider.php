<?php

namespace App\Providers;

use App\Http\Interfaces\BeerInterface;
use App\Repositories\BeerRepository;
use Illuminate\Support\Facades\App;
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
        if( App::environment('local')){
            $this->app->bind(BeerInterface::class, function () {
                return new BeerRepository();
            });
        }else{
            $this->app->bind(BeerInterface::class, function () {
                return new BeerRepository();
            });
        }

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
