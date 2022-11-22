<?php
namespace App\services;

interface IActoresService {

    public static function read();
    function find();
    function insert();
    function delete();
    function update();
}