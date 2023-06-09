<?php

namespace Src\Modules\Auth\Application\Mapper;

use Illuminate\Http\Request;
use Src\Modules\Auth\Domain\Model\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Src\Modules\Auth\Domain\Model\ValueObjects\Name;
use Src\Modules\Auth\Domain\Model\ValueObjects\Email;
use Src\Modules\Auth\Domain\Model\ValueObjects\Password;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class UserMapper
{
    public static function fromRequest(Request $request, ?int $user_id = null): User
    {
        return new User(
            id: $user_id,
            name: new Name($request->string('name')),
            email: new Email($request->string('email')),
            password: new Password($request->string('password')),
        );
    }

    public static function fromEloquent(UserEloquentModel $userEloquent): User
    {
        return new User(
            id: $userEloquent->id,
            name: new Name($userEloquent->name),
            email: new Email($userEloquent->email),
            password: new Password($userEloquent->password),
        );
    }

    public static function fromAuth(Authenticatable $userEloquent): User
    {
        return new User(
            id: $userEloquent->id,
            name: new Name($userEloquent->name),
            email: new Email($userEloquent->email),
            password: new Password($userEloquent->password),
         );
    }

    public static function toEloquent(User $user): UserEloquentModel
    {
        $userEloquent = new UserEloquentModel();

        if ($user->id) {
            $userEloquent = UserEloquentModel::query()->findOrFail($user->id);
        }
        $userEloquent->name = $user->name;
        $userEloquent->email = $user->email;
        $userEloquent->email = $user->password;
        return $userEloquent;
    }
}