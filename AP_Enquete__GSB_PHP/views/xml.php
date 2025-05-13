<?php
require_once "models/connexionBD.php";

$pdo = setDB();

// On récupère tous les questionnaires pour les afficher dans la liste déroulante
$stmt = $pdo->query("SELECT cle, name FROM questionnaire ORDER BY cle DESC");
$questionnaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="/Public/xml.css">
<h2>📄 Générer un fichier XML</h2>

<form method="POST" action="generer_xml">
    <label for="cle">Choisir un questionnaire :</label>
    <select name="cle" id="cle" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach ($questionnaires as $q): ?>
            <option value="<?= htmlspecialchars($q['cle']) ?>">
                <?= htmlspecialchars($q['name']) ?> (<?= $q['cle'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <input type="submit" value="Créer le fichier XML">
    <a href="home" class="button">Questionnaire</a>
</form>
