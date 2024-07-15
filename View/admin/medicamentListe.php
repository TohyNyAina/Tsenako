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
    <title>Liste des Médicaments</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<script>
        function confirmDeletion(event, url) {
            event.preventDefault();
            if (confirm("Voulez-vous vraiment supprimer cet article ?")) {
                window.location.href = url;
            }
        }
    </script>
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
    <h1 class="text-center text-3xl font-bold mb-5">Liste des Médicaments</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=add" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4">Ajouter un Médicament</a>
    <div id="medicaments-list">
    
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/MVC-Pharmacie/Controller/medicamentController.php?action=lister',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    let html = '<div class="overflow-x-auto"><table class="min-w-full bg-white"><thead><tr><th class="py-2 px-4 border-b">Nom</th><th class="py-2 px-4 border-b">Prix en Ariary</th><th class="py-2 px-4 border-b">Catégorie</th><th class="py-2 px-4 border-b">Nombre</th><th class="py-2 px-4 border-b">Ordonance</th><th class="py-2 px-4 border-b">Photo</th><th class="py-2 px-4 border-b">Actions</th></tr></thead><tbody>';
                    data.forEach(function(medicament) {
                        html += '<tr class="hover:bg-gray-100">';
                        html += '<td class="py-2 px-4 border-b">' + medicament.nom + '</td>';
                        html += '<td class="py-2 px-4 border-b">' + medicament.prix + ' Ar</td>';
                        html += '<td class="py-2 px-4 border-b">' + medicament.categorie + '</td>';
                        html += '<td class="py-2 px-4 border-b">' + medicament.nombre + '</td>';
                        html += '<td class="py-2 px-4 border-b">' + medicament.ordonance + '</td>';
                        if (medicament.photo) {
                            html += '<td class="py-2 px-4 border-b"><img src="../../../MVC-Pharmacie/uploads/' + medicament.photo + '" alt="' + medicament.nom + '" class="w-12 h-12 object-cover rounded"></td>';
                        } else {
                            html += '<td class="py-2 px-4 border-b"></td>';
                        }
                        html += '<td class="py-2 px-4 border-b">';
                        html += '<a href="../../../MVC-Pharmacie/Controller/medicamentController.php?action=edit&id=' + medicament.id + '" class="btn bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2">Modifier</a>';
                        html += '<a href="#" onclick="confirmDeletion(event, \'../../../MVC-Pharmacie/Controller/medicamentController.php?action=supprimer&id=' + medicament.id + '\')" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Supprimer</a>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    html += '</tbody></table></div>';
                    $('#medicaments-list').html(html);
                } else {
                    $('#medicaments-list').html('<p class="text-center">Aucun médicament trouvé.</p>');
                }
            },
            error: function() {
                $('#medicaments-list').html('<p>Une erreur est survenue lors du chargement des médicaments.</p>');
            }
        });
    });

    function confirmDeletion(event, url) {
        event.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')) {
            window.location.href = url;
        }
    }
</script>
</body>
</html>
