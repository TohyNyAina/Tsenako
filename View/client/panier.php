<?php
require_once '../../Utils/DB.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
    header('Location: ../../index.php');
    exit();
}

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
        $total += $produit->prix * $_SESSION['panier'][$produit->id];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<!-- ========================================================================NAVBAR================================================================================ -->
<header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Navbar gauche -->
        <div class="flex items-center space-x-3">
            <img src="../../../../Tsenako/assets/img/Tsenako1.png" alt="Samsung Logo" class="h-12">
        </div>

        <!-- Navbar droite -->
        <div class="flex items-center space-x-3">
        
            <!--Bouton panier-->
            <a href="../../../../Tsenako/View/client/panier.php" class="text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                </svg>
            </a>

            <!-- Nom et Déconnexion -->
            <?php if (isset($_SESSION['user'])): ?>
                <span class="text-gray-600">Bonjour, <?=$_SESSION['user']['nom']?></span>
                <a href="../../../Tsenako/Controller/utilisateurController.php?action=deconnecter" class="text-gray-600 hover:text-gray-900">Déconnexion</a>
            <?php else: ?>
                <a href="../../../../Tsenako/View/auth/login.php" class="text-gray-600 hover:text-gray-900">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<body class="bg-gray-100 min-h-screen pt-20 flex flex-col">
<div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold mb-6">Votre Panier</h1>
        <a href="../client/produit.php" class="btn bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded mb-4">Ajouter d'autre Produit</a> <br><br>

        <!-- Affichage des messages de succès en vert et des erreurs en rouge -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <?= $_SESSION['error'] ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (empty($produits)): ?>
            <p>Votre panier est vide.</p>
        <?php else: ?>
            <table class="container table-auto mx-auto bg-white rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Photo</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Categorie</th>
                        <th class="px-4 py-2">Prix</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <img src="../../uploads/<?=$produit->photo?>" alt="<?=$produit->nom?>" class="w-12 h-12 object-cover rounded">
                            </td>
                            <td class="border px-4 py-2"><?=$produit->nom?></td>
                            <td class="border px-4 py-2"><?=$produit->categorie?></td>
                            <td class="border px-4 py-2"><?=$produit->prix?> Ar</td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="/Tsenako/View/client/adjust.php">
                                    <input type="hidden" name="id" value="<?=$produit->id?>">
                                    <input type="number" name="quantity" value="<?=$_SESSION['panier'][$produit->id]?>" min="1" class="w-16">
                                    <input type="submit" value="Enregistrer" class="btn bg-blue-500 text-white px-2 py-1 rounded">
                                </form>
                            </td>
                            <td class="border px-4 py-2"><?=($produit->prix * $_SESSION['panier'][$produit->id])?> Ar</td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="/Tsenako/View/client/suppr.php">
                                    <input type="hidden" name="id" value="<?=$produit->id?>">
                                    <input type="submit" value="Supprimer" class="btn bg-red-500 text-white px-2 py-1 rounded">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="container mx-auto mt-5 text-right">
                <p class="text-xl font-bold">Total à payer: <?=$total?> Ariary</p>
                <br>
                <form method="POST" action="../../Controller/commandeController.php?action=create">
                    <button type="submit" class="btn bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded">Passer la commande</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <!-- =====================================================================FOOTER========================================================================================= -->
    <footer class="bg-purple-900 py-12 mt-auto">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="text-center md:text-right md:order-1">
                    <p class="text-white">Tsenako &copy; 2024. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- =====================================================================FOOTER END===================================================================================== -->
</body>
</html>
