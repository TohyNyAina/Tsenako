<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- =================================================================NAVBAR============================================================================================= -->
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../Tsenako/assets/img/Tsenako1.png" alt="Samsung Logo" class="h-12">
                <a href="../../../../Tsenako/View/admin/adminDashboard.php" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                <a href="../../../../Tsenako/View/admin/adminUtilisateurList.php" class="text-gray-600 hover:text-gray-900">Liste des Utilisateurs</a>
                <a href="../../../../Tsenako/Controller/produitController.php?action=lister" class="text-gray-600 hover:text-gray-900">Gestion des Produitst</a>
                <a href="../../../../Tsenako/View/admin/commandeListe.php" class="text-gray-600 hover:text-gray-900">Liste des Commande</a>
            </div>

            <!-- Navbar droite -->
            <div class="flex items-center space-x-3">
                <!--Bouton Deconnexion-->
                <a href="../../../Tsenako/Controller/utilisateurController.php?action=deconnecter" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                    Deconnexion
                </a>
            </div>
        </div>
    </header>
    <br><br><br><br>
    <!-- =================================================================NAVBAR END======================================================================================== -->


<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Modifier un Produit</h1>
    <a href="../../Tsenako/Controller/produitController.php?action=lister" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded mb-4 inline-block">Revenir à la liste des Produits</a>
    <form action="../../Tsenako/Controller/produitController.php?action=modifier&id=<?php echo htmlspecialchars($produit['id']); ?>" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($produit['id']); ?>">
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
            <input type="text" id="nom" name="nom" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($produit['nom']); ?>">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Prix en Ariary:</label>
            <input type="number" id="prix" name="prix" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($produit['prix']); ?>">
        </div>
        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 font-bold mb-2">Categorie:</label>
            <select id="categorie" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="Cuisine" <?php if ($produit['categorie'] == 'Cuisine') echo 'selected'; ?>>Cuisine</option>
                <option value="Nouriture" <?php if ($produit['categorie'] == 'Nouriture') echo 'selected'; ?>>Nouriture</option>
                <option value="Technologie" <?php if ($produit['categorie'] == 'Technologie') echo 'selected'; ?>>Technologie</option>
                <option value="Film" <?php if ($produit['categorie'] == 'Film') echo 'selected'; ?>>Film</option>
                <option value="Jeux vidéo" <?php if ($produit['categorie'] == 'Jeux vidéo') echo 'selected'; ?>>Jeux vidéo</option>
                <option value="Vetement" <?php if ($produit['categorie'] == 'Vetement') echo 'selected'; ?>>Vetement</option>
                <option value="Chausure" <?php if ($produit['categorie'] == 'Chausure') echo 'selected'; ?>>Chausure</option>
                <option value="Materiel" <?php if ($produit['categorie'] == 'Materiel') echo 'selected'; ?>>Materiel</option>
                <option value="Autre..." <?php if ($produit['categorie'] == 'Autre...') echo 'selected'; ?>>Autre...</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($produit['nombre']); ?>">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo:</label>
            <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded">
            <?php if ($produit['photo']): ?>
                <img src="../uploads/<?php echo htmlspecialchars($produit['photo']); ?>" alt="<?php echo htmlspecialchars($produit['nom']); ?>" class="mt-2 w-24 h-auto rounded">
            <?php endif; ?>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Modifier</button>
    </form>
</div>
</body>
</html>
