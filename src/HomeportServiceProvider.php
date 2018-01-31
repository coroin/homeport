<?php

namespace Homeport;

use Illuminate\Support\ServiceProvider;

class HomeportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            HOMEPORT_PATH.'/scripts/homeport' => base_path('homeport'),
        ]);
    }

    public function register()
    {
        if (! defined('HOMEPORT_PATH')) {
            define('HOMEPORT_PATH', realpath(__DIR__.'/../'));
        }
    }

    public function publish()
    {
        @copy(HOMEPORT_PATH.'/scripts/homeport', base_path('homeport'));
    }
}
