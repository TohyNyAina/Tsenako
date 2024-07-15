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
    <title>Liste des utilisateurs</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadUsers() {
            $.ajax({
                url: '../../../MVC-Pharmacie/Controller/utilisateurController.php?action=getUsers',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    let userTable = '';
                    data.forEach(user => {
                        userTable += `
                            <tr class="hover:bg-gray-100" >
                                <td class="py-2 px-4 border-b">${user.nom}</td>
                                <td class="py-2 px-4 border-b">${user.email}</td>
                                <td class="py-2 px-4 border-b">${user.role}</td>
                                <td class="py-2 px-4 border-b"><button class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded" onclick="deleteUser(${user.id})">Supprimer</button></td>
                            </tr>
                        `;
                    });
                    $('#userTableBody').html(userTable);
                }
            });
        }

        function deleteUser(userId) {
            if (confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
                $.ajax({
                    url: '../../../MVC-Pharmacie/Controller/utilisateurController.php?action=supprimer',
                    method: 'POST',
                    data: { id: userId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            loadUsers();
                        } else {
                            alert('Erreur lors de la suppression de l\'utilisateur.');
                        }
                    }
                });
            }
        }

        $(document).ready(function () {
            loadUsers();
        });
    </script>
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

    <div class="container mx-auto px-6 py-4">
        <h1 class="text-center text-3xl font-bold mb-5">Liste des utilisateurs</h1>
        <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Rôle</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!-- Les utilisateurs seront chargés ici par AJAX -->
            </tbody>
        </table>
    </div>
    </div>

</body>
</html>
