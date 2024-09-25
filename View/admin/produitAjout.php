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
    <title>Ajouter un Médicament</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var nom = document.getElementById('nom').value;
            var prix = document.getElementById('prix').value;
            var categorie = document.getElementById('categorie').value;
            var nombre = document.getElementById('nombre').value;
            var photo = document.getElementById('photo').value;

            if (nom == "" || prix == "" || categorie == "" || nombre == "" || photo == "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }
            return true;
        }
    </script>
</head>

<!-- =================================================================NAVBAR============================================================================================= -->
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../Tsenako/assets/img/Tsenako1.png" alt="Samsung Logo" class="h-12">
                
                <a href="../../../../Tsenako/View/admin/adminDashboard.php" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                <a href="../../../../Tsenako/View/admin/adminUtilisateurList.php" class="text-gray-600 hover:text-gray-900">Liste des Utilisateurs</a>
                <a href="../../../../Tsenako/Controller/produitController.php?action=lister" class="text-gray-600 hover:text-gray-900">Gestion des Produits</a>
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


<body class="bg-gray-100">
<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Ajouter un Produit</h1>
    <a href="../../Tsenako/Controller/produitController.php?action=lister" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded mb-4 inline-block">Revenir à la liste des produits</a>
    <form action="../../Tsenako/Controller/produitController.php?action=inserer" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
            <input type="text" id="nom" name="nom" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Prix en Ariary:</label>
            <input type="number" id="prix" name="prix" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 font-bold mb-2">Catégorie:</label>
            <select id="categorie" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="Cuisine">Cuisine</option>
                <option value="Nouriture">Nouriture</option>
                <option value="Technologie">Technologie</option>
                <option value="Film">Film</option>
                <option value="Jeux vidéo">Jeux vidéo</option>
                <option value="Vetement">Vetement</option>
                <option value="Chausure">Chausure</option>
                <option value="Materiel">Materiel</option>
                <option value="Autre...">Autre...</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo:</label>
            <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Ajouter</button>
    </form>
</div>
</body>
</html>
