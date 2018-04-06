<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\ProjectRepositoryInterface',
            'App\Repositories\ProjectRepository'
        );

        $this->app->bind(
            'App\Repositories\EventsRepositoryInterface',
            'App\Repositories\EventsRepository'
        );

        $this->app->bind(
            'App\Repositories\RoleRepositoryInterface',
            'App\Repositories\RoleRepository'
        );
    }
}