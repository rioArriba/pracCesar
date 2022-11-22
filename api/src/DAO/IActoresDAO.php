<?php
namespace App\DAO;

interface IActoresDAO {    

    public static function create(ActoresDTO $actor): int;
    public static function read(): array;
    public static function findById(int $id): ActorDTO;
    public static function update(int $id, ActorDTO $actor): int;
    public static function delete(int $id): int;

}