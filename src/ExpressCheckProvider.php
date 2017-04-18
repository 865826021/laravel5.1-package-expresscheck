<?php

namespace Yuxiaoyang\ExpressCheck;

use Illuminate\Support\ServiceProvider;

class ExpressCheckProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('expresscheck',function(){
            return new ExpressCheck();
        });//app('expresscheck')
    }
}
