<?php

namespace Src\Common\Providers\Auth;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Application\Commands\RegisterUserCommand;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories\RegisterRepository;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(RegisterUserCommand::class)
            ->needs(IRegisterRepository::class)
            ->give(RegisterRepository::class);
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
