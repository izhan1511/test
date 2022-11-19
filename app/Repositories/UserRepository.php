<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function checkUserName($name)
    {
        $user = User::all();
        foreach ($user as $value) {
            if ($value->name == $name) {
                return false;
            }
        }
        return true;
    }

    public function createUser(array $user)
    {
        return User::create($user);
    }
}
