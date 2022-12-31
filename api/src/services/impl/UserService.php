<?php

namespace App\services\impl;

use App\DTO\UserDTO;
use App\factories\UserFactory;
use App\services\IUserService;

class UserService implements IUserService {

    public static function find($usuario): bool {
        return false;
    }

    public static function insert(UserDTO $user): bool {
		return UserFactory::getDAO()::insert($user);
    }
}