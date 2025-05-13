<?php
session_start();
require_once 'controllers/authController.php';
$auth = new authController();
$auth->loginUser();
?>

<div class="cnx">
    <h1 >Connexion</h1></br>
    <div class="cnx-form">
        <form method="POST">
            <label for ="login">Login:</label> 
            <input type="text" name="login" required placeholder="Login"><br>

            <label for ="password">Mot de passe:</label> 
            <input type="password" name="password" required placeholder="Mot de passe"><br>

            <button type="submit" class="btn-envoyer">Se connecter</button>
        </form>
    </div>
</div>