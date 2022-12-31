<?php

namespace App\DAO\impl;
use App\db\orm\DB;
use App\DTO\UserDTO;
use App\DAO\IUserDAO;

class UserDAO implements IUserDAO {
    public static function insert(UserDTO $user): bool {
        return DB::table('user')->insert(['usuario' => $user->usuario(), 
        'password' => $user->password()]);;
    }
    public static function findByUsuario(UserDTO $user): bool {
        return false;
    }
}