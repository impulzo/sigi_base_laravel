<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Impulzo\RestClientService\Libraries\Facade\RestClientFacade;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Mail', function () {
            return new \App\Libraries\Notifications\Mail(new RestClientFacade);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
