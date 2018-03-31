<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Config;
use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHomeConfig();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function loadHomeConfig()
    {
        $configs = Cache::remember(config('define.cache.home_configs.key'), config('define.cache.home_configs.minutes'), function () {
            return Config::orderBy('created_at', 'desc')->get();
        });

        $map = [];
        foreach ($configs as $config)
        {
            $map[$config->path] = $config->value;
        }

        config($map);
    }
}
