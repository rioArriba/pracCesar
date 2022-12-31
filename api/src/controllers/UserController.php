<?php
namespace App\controllers;

use App\DTO\UserDTO;
use App\factories\UserFactory;
use App\response\HTTPResponse;
use App\services\IUserService;

class UserController {

    private IUserService $service;

	function __construct() {
        $this->service = UserFactory::getService();
	}

    public function insert() {
        $json = file_get_contents('php://input'); 
        $data = json_decode($json);
        try {
            if(!isset($data->usuario) || !isset($data->password)) {
                throw new \Throwable();
            }        
            $datosSanitizados = $this->comprobarDatos($data);
            $datosEncriptados = $this->passwordHash($datosSanitizados);
            if(filter_var($datosEncriptados->usuario, FILTER_VALIDATE_EMAIL)) {
                $user =  new UserDTO(null, $datosEncriptados->usuario, $datosEncriptados->password);
                try {
                    UserFactory::getService()::insert($user);
                    HTTPResponse::json(201, "Usuario creado");
                }catch(\Exception $e) {
                    HTTPResponse::json($e->getCode(), "El email ya esta registrado");
                }
            } else {
                HTTPResponse::json(400, "Email no es valido.");  
            }
        } catch (\Throwable $e) {
            HTTPResponse::json(400, "Informacion incompleta.");        
        }
    }

     public function comprobarDatos($data) {
        $data->usuario = strip_tags($data->usuario);
        $data->password = strip_tags($data->password);
        return $data;
     }

     public function passwordHash($datosSanitizados) {
        $datosSanitizados->password = password_hash($datosSanitizados->password, PASSWORD_DEFAULT, ['cost' => 10]);
        return $datosSanitizados;
    }
}