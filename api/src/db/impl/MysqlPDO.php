<?php

namespace App\db\impl;

use PDO;
use PDOException;
use App\db\IPDOConnection;

class MysqlPDO implements IPDOConnection {

        public static function connect(): PDO{
            try {                
                $pdo = new PDO('mysql:host=localhost;dbname=movies', 'rio', '1micro');
                $pdo->exec("set names utf8");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException("Error al conectar con la bbdd",500);
            }
            return $pdo;
        }
}
