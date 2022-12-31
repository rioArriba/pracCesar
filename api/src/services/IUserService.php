<?php

namespace App\services;
use App\DTO\UserDTO;

interface IUserService {
    public static function find($usuario): bool;
    public static function insert(UserDTO $user): bool;
}