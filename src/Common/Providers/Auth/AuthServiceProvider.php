<?php

namespace Src\Common\Providers\Auth;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Blogs\Posts\Application\Policies\PostPolicy;
use Src\Modules\Auth\Application\Commands\RegisterUserCommand;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\PostEloquentModel;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories\RegisterRepository;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        PostEloquentModel::class => PostPolicy::class,
    ];
    
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
