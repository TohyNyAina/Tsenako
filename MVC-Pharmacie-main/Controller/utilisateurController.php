<?php
require_once '../Model/UtilisateurModel.php';

class UtilisateurController
{
    private $model;

    public function __construct()
    {
        $this->model = new UtilisateurModel();
        session_start();
    }

    public function connecter($email, $password)
    {
        $user = $this->model->Connecter($email, $password);

        if ($user) {
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

    public function inscrire($nom, $email, $password)
    {
        if ($this->model->isEmailUsed($email)) {
            header('Location: ../../MVC-Pharmacie/View/register.php?error=email_used');
            exit();
        }

        $this->model->Inscrire($nom, $email, $password); // Le nom est maintenant passé à la méthode Inscrire
        header('Location: ../../MVC-Pharmacie/View/login.php?success=registered');
        exit();
    }

    public function deconnecter()
    {
        session_destroy();
        header('Location: ../../MVC-Pharmacie/index.php?success=logout');
        exit();
    }

    public function getUsers()
    {
        return $this->model->GetUsers();
    }

    public function supprimer($id)
    {
        $this->model->DeleteUser($id);
        echo json_encode(['success' => true]);
        exit();
    }

    public function checkLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    public function checkRole($role)
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === $role;
    }

    public function redirectIfNotLoggedIn()
    {
        if (!$this->checkLoggedIn()) {
            header('Location: ../../MVC-Pharmacie/index.php');
            exit();
        }
    }

    public function redirectIfNotAdmin()
    {
        if (!$this->checkRole('admin')) {
            header('Location: ../../MVC-Pharmacie/index.php');
            exit();
        }
    }

    public function redirectIfNotClient()
    {
        if (!$this->checkRole('client')) {
            header('Location: ../../MVC-Pharmacie/index.php');
            exit();
        }
    }
}

// Gestion des requêtes
$action = $_REQUEST['action'] ?? '';
$controller = new UtilisateurController();

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
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotAdmin();
        $users = $controller->getUsers();
        include '../../MVC-Pharmacie/View/admin/listUsers.php';
        break;
    case 'getUsers':
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotAdmin();
        header('Content-Type: application/json');
        echo json_encode($controller->getUsers());
        break;
    case 'supprimer':
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotAdmin();
        $controller->supprimer($_POST['id']);
        break;
    case 'commandeListe':
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotAdmin();
        include '../../MVC-Pharmacie/View/admin/commandeListe.php';
        break;
    case 'addMedicament':
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotAdmin();
        include '../../MVC-Pharmacie/Controller/medicamentController.php?action=add';
        break;
    case 'editMedicament':
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotAdmin();
        $controller->editMedicament($_GET['id']);
        break;
    case 'medicament':
        $controller->redirectIfNotLoggedIn();
        if ($controller->checkRole('admin')) {
            include '../../MVC-Pharmacie/View/admin/adminDashboard.php';
        } elseif ($controller->checkRole('client')) {
            include '../../MVC-Pharmacie/View/client/medicament.php';
        } else {
            header('Location: ../../MVC-Pharmacie/index.php');
            exit();
        }
        break;
    case 'panier':
        $controller->redirectIfNotLoggedIn();
        $controller->redirectIfNotClient();
        include '../../MVC-Pharmacie/View/client/panier.php';
        break;
    default:
        $controller->redirectIfNotLoggedIn();
        if ($controller->checkRole('admin')) {
            header('Location: ../../MVC-Pharmacie/View/admin/adminDashboard.php');
        } elseif ($controller->checkRole('client')) {
            header('Location: ../../MVC-Pharmacie/View/client/medicament.php');
        } else {
            header('Location: ../../MVC-Pharmacie/index.php');
            exit();
        }
        break;
}
