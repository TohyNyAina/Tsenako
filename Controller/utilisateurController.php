<?php
require_once '../Model/UtilisateurModel.php';

class UtilisateurController {
    private $model;

    public function __construct() {
        $this->model = new UtilisateurModel();
    }

    public function connecter($email, $password) {
        $user = $this->model->Connecter($email, $password);
    
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            if ($user['role'] === 'admin') {
                header('Location: ../../MVC-Pharmacie/View/admin/adminDashboard.php'); // Rediriger vers le tableau de bord admin
            } else {
                header('Location: ../../MVC-Pharmacie/View/client/medicament.php'); // Rediriger vers le tableau de bord client
            }
            exit();
        } else {
            header('Location: ../../MVC-Pharmacie/View/login.php?error=auth_failed'); // Rediriger avec erreur d'authentification
            exit();
        }
    }

    public function inscrire($nom, $email, $password) {
        if ($this->model->isEmailUsed($email)) {
            header('Location: ../../MVC-Pharmacie/View/register.php?error=email_used');
            exit();
        }

        $this->model->Inscrire($nom, $email, $password); // Le nom est laissé vide pour l'inscription
        header('Location: ../../MVC-Pharmacie/View/login.php?success=registered');
        exit();
    }

    public function deconnecter() {
        session_start();
        session_destroy();
        header('Location: ../../MVC-Pharmacie/index.php?success=logout');
        exit();
    }

    public function getUsers() {
        return $this->model->GetUsers();
    }

    public function supprimer($id) {
        $this->model->DeleteUser($id);
        echo json_encode(['success' => true]);
        exit();
    }

    public function checkLoggedIn() {
        session_start();
        return isset($_SESSION['user']);
    }
}

// Gestion des requêtes
$action = $_REQUEST['action'] ?? '';
$controller = new UtilisateurController();
$user_logged_in = false; // Initialisation à false par défaut

switch ($action) {
    case 'connecter':
        $controller->connecter($_POST['email'], $_POST['mdp']);
        break;
    case 'inscrire':
        $controller->inscrire($_POST['nom'], $_POST['email'], $_POST['mdp']);
        break;
    case 'deconnecter':
        $controller->deconnecter();
        break;
    case 'listUsers':
        $users = $controller->getUsers();
        include '../../MVC-Pharmacie/View/admin/listUsers.php';
        break;
    case 'getUsers':
        header('Content-Type: application/json');
        echo json_encode($controller->getUsers());
        break;
    case 'supprimer':
        $controller->supprimer($_POST['id']);
        break;
    default:
        // Vérification de connexion par défaut
        $user_logged_in = $controller->checkLoggedIn();
        include '../../MVC-Pharmacie/View/client/medicament.php';
        break;
}
?>
