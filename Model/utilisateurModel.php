<?php
require_once '../Utils/DB.php';

class UtilisateurModel {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function Connecter($email, $password) {
        $host = $this->db->ds->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $host->execute([
            "email" => $email,
        ]);

        $user = $host->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Inscrire($nom, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $host = $this->db->ds->prepare("INSERT INTO utilisateur (nom, email, password, role) VALUES (:nom, :email, :password, 'client')");
        return $host->execute([
            "nom" => $nom,
            "email" => $email,
            "password" => $hashedPassword
        ]);
    }

    public function isEmailUsed($email) {
        $host = $this->db->ds->prepare("SELECT COUNT(*) FROM utilisateur WHERE email = :email");
        $host->execute(["email" => $email]);
        return $host->fetchColumn() > 0;
    }

    public function GetUsers() {
        $host = $this->db->ds->query("SELECT * FROM utilisateur");
        $result = $host->fetchAll();
        return $result;
    }

    public function DeleteUser($id) {
        $host = $this->db->ds->prepare("DELETE FROM utilisateur WHERE id = :id");
        return $host->execute(["id" => $id]);
    }
    
}
?>
