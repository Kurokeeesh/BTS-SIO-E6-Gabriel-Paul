<?php

require_once("models/questionnaireModel.php");
require_once("models/connexionBD.php");

function traiterQuestionnaire() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['name']) && !empty($_POST['displayName']) && !empty($_POST['description'])) {

            $pdo = setDB();
            $name = htmlspecialchars(trim($_POST['name']));
            $displayName = htmlspecialchars(trim($_POST['displayName']));
            $description = htmlspecialchars(trim($_POST['description']));

            $newId = insererQuestionnaire($pdo, $name, $displayName, $description);

            session_start();
            $_SESSION["displayName"] = $displayName;
            $_SESSION["cle"] = $newId;

            header("Location: question");
            exit;
        } else {
            echo "<p style='color:red;'>Erreur : tous les champs doivent être remplis.</p>";
            echo "<a href='saisir_questionnaire'>Retour au formulaire</a>";
        }
    } else {
        echo "<p>Accès non autorisé.</p>";
    }
}
?>