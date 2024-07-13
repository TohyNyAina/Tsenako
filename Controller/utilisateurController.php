<?php
require_once '../Model/utilisateurModel.php';

class UtilisateurController{
    private $model;

    public function __construct()
    {
        $this->model=new UtilisateurModel();
    }

    public function Connexion($email,$password,$role){
        $user=$this->model->Connecter($email,$password,$role);
        if(!$user){
            echo "Mot de passe Incorrect ou email Incorrecte";
        }
    }
    public function Inscription($nom,$email,$password){
        $user=$this->model->Inscrire($nom,$email,$password);
        if(!$user){
            echo "Erreur de l' inscription";
        }
    }

    public function User(){
        return $this->model->GetUSer();
    }
}


    //REQUETES
    $action=$_REQUEST["action"];
    $controller=new UtilisateurController();

    switch ($action) {
        case 'Connexion':
            $controller->Connexion($_POST["email"],$_POST["password"],$_POST["role"]);
            header("Location: ../Controller/utilisateurController.php?action=prem");
            break;
        case 'inscription':
            $controller->Inscription($_POST["nom"],$_POST["email"],$_POST["password"]);
            header("Location: ../Controller/utilisateurController.php?action=prem");
            break;
        case 'login':
            include '../View/login.php';
            break;
        case 'Sign':
            include"../View/register.php";
            break;
        case 'prem':
        default:
            include"../View/client/medicament.php";
            break;
    }
?>