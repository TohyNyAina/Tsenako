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
        $stmt = $this->db->ds->prepare("SELECT * FROM `command` WHERE id = ?");
        if ($stmt) {
            $stmt->execute([$id]);
            return $stmt->fetchAll();
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }
    public function index()
    {
        $stmt = $this->db->ds->prepare("SELECT * FROM `command`");
        if ($stmt) {
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }

    public function create($medicament, $total_prix, $acheteur)
    {
        $stmt = $this->db->ds->prepare("INSERT INTO `command` (`medicament`, `total_prix`, `acheteur`) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->execute([$medicament, $total_prix, $acheteur]);
            return true;
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }

    public function getByUser($user)
    {
        $stmt = $this->db->ds->prepare("SELECT * FROM `command` WHERE acheteur = ?");
        if ($stmt) {
            $stmt->execute([$user]);
            return $stmt->fetchAll();
        } else {
            throw new Exception("Failed to prepare the statement.");
        }
    }
}
