<?php

require_once "models/pdoModel.php";

class produitsModel {
    public function getProduitRouge() {
        $req ="SELECT * FROM produit where codeCat = 'RG'";
        $stmt = setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getProduitRose() {
        $req ="SELECT * FROM produit where codeCat = 'RO'";
        $stmt = setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getProduitBlanc() {
        $req ="SELECT * FROM produit where codeCat = 'BL'";
        $stmt = setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getProduitBio() {
        $req ="SELECT * FROM produit where codeCat = 'BIO'";
        $stmt = setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getProduitMo() {
        $req ="SELECT * FROM produit where codeCat = 'MO'";
        $stmt = setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getProduitBIB() {
        $req ="SELECT * FROM produit where codeCat = 'BIB'";
        $stmt = setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getAllProduits() {
        $db = setDB();
        $req = $db->prepare("
            SELECT * FROM produit 
            ORDER BY FIELD(codeCat, 'RG', 'RO', 'BL', 'BIO', 'MO', 'BIB')
        ");
        $req->execute();
        return $req->fetchAll();
    }
    
    public function getProduitById($id) {
        $stmt = setDB()->prepare("SELECT * FROM produit WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    

    public function updateProduit($id, $nom, $descLong, $tarifUnit, $stock) {
        $db = setDB();
        $req = $db->prepare("UPDATE produit SET nom = ?, descLong = ?, tarifUnit = ?, stock = ? WHERE id = ?");
        return $req->execute([$nom, $descLong, $tarifUnit, $stock, $id]);
    }

    public function deleteProduit($id) {
        $db = setDB();
        $req = $db->prepare("DELETE FROM produit WHERE id = ?");
        return $req->execute([$id]);
    }

    public function insertProduit($nom, $descLong, $tarifUnit, $tarifCart, $stock, $codeCat, $imgUrl) {
        $db = setDB();
        $req = $db->prepare("INSERT INTO produit (nom, descLong, tarifUnit, tarifCart, stock, codeCat, imgUrl) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $req->execute([$nom, $descLong, $tarifUnit, $tarifCart, $stock, $codeCat, $imgUrl]);
    }    
    
}

?>
