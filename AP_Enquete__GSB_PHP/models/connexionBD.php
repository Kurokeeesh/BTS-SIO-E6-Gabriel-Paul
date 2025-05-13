<?php

function setDB(){
    static $pdo;

    if($pdo === null){
        $pdo = new PDO("mysql:host=localhost; dbname=bdGsb","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;

}