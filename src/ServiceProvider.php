<?php

namespace Skadimoolam\CrudGenerator;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->commands([
            Commands\CrudMake::class,
        ]);
    }

    public function boot()
    {
    }
}
