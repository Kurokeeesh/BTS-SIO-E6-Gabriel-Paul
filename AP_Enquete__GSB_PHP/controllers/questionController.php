<?php
require_once "models/questionModel.php";

function traiterQuestions() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (
            isset($_POST['text'], $_POST['cle']) &&
            trim($_POST['text']) !== '' &&
            trim($_POST['cle']) !== ''
        ) {
            $pdo = setDB();

            $cleQuestionnaire = $_POST['cle'];
            $heure = date("His"); // HeureMinuteSeconde
            $cleQuestion = $cleQuestionnaire . "_" . $heure;

            $rang = $_POST["rang"] ?? $heure;
            $typeQ = $_POST["type"] ?? "TXT";
            $name = $_POST["name"] ?? "Q1";
            $text = htmlspecialchars(trim($_POST["text"]));

            // Correction ici : on récupère juste l'index de la réponse par défaut
            $defaultIndex = isset($_POST["default"]) ? intval($_POST["default"]) : -1;

            // Réponses : découpe ligne par ligne, max 5
            $reponses = explode("\n", trim($_POST["reponses"] ?? ""));
            $reponses = array_map('trim', $reponses);
            $reponses = array_slice($reponses, 0, 5);
            while (count($reponses) < 5) {
                $reponses[] = "";
            }

            $defaultIndex = isset($_POST["defaut"]) ? intval($_POST["defaut"]) : -1;

            insererQuestion($pdo, $cleQuestion, $cleQuestionnaire, $rang, $typeQ, $name, $text, $reponses, $defaultIndex);

            header("Location: index.php?page=question");
            exit;
        } else {
            echo "<p style='color:red;'>Erreur : l’intitulé et la clé du questionnaire sont obligatoires.</p>";
            echo "<a href='index.php?page=question'>Retour au formulaire</a>";
        }
    } else {
        echo "<p>Accès non autorisé.</p>";
    }
}
