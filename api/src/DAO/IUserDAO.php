<?php

namespace App\DAO;
use App\DTO\UserDTO;

interface IUserDAO {
    public static function insert(UserDTO $user): bool;
    public static function findByUsuario(UserDTO $user): bool;
}