<?php

require_once "controllers/pagesController.php";
require_once "controllers/questionnaireController.php";
require_once "controllers/questionController.php";
require_once "controllers/xmlController.php";
require_once "utilities.php";

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

        case "question":
            questionPage();
        break;

        case "traiter_questionnaire": // 💡 ici
            traiterQuestionnaire();
        break;

        case "traiter_questions":
            traiterQuestions();
        break;
        
        case "generer_xml":
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                genererXML(); // <- dans xmlController.php
            } else {
                genererXmlPage(); // <- afficher la page de choix
            }
        break;

        default:
        echo "Page inconnue.";
        break;
    }
}catch(Exception $e){
    echo "Erreur : " .$e->getMessage();
}