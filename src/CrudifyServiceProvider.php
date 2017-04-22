<?php

namespace Crudify;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

use App\Http\Cruds\User;

class CrudifyServiceProvider extends ServiceProvider
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
        (new User());
    }
}
