<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class RegisterRepository extends BaseRepository implements IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param array $data
     * @return void
     */
    public function registerAUser(array $data): void
    {
        try {
            $user = User::create([
                'name' => $this->capitalized($data['name']),
                'email' => $this->lower($data['email']),
                'password' => $this->stringHash($data['password']),
            ]);

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
