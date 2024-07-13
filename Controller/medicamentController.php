<?php
require_once '../Model/medicamentModel.php';

class MedicamentController {
    private $model;

    public function __construct() {
        $this->model = new MedicamentModel();
    }

    public function inserer($nom, $categorie, $nombre, $ordonance, $photo) {
        // Gestion de l'upload de la photo
        $photoName = '';
        if ($photo['name']) {
            $targetDir = "../uploads/";
            $photoName = basename($photo["name"]);
            $targetFilePath = $targetDir . $photoName;
            move_uploaded_file($photo["tmp_name"], $targetFilePath);
        }
        return $this->model->inserer($nom, $categorie, $nombre, $ordonance, $photoName);
    }

    public function modifier($nom, $categorie, $nombre, $ordonance, $photo, $id) {
        // Gestion de l'upload de la photo
        $photoName = '';
        if ($photo['name']) {
            $targetDir = "../uploads/";
            $photoName = basename($photo["name"]);
            $targetFilePath = $targetDir . $photoName;
            move_uploaded_file($photo["tmp_name"], $targetFilePath);
        }
        return $this->model->modifier($nom, $categorie, $nombre, $ordonance, $photoName, $id);
    }

    public function supprimer($id) {
        return $this->model->supprimer($id);
    }

    public function lister() {
        return $this->model->lister();
    }

    public function findMedicamentById($id) {
        return $this->model->findMedicamentById($id);
    }
}

// Gestion des requêtes
$action = $_REQUEST['action'] ?? '';
$controller = new MedicamentController();

switch ($action) {
    case 'inserer':
        $controller->inserer($_POST['nom'], $_POST['categorie'], $_POST['nombre'], $_POST['ordonance'], $_FILES['photo']);
        header('Location: ../Controller/medicamentController.php?action=lister');
        break;
    case 'modifier':
        $controller->modifier($_POST['nom'], $_POST['categorie'], $_POST['nombre'], $_POST['ordonance'], $_FILES['photo'], $_POST['id']);
        header('Location: ../Controller/medicamentController.php?action=lister');
        break;
    case 'supprimer':
        $controller->supprimer($_GET['id']);
        header('Location: ../Controller/medicamentController.php?action=lister');
        break;
    case 'edit':
        $medicament = $controller->findMedicamentById($_GET['id']);
        include '../View/admin/medicamentModification.php';
        break;
    case 'lister':
    default:
        $medicaments = $controller->lister();
        include '../View/admin/medicamentListe.php';
        break;
    case 'add':
        include '../View/admin/medicamentAjout.php';
        break;
}

?>
