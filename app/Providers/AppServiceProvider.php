<?php

namespace App\Providers;

use App\Services\Employee\Designer;
use App\Services\Employee\DutiesHandler;
use App\Services\Employee\EmployeeInterface;
use App\Services\Employee\Manager;
use App\Services\Employee\Programmer;
use App\Services\Employee\Tester;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\ArgvInput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->app->bind(EmployeeInterface::class, function ()
            {
                if (!empty($_SERVER[ 'argv' ])
                    && isset($_SERVER[ 'argv' ][ 2 ]) && isset($_SERVER[ 'argv' ][ 2 ])
                    && !in_array($_SERVER[ 'argv' ][ 1 ], [ 'company:employee', 'employee:can' ])) {
                    $param = $_SERVER[ 'argv' ][ 2 ];
                    if ($param == 'programmer') return new Programmer();
                    if ($param == 'tester') return new Tester();
                    if ($param == 'designer') return new Designer();
                    if ($param == 'manager') return new Manager();
                    throw new RuntimeException('Invalid arguments');
                }

                return new Manager();//default value when binding is not used
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
    }
}
