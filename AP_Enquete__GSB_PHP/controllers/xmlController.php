<?php
function genererXML() {
    require_once("models/questionnaireModel.php");
    require_once("models/questionModel.php");
    require_once("models/connexionBD.php");

    if (isset($_POST['cle']) && $_POST['cle'] !== '') {
        $pdo = setDB();
        $cle = $_POST['cle'];

        $questionnaire = getQuestionnaireByCle($pdo, $cle);
        $questions = getQuestionsByCle($pdo, $cle);

        if (!$questionnaire) {
            die("Questionnaire introuvable.");
        }

        // Création du XML
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><questionnaire></questionnaire>');
        $xml->addAttribute('cle', $questionnaire['cle']);
        $xml->addAttribute('name', $questionnaire['name']);
        $xml->addAttribute('displayName', $questionnaire['displayName']);

        $xml->addChild('description', $questionnaire['description']);

        $questions = getQuestionsByCle($pdo, $questionnaire['cle']);

        foreach ($questions as $q) {
            $questionXML = $xml->addChild('question');
            $questionXML->addAttribute('type', $q['typeQ']);
            $questionXML->addAttribute('name', $q['name']);
            $questionXML->addChild('text', $q['text']);
        
            if ($q['typeQ'] === 'text') {
                $questionXML->addChild('defaultresponse', ''); // Ajoute ce que tu veux
                $questionXML->addChild('maxCharacters', '75'); // idem
            } else {
                $reponses = $questionXML->addChild('reponses');
        
                for ($i = 1; $i <= 5; $i++) {
                    $rep = $q["reponse$i"];
                    if (!empty($rep)) {
                        $isDefault = (isset($q['defaut']) && intval($q['defaut']) === $i) ? "true" : "false";
                        $repXML = $reponses->addChild('reponse', $rep);
                        $repXML->addAttribute('default', $isDefault);
                    }
                }
            }
        }
        
        

        // Envoi du fichier XML
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="questionnaire_' . $cle . '.xml"');
        echo $xml->asXML();
        exit;
    } else {
        echo "Aucune clé de questionnaire sélectionnée.";
    }
}
?>