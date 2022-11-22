<?php

namespace APP\DAO\impl;

class ActoresDAO implements IActoresDAO{

    
    public static function create(ActorDTO $actor): int {
        return 1;
    }
    public static function read(): array {
        $result = array();        
        $db_data = DB::table('actores')->select('*')->get();
        foreach ($db_data as $actor) {
            $result[] = new ActorDTO(
            $actor->id, 
            $actor->nombre, 
            $actor->anyo, 
            $actor->pais
        );            
        }
        return $result;
    }
    public static function findById(int $id): ActorDTO {
        return 1;
    }
    public static function update(int $id, ActorDTO $actor): int {
        return 1;
    }
    public static function delete(int $id): int {
        return 1;
    }
    
}