<?php

 namespace App\factories; 
 
use APP\DAO\impl\ActoresDAO;
use App\services\impl\ActoresService;

 class ActoresFactory {

    public static function getService() {
        return new ActoresService();
    }

    public static function getDAO() {
        return new ActoresDAO();
    }
 }