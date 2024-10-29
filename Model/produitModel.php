<?php
require_once '../Utils/DB.php';

class ProduitModel {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function inserer($nom, $prix, $categorie, $nombre, $photo) {
        $queryPrepare = $this->db->ds->prepare("INSERT INTO produit(nom, prix, categorie, nombre, photo) VALUE (?, ?, ?, ?, ?)");
        return $queryPrepare->execute(array($nom, $prix, $categorie, $nombre, $photo));
    }

    public function modifier($nom, $prix, $categorie, $nombre, $photo, $id) {
        $query = $this->db->ds->prepare("UPDATE produit SET nom = ?, prix= ?, categorie = ?, nombre = ?, photo = ? WHERE id = ?");
        return $query->execute(array($nom, $prix, $categorie, $nombre, $photo, $id));
    }

    public function supprimer($id) {
        $sql = $this->db->ds->prepare("DELETE FROM produit WHERE id = :idProduit");
        $sql->bindValue(":idProduit", $id);
        return $sql->execute();
    }

    public function lister() {
        $query = $this->db->ds->prepare("SELECT * FROM produit ORDER BY nom");
        $query->execute();
        return $query->fetchAll();
    }

    public function findProduitById($id) {
        $query = $this->db->ds->prepare("SELECT * FROM produit WHERE id = ?");
        $query->execute(array($id));
        return $query->fetch();
    }

    public function search($query) {
        $sql = $this->db->ds->prepare("SELECT * FROM produit WHERE nom LIKE ?");
        $sql->execute(array("%$query%"));
        return $sql->fetchAll();
    }

    public function filterByCategory($category) {
        $sql = $this->db->ds->prepare("SELECT * FROM produit WHERE categorie = ?");
        $sql->execute(array($category));
        return $sql->fetchAll();
    }

    public function totalNombre() {
        $sql = $this->db->ds->prepare("SELECT SUM(nombre) as total FROM produit");
        $sql->execute();
        return $sql->fetchColumn();
    }
    
}
?>
