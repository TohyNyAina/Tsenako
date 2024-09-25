<?php
require_once '../Model/commandeModel.php';

class CommandeController
{
    private $commandeModel;

    public function __construct()
    {
        $this->commandeModel = new CommandeModel();
    }

    public function index()
    {
        $commandes = $this->commandeModel->index();
        if ($this->isAjaxRequest()) {
            header('Content-Type: application/json');
            echo json_encode($commandes);
            exit;
        } else {
            return $commandes;
        }
    }

    public function create()
    {
        session_start();
    
        if (!isset($_SESSION['user'])) {
            echo "Utilisateur non connecté";
            exit();
        }
    
        $user = $_SESSION['user'];
        $produits = [];
        $total = 0;
    
        if (!empty($_SESSION['panier'])) {
            $ids = array_keys($_SESSION['panier']);
            $ids = implode(',', $ids);
            $db = new DB();
            $sql = "SELECT * FROM produit WHERE id IN ($ids)";
            $result = $db->ds->query($sql);
            $produits = $result->fetchAll(PDO::FETCH_OBJ);
    
            foreach ($produits as $produit) {
                $quantite = $_SESSION['panier'][$produit->id];
                $this->commandeModel->create(
                    $produit->nom, 
                    $produit->prix * $quantite,
                    $user['nom'],
                    $user['id']
                );
                // Reduce the stock
                $this->commandeModel->updateProduitStock($produit->id, $quantite);
            }
        }
    
        unset($_SESSION['panier']);
        header('Location:../../Tsenako/Controller/commandeController.php?action=list-par-utilisateur&idUtilisateur=' . $user['id']);
    }

    public function listByUser($idUtilisateur)
    {
        $commandes = $this->commandeModel->getByUser($idUtilisateur);
        return $commandes;
    }

    public function show($idCommande)
    {
        $commande = $this->commandeModel->show($idCommande);
        return $commande;
    }

    public function getAll()
    {
        $commandes = $this->index();
        header('Content-Type: application/json');
        echo json_encode($commandes);
        exit();
    }

    public function totalArgents() {
        return $this->commandeModel->totalArgents();
    }

    private function isAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}

$action = $_REQUEST['action'] ?? '';
$controller = new CommandeController();

switch ($action) {
    case 'index':
        $commandes = $controller->index();
        include '../View/admin/commandeListe.php';
        break;
    case 'form':
        include '../View/admin/commandeAjout.php';
        break;
    case 'create':
        $controller->create();
        break;
    case 'list-par-utilisateur':
        $idUtilisateur = $_GET['idUtilisateur'];
        $commandes = $controller->listByUser($idUtilisateur);
        include '../View/client/produit.php';
        break;
    case 'get-all':
        $controller->getAll();
        break;
    case 'show':
        $idCommande = $_GET['idCommande'];
        $commande = $controller->show($idCommande);
        include '../View/client/panier.php';
        break;
    case 'delete':
    default:
        break;
}
?>
