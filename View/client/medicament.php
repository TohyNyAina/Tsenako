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

<!-- ========================================================================NAVBAR================================================================================ -->
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../MVC-Pharmacie/assets/img/logo.jpg" alt="Samsung Logo" class="h-12">
                <p>Pharmacy</p>
                <a href="../../../View/client/medicament.php" class="text-gray-600 hover:text-gray-900">Boutique</a>
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

<!-- ========================================================================NAVBAR END================================================================================ -->    


<body class="bg-gray-100">
<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Liste des Médicaments</h1>
    <div id="medicaments-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Les cartes de médicaments seront affichées ici -->
    </div>
</div>


<!-- =====================================================================FOOTER========================================================================================= -->

<footer class="bg-green-900 py-12">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2">
                    <a href="../../View//client/medicament.php" class="text-white hover:text-gray-900 mx-3">Boutique</a>
                </div>
                <div class="text-center md:text-right md:order-1">
                    <p class="text-white">Pharmacy &copy; 2024.Tous droits reservés.</p>
                </div>
            </div>
        </div>
    </footer>

<!-- =====================================================================FOOTER END===================================================================================== -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/MVC-Pharmacie/Controller/medicamentController.php?action=lister',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    let html = '';
                    data.forEach(function(medicament) {
                        html += '<div class="bg-white p-4 rounded shadow">';
                        if (medicament.photo) {
                            html += '<img src="../../../MVC-Pharmacie/uploads/' + medicament.photo + '" alt="' + medicament.nom + '" class="w-full h-80 object-cover mb-4">';
                        }
                        html += '<h3 class="text-xl font-bold text-gray-800 mb-4">' + medicament.nom + '</h3>';
                        html += '<p class="text-gray-600 mb-4">' + medicament.prix + ' Ar</p>';
                        html += '<div class="flex justify-between">';
                        html += '<a href="' + medicament.id + '" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4">Ajouter au panier</a>';
                        html += '</div>';
                        html += '</div>';
                    });
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

