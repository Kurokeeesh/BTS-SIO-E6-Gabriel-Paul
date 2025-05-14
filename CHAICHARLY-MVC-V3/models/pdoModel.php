<?php

function setDB(){
    static $pdo;

    if($pdo === null){
        $pdo = new PDO("mysql:host=localhost; dbname=bdchaicharly","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;

}
