<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=<?=$description?>>
    <link rel="icon" type="image/png" href="public/img/Logo-removebg-preview.png">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/layout_2.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <title><?= $title ?></title>
</head>
<body>

<div class="imageH">
    <img class="imgHead" src="public/img/OIP (1).jpg">
    <div class="texteH">
        <H1 class="titre">ChaiCharly</H1>
    </div>
</div>

<?php require_once "header.php"?>

    <main>
        <?= $content ?>
    </main>

    <?php require_once "footer.php"?>
    
</body>
</html>