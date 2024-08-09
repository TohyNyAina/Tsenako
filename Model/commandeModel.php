<?php
require_once '../Utils/DB.php';

class CommandeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function show($id)
    {
        $stmt = $this->db->ds->prepare("SELECT * FROM `commande` WHERE id = ?");
        if ($stmt) {
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }

    public function index()
    {
        $stmt = $this->db->ds->prepare("SELECT * FROM `commande`");
        if ($stmt) {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }

    public function create($nom_medicament, $total_prix, $acheteur, $id_acheteur)
{
    $stmt = $this->db->ds->prepare("INSERT INTO `commande` (`medicament`, `total_prix`, `acheteur`, `id_acheteur`) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->execute([$nom_medicament, $total_prix, $acheteur, $id_acheteur]);
        return true;
    } else {
        throw new Exception("Failed to prepare the statement.");
    }
}

public function updateMedicamentStock($id_medicament, $quantite_reduite)
{
    $stmt = $this->db->ds->prepare("UPDATE `medicament` SET `nombre` = `nombre` - ? WHERE `id` = ?");
    if ($stmt) {
        $stmt->execute([$quantite_reduite, $id_medicament]);
        return true;
    } else {
        throw new Exception("Failed to update the stock.");
    }
}

    public function getByUser($user)
    {
        $stmt = $this->db->ds->prepare("SELECT * FROM `commande` WHERE id_acheteur = ?");
        if ($stmt) {
            $stmt->execute([$user]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }

    public function totalArgents() {
        $sql = $this->db->ds->prepare("SELECT SUM(total_prix) as total FROM commande");
        $sql->execute();
        return $sql->fetchColumn();
    }
}
?>
