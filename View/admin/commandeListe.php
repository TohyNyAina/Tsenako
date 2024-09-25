<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Commande</title>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="../../../../Tsenako/assets/img/Tsenako1.png" alt="Pharmacy Logo" class="h-12">
            
                <a href="../../../../Tsenako/View/admin/adminDashboard.php" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                <a href="../../../../Tsenako/View/admin/adminUtilisateurList.php" class="text-gray-600 hover:text-gray-900">Liste des Utilisateurs</a>
                <a href="../../../../Tsenako/Controller/produitController.php?action=lister" class="text-gray-600 hover:text-gray-900">Gestion des Produits</a>
                <a href="../../../../Tsenako/View/admin/commandeListe.php" class="text-gray-600 hover:text-gray-900">Liste des Commandes</a>
            </div>
            <div class="flex items-center space-x-3">
                <a href="../../../Tsenako/Controller/utilisateurController.php?action=deconnecter" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Déconnexion</a>
            </div>
        </div>
    </header>
    <br><br><br><br>
    <div class="container mx-auto mt-5">
        <h1 class="text-center text-3xl font-bold mb-5">Liste des Commandes</h1>
    </div>
    <div class="container mx-auto px-6 py-8">
        <div id="commandes-list"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/Tsenako/Controller/commandeController.php?action=get-all',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        let html = '<div class="overflow-x-auto"><table class="min-w-full bg-white"><thead><tr><th class="py-2 px-4 border-b">Id</th><th class="py-2 px-4 border-b">Produit</th><th class="py-2 px-4 border-b">Prix total</th><th class="py-2 px-4 border-b">Acheteur</th><th class="py-2 px-4 border-b">Id Acheteur</th></tr></thead><tbody>';
                        data.forEach(function(commande) {
                            html += '<tr class="hover:bg-gray-100">';
                            html += '<td class="py-2 px-4 border-b">' + commande.id + '</td>';
                            html += '<td class="py-2 px-4 border-b">' + commande.produit + '</td>';
                            html += '<td class="py-2 px-4 border-b">' + commande.total_prix + ' Ar</td>';
                            html += '<td class="py-2 px-4 border-b">' + commande.acheteur + '</td>';
                            html += '<td class="py-2 px-4 border-b">' + commande.id_acheteur + '</td>';
                            html += '</tr>';
                        });
                        html += '</tbody></table></div>';
                        $('#commandes-list').html(html);
                    } else {
                        $('#commandes-list').html('<p class="text-center">Aucune commande trouvée.</p>');
                    }
                },
                error: function() {
                    $('#commandes-list').html('<p>Une erreur est survenue lors du chargement des commandes.</p>');
                }
            });
        });
    </script>
</body>
</html>
