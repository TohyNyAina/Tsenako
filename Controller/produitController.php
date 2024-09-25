<?php

require_once '../Model/produitModel.php';

class ProduitController {
    private $model;

    public function __construct() {
        $this->model = new ProduitModel();
    }

    public function inserer($nom, $prix, $categorie, $nombre, $photo) {
        // Gestion de l'upload de la photo
        $photoName = '';
        if ($photo['name']) {
            $targetDir = "../uploads/";
            $photoName = basename($photo["name"]);
            $targetFilePath = $targetDir . $photoName;
            move_uploaded_file($photo["tmp_name"], $targetFilePath);
        }
        return $this->model->inserer($nom, $prix, $categorie, $nombre, $photoName);
    }

    public function modifier($nom, $prix, $categorie, $nombre, $photo, $id) {
        // Gestion de l'upload de la photo
        $photoName = '';
        if ($photo['name']) {
            $targetDir = "../uploads/";
            $photoName = basename($photo["name"]);
            $targetFilePath = $targetDir . $photoName;
            move_uploaded_file($photo["tmp_name"], $targetFilePath);
        }
        return $this->model->modifier($nom, $prix, $categorie, $nombre, $photoName, $id);
    }

    public function supprimer($id) {
        return $this->model->supprimer($id);
    }

    public function lister() {
        $produits = $this->model->lister();
        if ($this->isAjaxRequest()) {
            header('Content-Type: application/json');
            echo json_encode($produits);
            exit;
        } else {
            return $produits;
        }
    }

    public function findProduitById($id) {
        return $this->model->findProduitById($id);
    }

    public function search($query) {
        $produits = $this->model->search($query);
        header('Content-Type: application/json');
        echo json_encode($produits);
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
$controller = new ProduitController();

switch ($action) {
    case 'inserer':
        $controller->inserer($_POST['nom'], $_POST['prix'], $_POST['categorie'], $_POST['nombre'], $_FILES['photo']);
        header('Location: ../../Tsenako/Controller/produitController.php?action=lister');
        break;
    case 'modifier':
        $controller->modifier($_POST['nom'], $_POST['prix'], $_POST['categorie'], $_POST['nombre'], $_FILES['photo'], $_POST['id']);
        header('Location: ../../Tsenako/Controller/produitController.php?action=lister');
        break;
    case 'supprimer':
        $controller->supprimer($_GET['id']);
        header('Location: ../../Tsenako/Controller/produitController.php?action=lister');
        break;
    case 'edit':
        $produit = $controller->findProduitById($_GET['id']);
        include '../View/admin/produitModification.php';
        break;
    case 'lister':
        $produits = $controller->lister();
        include '../View/admin/produitListe.php';
        break;
    case 'add':
        include '../View/admin/produitAjout.php';
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
        $produits = $controller->lister();
        $totalNombre = $controller->totalNombre();
        include '../View/admin/produitListe.php';
        break;
}
?>
