<?php

require_once "controllers/pagesController.php";
require_once "controllers/utilities.php";

try{

    if (empty($_GET['page'])){
        $page = "home";
    }else{
        $path = explode ("/", filter_var($_GET["page"],FILTER_SANITIZE_URL));
        $page = $path[0];
    }

    switch ($page){
        case "home":
            homePage();
        break;

        case "vins":
            vinsPage();
        break;

        case "tarifs":
            tarifsPage();
        break;

        /*case "connexion":
            cnxPage();
        break;*/

        case "administrateur":
            cnxPage();
        break;

        case "Moderation":
            adminPage();
        break;

        case "ajouterProduit":
            ajouterProduitPage();
            break;

        case "Logout":
            logoutPage();
            break;

        case "test":
            testPage();
        break;

        default:
            throw new Exception("La page n'existe pas !");
    }
}catch(Exception $e){
    echo "Erreur : " .$e->getMessage();
}