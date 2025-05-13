<?php
function insererQuestionnaire($pdo, $name, $displayName, $description) {
    //Générer la clé manuellement
    $cle = date("Ymd_His");

    //Prépare et exécute l'INSERT
    $stmt = $pdo->prepare("
        INSERT INTO questionnaire (cle, name, displayName, description)
        VALUES (:cle, :name, :displayName, :description)
    ");
    $stmt->bindParam(':cle', $cle);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':displayName', $displayName);
    $stmt->bindParam(':description', $description);
    $stmt->execute();

    // 3. Retourne la clé générée
    return $cle;
}

function getQuestionnaireByCle($pdo, $cle) {
    $stmt = $pdo->prepare("SELECT * FROM questionnaire WHERE cle = :cle");
    $stmt->bindParam(':cle', $cle);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



?>