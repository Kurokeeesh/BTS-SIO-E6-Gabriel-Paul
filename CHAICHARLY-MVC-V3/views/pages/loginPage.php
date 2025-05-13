<?php
require_once 'controllers/authController.php';
$auth = new authController();
$auth->registerUser();
?>

<div class="register">
    <h1 >Inscription</h1></br>
    <div class="register-form">
        <form method="POST">
            <label for="pseudo">Pseudo:</label> 
            <input type="text" name="pseudo" required placeholder="Pseudo"><br>

            <label for ="email">Email:</label> 
            <input type="email" name="mail" required placeholder="Email"><br>

            <label for ="telephone">Téléphone:</label> 
            <input type="text" name="tel" required placeholder="Téléphone"pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required /><br>

            <label for ="password">Mot de passe:</label> 
            <input type="password" name="password" required placeholder="Mot de passe"><br>

            <label for ="confirm_password">Confirmer le mot de passe:</label>
            <input type="password" name="confirm_password" required placeholder="Confirmer"><br>

            <button type="submit" class="btn-envoyer">S'inscrire</button>
        </form>
        <a class="conexion" href="connexion">Déjà un compte ? Connecte-toi ici</a>
    </div>
</div>