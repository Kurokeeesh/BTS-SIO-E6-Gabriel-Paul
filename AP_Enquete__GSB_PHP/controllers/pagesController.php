<?php
function homePage(){
    $datas_page=[
        "description" => "Page home ",
        "title" => "Accueil : Questionnaire",
        "view" => "views/saisir_questionnaire.php",
        "layout" =>"",
    ];
    drawPage($datas_page);
}

function questionPage(){
    $datas_page=[
        "description" => "Question",
        "title" => "Page : Question",
        "view" => "views/saisir_questions.php",
        "layout" =>"",
    ];
        drawPage($datas_page);
}

function genererXmlPage() {
    $datas_page = [
        "description" => "Générer le XML",
        "title" => "Exporter un questionnaire en XML",
        "view" => "views/xml.php",
        "layout" => ""
    ];
    drawPage($datas_page);
}

