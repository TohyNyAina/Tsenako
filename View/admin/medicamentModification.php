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
    <title>Modifier un Médicament</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- =================================================================NAVBAR============================================================================================= -->
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../MVC-Pharmacie/assets/img/logo.jpg" alt="Samsung Logo" class="h-12">
                <p>Pharmacy</p>
                <a href="../../../../MVC-Pharmacie/View/admin/adminDashboard.php" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                <a href="../../../../MVC-Pharmacie/View/admin/adminUtilisateurList.php" class="text-gray-600 hover:text-gray-900">Liste des Utilisateurs</a>
                <a href="../../../../MVC-Pharmacie/Controller/medicamentController.php?action=lister" class="text-gray-600 hover:text-gray-900">Gestion des Medicament</a>
                <a href="../../../../MVC-Pharmacie/View/admin/commandeListe.php" class="text-gray-600 hover:text-gray-900">Liste des Commande</a>
            </div>

            <!-- Navbar droite -->
            <div class="flex items-center space-x-3">
                <!--Bouton Deconnexion-->
                <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=deconnecter" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                    Deconnexion
                </a>
            </div>
        </div>
    </header>
    <br><br><br><br>
    <!-- =================================================================NAVBAR END======================================================================================== -->


<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Modifier un Médicament</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=lister" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4 inline-block">Revenir à la liste des medicaments</a>
    <form action="../../MVC-Pharmacie/Controller/medicamentController.php?action=modifier&id=<?php echo htmlspecialchars($medicament['id']); ?>" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($medicament['id']); ?>">
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
            <input type="text" id="nom" name="nom" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['nom']); ?>">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Prix en Ariary:</label>
            <input type="number" id="prix" name="prix" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['prix']); ?>">
        </div>
        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 font-bold mb-2">Ordonance:</label>
            <select id="categorie" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="Comprimé" <?php if ($medicament['categorie'] == 'Comprimé') echo 'selected'; ?>>Comprimé</option>
                <option value="Gélule" <?php if ($medicament['categorie'] == 'Gélule') echo 'selected'; ?>>Gélule</option>
                <option value="Pomade" <?php if ($medicament['categorie'] == 'Pomade') echo 'selected'; ?>>Pomade</option>
                <option value="Sirop" <?php if ($medicament['categorie'] == 'Sirop') echo 'selected'; ?>>Sirop</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['nombre']); ?>">
        </div>
        <div class="mb-4">
            <label for="ordonance" class="block text-gray-700 font-bold mb-2">Ordonance:</label>
            <select id="ordonance" name="ordonance" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="0" <?php if ($medicament['ordonance'] == 0) echo 'selected'; ?>>Non Obligatoire</option>
                <option value="1" <?php if ($medicament['ordonance'] == 1) echo 'selected'; ?>>Obligatoire</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo:</label>
            <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded">
            <?php if ($medicament['photo']): ?>
                <img src="../uploads/<?php echo htmlspecialchars($medicament['photo']); ?>" alt="<?php echo htmlspecialchars($medicament['nom']); ?>" class="mt-2 w-24 h-auto rounded">
            <?php endif; ?>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Modifier</button>
    </form>
</div>
</body>
</html>
