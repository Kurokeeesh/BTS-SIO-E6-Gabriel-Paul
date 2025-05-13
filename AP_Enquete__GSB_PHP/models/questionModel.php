<?php
function insererQuestion($pdo, $cle,  $cleQuestionnaire, $rang, $typeQ, $name, $text, $reponses, $default) {
    $stmt = $pdo->prepare("
        INSERT INTO Questions (
            cle, cle_questionnaire, rang, typeQ, name, text,
            reponse1, reponse2, reponse3, reponse4, reponse5, `defaut`
        )
        VALUES (
            :cle, :cle_questionnaire, :rang, :typeQ, :name, :text,
            :rep1, :rep2, :rep3, :rep4, :rep5, :defaut
        )
    ");

    $rep1 = $reponses[0];
    $rep2 = $reponses[1];
    $rep3 = $reponses[2];
    $rep4 = $reponses[3];
    $rep5 = $reponses[4];


    $stmt->bindParam(':cle', $cle);
    $stmt->bindParam(':cle_questionnaire', $cleQuestionnaire);
    $stmt->bindParam(':rang', $rang);
    $stmt->bindParam(':typeQ', $typeQ);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':text', $text);
    $stmt->bindParam(':rep1', $rep1);
    $stmt->bindParam(':rep2', $rep2);
    $stmt->bindParam(':rep3', $rep3);
    $stmt->bindParam(':rep4', $rep4);
    $stmt->bindParam(':rep5', $rep5);    
    $stmt->bindParam(':defaut', $defaultIndex);

    $stmt->execute();
}

function getQuestionsByCle($pdo, $cle) {
    $stmt = $pdo->prepare("SELECT * FROM Questions WHERE cle_questionnaire = :cle ORDER BY rang ASC");
    $stmt->bindParam(':cle', $cle);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

