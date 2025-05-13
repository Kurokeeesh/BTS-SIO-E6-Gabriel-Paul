<?php
require_once "models/produitsModel.php";



/*function testPage(){

    $donnees_recup = [
        "name"=>"jhon",
        "lastname"=>"doe",
        "age"=>28,
    ];

    $datas_page=[
    "description" => "Page de test du site",
    "title" => "Page de test",
    "view" => "views/pages/testPage.php",
    "layout" =>"views/components/layout.php",
    "datas_recep" => $donnees_recup,
    ];
    drawPage($datas_page);
}*/

function homePage(){


    $datas_page=[
    "description" => "Page home du site",
    "title" => "Accueil : ChaiCharly",
    "view" => "views/pages/homePage.php",
    "layout" =>"views/components/layout_2.php",
    ];
    drawPage($datas_page);
}

function vinsPage(){

    require_once "models/produitsModel.php";
    $model = new produitsModel();

    $produit = $model->getProduitRouge();
    $produit1 = $model->getProduitRose();
    $produit2 = $model->getProduitBlanc();
    $produit3 = $model->getProduitBio();
    $produit4 = $model->getProduitMo();
    $produit5 = $model->getProduitBIB();

    $datas_page=[
    "description" => "Page des vins du site",
    "title" => "Nos vins : ChaiCharly",
    "view" => "views/pages/vinsPage.php",
    "layout" =>"views/components/layout.php",
    "produit" => $produit,
    "produit1" => $produit1,
    "produit2" => $produit2,
    "produit3" => $produit3,
    "produit4" => $produit4,
    "produit5" => $produit5,
    ];
    drawPage($datas_page);
}

function tarifsPage(){

    $datas_page=[
    "description" => "Page des tarifs du site",
    "title" => "Tarifs : ChaiCharly",
    "view" => "views/pages/tarifsPage.php",
    "layout" =>"views/components/layout.php",
    ];
    drawPage($datas_page);
}
function cnxPage(){

    $datas_page=[
    "description" => "Page d'inscription du site",
    "title" => "AdminCnx : ChaiCharly",
    "view" => "views/pages/cnxPage.php",
    "layout" =>"views/components/layout.php",
    ];
    drawPage($datas_page);
}

function loginPage(){

    $datas_page=[
    "description" => "Page de connexion du site",
    "title" => "Connexion : ChaiCharly",
    "view" => "views/pages/loginPage.php",
    "layout" =>"views/components/layout.php",
    ];
    drawPage($datas_page);
}

function adminPage() {

    session_start(); // ← au cas où ce n'est pas déjà lancé

    if (!isset($_SESSION['admin'])) {
        // 🔒 Redirection vers la page de connexion si l’admin n’est pas connecté
        header('Location: administrateur');
        exit();
    }

    require_once "models/produitsModel.php";

    $model = new produitsModel();

    // Modification
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
        $model->updateProduit($_POST['id'], $_POST['nom'], $_POST['descCourt'], $_POST['tarifUnit'], $_POST['stock']);
        header('Location: Moderation');
        exit();
    }

    // Suppression
    if (isset($_GET['action']) && $_GET['action'] === 'supprimer' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // 🔎 Récupérer le produit pour obtenir son image
        $produit = $model->getProduitById($id);
        if ($produit && !empty($produit['imgUrl'])) {
            $imagePath = 'public/' . $produit['imgUrl']; // ex: public/img/vins/xxxx.jpg

            // 🗑️ Supprimer le fichier s’il existe
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Ensuite suppression en BDD
        $model->deleteProduit($id);
        header('Location: Moderation');
        exit();
    }

    $produits = $model->getAllProduits();
    
    $datas_page=[
        "description" => "Page des tarifs du site",
        "title" => "Modération : ChaiCharly",
        "view" => "views/pages/adminPage.php",
        "layout" =>"",
        "produits" => $produits
        ];
        drawPage($datas_page);

}

function ajouterProduitPage() {
    require_once "models/produitsModel.php";
    $model = new produitsModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $descLong = $_POST['descLong'];
        $tarifUnit = $_POST['tarifUnit'];
        $tarifCart = $_POST['tarifCart'];
        $stock = $_POST['stock'];
        $codeCat = $_POST['codeCat'];
    
        $imgPath = '';
    
        if (isset($_FILES['imgFile']) && $_FILES['imgFile']['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($_FILES['imgFile']['name']);
            $imgTmp = $_FILES['imgFile']['tmp_name'];
    
            // nom unique
            $imgName = time() . '-' . preg_replace('/\s+/', '-', $originalName);
    
            // ✅ dossier relatif depuis le fichier qui s'exécute
            $destination = 'public/img/vins/' . $imgName;
    
            // 📦 chemin à stocker en BDD
            $imgPath = '../public/img/vins/' . $imgName;
    
            if (!move_uploaded_file($imgTmp, $destination)) {
                $imgPath = ''; // en cas d'échec
            }
        }
    
        $model->insertProduit($nom, $descLong, $tarifUnit, $tarifCart, $stock, $codeCat, $imgPath);
    
        header('Location: Moderation');
        exit();
    }
    
    $datas_page = [
        "description" => "Ajout d'un nouveau produit",
        "title" => "Ajouter un produit : ChaiCharly",
        "view" => "views/pages/ajouterProduitPage.php",
        "layout" => ""
    ];

    drawPage($datas_page);
}

function logoutPage() {
    session_start();         // démarre la session si ce n'est pas déjà fait
    session_unset();         // vide toutes les variables de session
    session_destroy();       // détruit la session
    header('Location: home'); // redirige vers la page de connexion
    exit();
}


?>