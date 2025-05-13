<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=<?=$description?>>
    <link rel="icon" type="image/png" href="public/img/Logo-removebg-preview.png">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/cnx.css">
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <title><?= $title ?></title>
</head>
<body>

<?php require_once "header.php"?>

    <main>
        <?= $content ?>
    </main>

    <?php require_once "footer.php"?>
    
</body>
</html>