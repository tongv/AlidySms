<?php

namespace LaraMall\AlidySms;

use Illuminate\Support\ServiceProvider;

class AlidySmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        //发布配置文件
        $this->publishes([
            __DIR__.'/config/sms.php' => config_path('sms.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/sms.php', 'sms'
        );
        $this->app->bind('sms','LaraMall\AlidySms\Sms');
    }
}
