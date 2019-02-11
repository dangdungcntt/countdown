<?php

namespace App\Providers;

use App\Http\Services\Contracts\TemplateServiceContract;
use App\Http\Services\TemplateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TemplateServiceContract::class, TemplateService::class);
    }
}
