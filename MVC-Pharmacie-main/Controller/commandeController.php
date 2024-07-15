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
        return $commandes;
    }
    public function create()
    {
        $user = $_SESSION['user'];

        $medicaments = [];
        $total = 0;

        if (!empty($_SESSION['panier'])) {
            $ids = array_keys($_SESSION['panier']);
            $ids = implode(',', $ids);
            $db = new DB();
            $sql = "SELECT * FROM medicament WHERE id IN ($ids)";
            $result = $db->ds->query($sql);
            $medicaments = $result->fetchAll(PDO::FETCH_OBJ);
            foreach ($medicaments as $medicament) {
                $total += $medicament->prix * $_SESSION['panier'][$medicament->id];
            }
        }
        foreach ($medicaments as $medicament) {
            $this->commandeModel->create(
                $user->id,
                $medicament->id,
                $user["nom"],

            );
        }

        header('Location:../../MVC-Pharmacie/Controller/commandeController.php?action=list-par-utilisateur&idUtilisateur=' . $user['id']);
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
        include '../View/admin/commandeListeParUtilisateur.php';
        break;
    case 'show':
        $idCommande = $_GET['idCommande'];
        $commande = $controller->show($idCommande);
        include '../View/admin/detail-commande.php';
        break;
    case 'delete':
    default:
        break;
}
