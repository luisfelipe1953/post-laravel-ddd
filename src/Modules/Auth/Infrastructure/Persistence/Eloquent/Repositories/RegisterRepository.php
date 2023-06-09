<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Src\Modules\Auth\Domain\Model\User;
use Src\Modules\Auth\Application\Mapper\UserMapper;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;

class RegisterRepository extends BaseRepository implements IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param array $data
     * @return void
     */
    public function registerAUser(User $user): void
    {
        try {
            $userEloquent = UserMapper::toEloquent($user);
            
            $userEloquent->save();

            $user = UserMapper::fromEloquent($userEloquent);

            $this->eventRegisteredUser($user);

            $this->authenticate($user);

        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    /**
     * Crea un evento de un usuario nuevo se registró
     *
     * @param User $user
     * @return void
     */
    private function eventRegisteredUser(User $user): void
    {
        event(new Registered($user));
    }

    /**
     * Logea al usuario recientemente registrado
     *
     * @param User $user
     * @return void
     */
    private function authenticate(User $user): void
    {
        Auth::login($user);
    }
}
