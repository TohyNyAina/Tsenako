<?php
require_once '../Utils/DB.php';
class UtilisateurModel{
    private $db;
    public function __construct()
    {
        $this->db=new DB();
    }
    public function Connecter($email,$password,$role){
        $host=$this->db->ds->prepare("SELECT nom,email,password,role FROM utilisateur WHERE email=:email AND password=:password AND role=:role");
        return $host->execute([
            "email"=>$email,
            "password"=>$password,
            "role"=>$role
        ]);
    }
    public function Inscrire($nom,$email,$password){
        $host=$this->db->ds->prepare("INSERT INTO utilisateur(nom,email,password) VALUES (:nom,email,:password)");
        return $host->execute([
            "nom"=>$nom,
            "email"=>$email,
            "password"=>$password
        ]);
    }
    //listes des utilisateurs
    public function GetUSer(){
        $host=$this->db->ds->query("SELECT * FROM utilisateur");
        $result=$host->fetchAll();
        return $result;
    }
}
?>