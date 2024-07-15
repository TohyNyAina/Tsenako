<?php

require_once '../Model/medicamentModel.php';

class MedicamentController {
    private $model;

    public function __construct() {
        $this->model = new MedicamentModel();
    }

    public function inserer($nom, $prix, $categorie, $nombre, $ordonance, $photo) {
        // Gestion de l'upload de la photo
        $photoName = '';
        if ($photo['name']) {
            $targetDir = "../uploads/";
            $photoName = basename($photo["name"]);
            $targetFilePath = $targetDir . $photoName;
            move_uploaded_file($photo["tmp_name"], $targetFilePath);
        }
        return $this->model->inserer($nom, $prix, $categorie, $nombre, $ordonance, $photoName);
    }

    public function modifier($nom, $prix, $categorie, $nombre, $ordonance, $photo, $id) {
        // Gestion de l'upload de la photo
        $photoName = '';
        if ($photo['name']) {
            $targetDir = "../uploads/";
            $photoName = basename($photo["name"]);
            $targetFilePath = $targetDir . $photoName;
            move_uploaded_file($photo["tmp_name"], $targetFilePath);
        }
        return $this->model->modifier($nom, $prix, $categorie, $nombre, $ordonance, $photoName, $id);
    }

    public function supprimer($id) {
        return $this->model->supprimer($id);
    }

    public function lister() {
        $medicaments = $this->model->lister();
        if ($this->isAjaxRequest()) {
            header('Content-Type: application/json');
            echo json_encode($medicaments);
            exit;
        } else {
            return $medicaments;
        }
    }

    public function findMedicamentById($id) {
        return $this->model->findMedicamentById($id);
    }

    public function search($query) {
        $medicaments = $this->model->search($query);
        header('Content-Type: application/json');
        echo json_encode($medicaments);
        exit;
    }

    public function totalNombre() {
        return $this->model->totalNombre();
    }

    private function isAjaxRequest() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}

// Gestion des requêtes
$action = $_REQUEST['action'] ?? '';
$controller = new MedicamentController();

switch ($action) {
    case 'inserer':
        $controller->inserer($_POST['nom'], $_POST['prix'], $_POST['categorie'], $_POST['nombre'], $_POST['ordonance'], $_FILES['photo']);
        header('Location: ../../MVC-Pharmacie/Controller/medicamentController.php?action=lister');
        break;
    case 'modifier':
        $controller->modifier($_POST['nom'], $_POST['prix'], $_POST['categorie'], $_POST['nombre'], $_POST['ordonance'], $_FILES['photo'], $_POST['id']);
        header('Location: ../../MVC-Pharmacie/Controller/medicamentController.php?action=lister');
        break;
    case 'supprimer':
        $controller->supprimer($_GET['id']);
        header('Location: ../../MVC-Pharmacie/Controller/medicamentController.php?action=lister');
        break;
    case 'edit':
        $medicament = $controller->findMedicamentById($_GET['id']);
        include '../View/admin/medicamentModification.php';
        break;
    case 'lister':
        $medicaments = $controller->lister();
        include '../View/admin/medicamentListe.php';
        break;
    case 'add':
        include '../View/admin/medicamentAjout.php';
        break;
    case 'totalNombre':
        $totalNombre = $controller->totalNombre();
        header('Content-Type: application/json');
        echo json_encode(['total' => $totalNombre]);
        exit;
        break;
    case 'search':
        $controller->search($_GET['query']);
        break;
    default:
        $medicaments = $controller->lister();
        $totalNombre = $controller->totalNombre();
        include '../View/admin/medicamentListe.php';
        break;
}
?>
