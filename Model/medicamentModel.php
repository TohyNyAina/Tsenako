<?php
require_once '../Utils/DB.php';

class MedicamentModel {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }
    public function inserer($nom, $categorie, $nombre, $ordonance, $photo) {
        $queryPrepare = $this->db->ds->prepare("INSERT INTO medicament(nom, categorie, nombre, ordonance, photo) VALUE (?, ?, ?, ?, ?)");
        return $queryPrepare->execute(array($nom, $categorie, $nombre, $ordonance, $photo));
    }
    public function modifier($nom, $categorie, $nombre, $ordonance, $photo, $id) {
        $query = $this->db->ds->prepare("UPDATE medicament SET nom = ?, categorie = ?, nombre = ?, ordonance = ?, photo = ? WHERE id = ?");
        return $query->execute(array($nom, $categorie, $nombre, $ordonance, $photo, $id));
    }
    public function supprimer ($id) {
        $sql = $this->db->ds->prepare("DELETE FROM medicament WHERE id =:idMedicament ");
        $sql->bindValue(":idMedicament",$id);
        return $sql->execute();
    }
    public function lister() {
        $query = $this->db->ds->prepare("SELECT * FROM medicament ORDER BY nom");
        $query->execute();
        return $query ->fetchall();
    }
    public function findMedicamentById($id) {
        $query = $this->db->ds->prepare("SELECT * FROM medicament WHERE id = ?");
        $query->execute(array($id));
        return $query->fetch(); 
    }
}
