<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}
?>

<?php 
require_once '../../Utils/DB.php';


$db = new DB();


$sql = "SELECT SUM(total_prix) as total FROM commande";
$result = $db->ds->query($sql);


$totalPrix = $result->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
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
                <a href="../../../../MVC-Pharmacie/View/admin/commandeListe.php" class="text-gray-600 hover:text-gray-900">Liste des Commandes</a>
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

    <main class="container mx-auto mt-10">
        <h1 class="text-center text-3xl font-bold mb-5">Tableau de bord</h1>

        <br><br><br>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Total d'argent gagné -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Total d'Argent Gagné</h2>
                <p class="text-3xl text-green-500 font-bold"><?= number_format($totalPrix, 0, ',', ' ') ?> Ar</p>
            </div>

            <!-- Card 2: Nombre total de clients -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Nombre Total de Clients</h2>
                <p id="totalClients" class="text-3xl text-blue-500 font-bold">Chargement en cours...</p>
            </div>

            <!-- Card 3: Nombre total de produits en stock -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Nombre Total de Produits en Stock</h2>
                <p id="totalProduits" class="text-3xl text-yellow-500 font-bold">Chargement en cours...</p>
            </div>
        </div>
    </main>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction AJAX pour récupérer le nombre total de produits en stock
        function getTotalProducts() {
            fetch('../../../../MVC-Pharmacie/Controller/medicamentController.php?action=totalNombre')
                .then(response => response.json())
                .then(data => {
                    // Mettre à jour l'élément HTML avec le nombre total récupéré
                    document.getElementById('totalProduits').textContent = data.total;
                })
                .catch(error => console.error('Erreur lors de la récupération du nombre total de produits:', error));
        }

        // Appeler la fonction au chargement de la page
        getTotalProducts();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction AJAX pour récupérer le nombre total de clients
        function getTotalClients() {
            fetch('../../../../MVC-Pharmacie/Controller/utilisateurController.php?action=totalClients')
                .then(response => response.json())
                .then(data => {
                    // Mettre à jour l'élément HTML avec le nombre total récupéré
                    document.getElementById('totalClients').textContent = data.totalClients;
                })
                .catch(error => console.error('Erreur lors de la récupération du nombre total de clients:', error));
        }

        // Appeler la fonction au chargement de la page
        getTotalClients();
    });
</script>


</html>