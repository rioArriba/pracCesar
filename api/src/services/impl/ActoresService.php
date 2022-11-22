<?php
namespace App\services\impl;

use App\factories\ActoresFactory;
use App\services\IActoresService;

class ActoresService implements IActoresService {

    public static function read() {
        return ActoresFactory::getDAO()::read();
    }
    function find() {
        return true;
    }
    function insert() {
        return true;
    }
    function delete() {
        return true;
    }
    function update(){
        return true;
    }
}