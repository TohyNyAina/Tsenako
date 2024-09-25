<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacie</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            padding-top: 76px; /* Assure que le contenu n'est pas caché derrière la navbar */
        }
    </style>
</head>
<body>
    <!-- =================================================================NAVBAR============================================================================================= -->
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../Tsenako/assets/img/logo.jpg" alt="Samsung Logo" class="h-12">
                <p>Pharmacy</p>
                <a href="../../../../Tsenako/View/admin/adminDashboard.php" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                <a href="../../../../Tsenako/View/admin/adminUtilisateurList.php" class="text-gray-600 hover:text-gray-900">Liste des Utilisateurs</a>
                <a href="../../../../Tsenako/View/admin/medicamentListe.php" class="text-gray-600 hover:text-gray-900">Gestion des Medicament</a>
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
    <!-- =================================================================NAVBAR END======================================================================================== -->
</body>
</html>
