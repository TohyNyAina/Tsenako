<?php
require_once '../../Utils/DB.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
    header('Location: ../../index.php');
    exit();
}

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
            <img src="../../../../MVC-Pharmacie/assets/img/logo.jpg" alt="Samsung Logo" class="h-12">
            <p>Pharmacy</p>
            <a href="../../../../MVC-Pharmacie/View/client/medicament.php" class="text-gray-600 hover:text-gray-900">Boutique</a>
        </div>

        <!-- Navbar droite -->
        <div class="flex items-center space-x-3">
        
            <!--Bouton panier-->
            <a href="../../../../MVC-Pharmacie/View/client/panier.php" class="text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                </svg>
            </a>

            <!--Bouton Deconnexion-->
            <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=deconnecter" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                Deconnexion
            </a>
            
        </div>
    </div>
</header> 
<br><br><br><br><br>
<!-- ========================================================================NAVBAR END================================================================================ -->    

<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex-grow">
        <h1 class="text-center text-3xl font-bold mb-5">Panier</h1>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="container mx-auto bg-red-100 text-red-700 p-4 rounded mb-5">
                <?= $_SESSION['error'] ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <?php if (empty($medicaments)): ?>
            <p class="text-center">Votre panier est vide</p>
        <?php else: ?>
            <table class="container table-auto mx-auto bg-white rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Photo</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prix</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($medicaments as $medicament): ?>
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <img src="../../uploads/<?=$medicament->photo?>" alt="' + medicament.nom + '" class="w-12 h-12 object-cover rounded">
                            </td>'
                            <td class="border px-4 py-2"><?=$medicament->nom?></td>
                            <td class="border px-4 py-2"><?=$medicament->prix?> €</td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="/MVC-Pharmacie/View/client/adjust.php">
                                    <input type="hidden" name="id" value="<?=$medicament->id?>">
                                    <input type="number" name="quantity" value="<?=$_SESSION['panier'][$medicament->id]?>" min="1" class="w-16">
                                    <input type="submit" value="Modifier" class="btn bg-blue-500 text-white px-2 py-1 rounded">
                                </form>
                            </td>
                            <td class="border px-4 py-2"><?=($medicament->prix * $_SESSION['panier'][$medicament->id])?> €</td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="/MVC-Pharmacie/View/client/suppr.php">
                                    <input type="hidden" name="id" value="<?=$medicament->id?>">
                                    <input type="submit" value="Supprimer" class="btn bg-red-500 text-white px-2 py-1 rounded">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="container mx-auto mt-5 text-right">
                <p class="text-xl font-bold">Total à payer: <?=$total?> €</p>
                <br>
                <a href="" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Passer au paiement</a>
            </div>
        <?php endif; ?>
    </div>
    <!-- =====================================================================FOOTER========================================================================================= -->
    <footer class="bg-green-900 py-12 mt-auto">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2">
                    <a href="../../View//client/medicament.php" class="text-white hover:text-gray-900 mx-3">Boutique</a>
                </div>
                <div class="text-center md:text-right md:order-1">
                    <p class="text-white">Pharmacy &copy; 2024. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- =====================================================================FOOTER END===================================================================================== -->
</body>
</html>
