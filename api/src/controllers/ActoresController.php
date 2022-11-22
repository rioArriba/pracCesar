<?php
namespace App\controllers;

use App\response\HTTPResponse;
use App\factories\ActoresFactory;
use App\services\IActoresService;

class ActoresController {

    private IActoresService $service;

    function __constructor() {
        $this->service = ActoresFactory::getService();
    }

    function all() {
        try {
            HTTPResponse::json(200, ActoresFactory::getService()::read());
        } catch(\PDOException $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }  
    }

    function find($id) {
        
    }

    function insert() {
        
    }

    function delete($id) {
        
    }

    function update($id) {
        
    }
}