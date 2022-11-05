<?php
namespace App\controllers;

use App\DTO\MovieDTO;
use App\response\HTTPResponse;
use App\factories\MoviesFactory;
use App\services\IMoviesService;

class MoviesController {

    private IMoviesService $service;

	function __construct() {
        $this->service = MoviesFactory::getService();
	}

    public function all(){
        try {
            HTTPResponse::json(200, MoviesFactory::getService()::all());
        } catch(\PDOException $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }       
    }

    public function find($id){
        try {
            HTTPResponse::json(200, MoviesFactory::getService()::find($id));
            //echo json_encode($this->service->find($id));
        } catch (\Throwable $th) {
            HTTPResponse::json(404, $th->getMessage());
            //echo json_encode($th->getMessage());
        }
    }

    public function insert() {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            if($data['titulo'] && $data['anyo'] && $data['duracion']) {
                echo "yoooouu";
                $movie = new MovieDTO(null, $data['titulo'], $data['anyo'], $data['duracion']);
            } else {                
                throw new \Exception("Faltan campos de la pelicula sin rellenar");
            }
            MoviesFactory::getService()::insert($movie);
            HTTPResponse::json(201, "Recurso creado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }

    public function update($id) {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            if($data['titulo'] && $data['anyo'] && $data['duracion']) {
                $movie = new MovieDTO(null, $data['titulo'], $data['anyo'], $data['duracion']);
            } else {
                throw new \Exception("Faltan campos de la pelicula sin rellenar");

            }
            MoviesFactory::getService()::update($id,$movie);
            HTTPResponse::json(201, "Recurso actualizado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }

    public function delete($id){
        try {
            HTTPResponse::json(200, MoviesFactory::getService()::delete($id));
            //echo json_encode($this->service->find($id));
        } catch (\Throwable $th) {
            HTTPResponse::json(404, $th->getMessage());
            //echo json_encode($th->getMessage());
        }
    }
}