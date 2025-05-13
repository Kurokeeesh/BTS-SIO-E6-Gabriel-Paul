<?php
require_once "models/pdoModel.php";

class UserModel {
    public function register($pseudo, $mail, $tel, $password) {
        // Vérifier si l'email existe déjà
        $req = "SELECT * FROM Abonne WHERE mail = ?";
        $stmt = setDB()->prepare($req);
        $stmt->execute([$mail]);
        if ($stmt->fetch()) {
            return "Cet email est déjà utilisé.";
        }
        
        // Hashage du mot de passe
        $hashedPassword = password_hash("".$password, PASSWORD_DEFAULT);
        $dateAbo = date('Y-m-d');

        // Insérer l'utilisateur
        $req = "INSERT INTO Abonne (pseudo, mail, tel, mdp, dateAbo) VALUES (?, ?, ?, ?, ?)";
        $stmt = setDB()->prepare($req);
        return $stmt->execute([$pseudo, $mail, $tel, $hashedPassword, $dateAbo]);
    }

    public function login($login, $password) {
        // Récupérer l'utilisateur
        $req = "SELECT * FROM Admin WHERE login = ?";
        $stmt = setDB()->prepare($req);
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['mdp'])) {
            return $user;
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }
}