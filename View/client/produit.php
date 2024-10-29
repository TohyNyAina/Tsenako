<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
    header('Location: ../../index.php');
    exit();
}

// Calcul du nombre total d'articles dans le panier
$totalItems = 0;
if (isset($_SESSION['panier'])) {
    $totalItems = array_sum($_SESSION['panier']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsenako</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            padding-top: 76px;
        }

        .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 0.5rem;
            font-size: 0.75rem;
        }
    </style>
</head>

<header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="../../../../Tsenako/assets/img/Tsenako1.png" alt="Samsung Logo" class="h-12">
        </div>

        <div class="flex items-center space-x-3">
            <div class="relative">
                <a href="../../../../Tsenako/View/client/panier.php" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart">
                        <circle cx="8" cy="21" r="1" />
                        <circle cx="19" cy="21" r="1" />
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                    </svg>
                    <?php if ($totalItems > 0): ?>
                        <span class="badge"><?= $totalItems ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <a href="../../../Tsenako/Controller/utilisateurController.php?action=deconnecter" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                Deconnexion
            </a>
        </div>
    </div>
</header>

<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Liste des Produits</h1>
    
    <!-- Barre de recherche -->
    <div class="flex justify-center mb-4">
        <input type="text" id="search-bar" class="w-1/3 px-3 py-2 border border-gray-300 rounded" placeholder="Rechercher un produit">
    </div>
    
    <a href="../../Tsenako/Controller/produitController.php?action=add" class="btn bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded mb-4">Ajouter un Produit</a>
    
    <!-- Conteneur pour la liste des produits -->
    <div id="produits-list"></div>

    <!-- Pagination -->
    <div id="pagination" class="flex justify-center mt-4 space-x-2"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        loadProduits();

        // Recherche et pagination
        $('#search-bar').on('input', function() {
            loadProduits();
        });
    });

    // Fonction pour charger les produits
    function loadProduits(page = 1) {
        const search = $('#search-bar').val();
        $.ajax({
            url: '/Tsenako/Controller/produitController.php?action=lister',
            method: 'GET',
            data: { search: search, page: page, limit: 9 },
            dataType: 'json',
            success: function(response) {
                let html = '';
                
                if (response.data.length > 0) {
                    html += '<div class="overflow-x-auto"><table class="min-w-full bg-white"><thead><tr><th class="py-2 px-4 border-b">N°</th><th class="py-2 px-4 border-b">Nom</th><th class="py-2 px-4 border-b">Prix en Ariary</th><th class="py-2 px-4 border-b">Catégorie</th><th class="py-2 px-4 border-b">Nombre</th><th class="py-2 px-4 border-b">Photo</th><th class="py-2 px-4 border-b">Actions</th></tr></thead><tbody>';
                    
                    response.data.forEach(function(produit) {
                        html += `<tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">${produit.id}</td>
                                    <td class="py-2 px-4 border-b">${produit.nom}</td>
                                    <td class="py-2 px-4 border-b">${produit.prix} Ar</td>
                                    <td class="py-2 px-4 border-b">${produit.categorie}</td>
                                    <td class="py-2 px-4 border-b">${produit.nombre}</td>
                                    <td class="py-2 px-4 border-b">${produit.photo ? `<img src="../../../Tsenako/uploads/${produit.photo}" alt="${produit.nom}" class="w-12 h-12 object-cover rounded">` : ''}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="../../../Tsenako/Controller/produitController.php?action=edit&id=${produit.id}" class="btn bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2">Modifier</a>
                                        <a href="#" onclick="confirmDeletion(event, '../../../Tsenako/Controller/produitController.php?action=supprimer&id=${produit.id}')" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Supprimer</a>
                                    </td>
                                  </tr>`;
                    });
                    html += '</tbody></table></div>';
                } else {
                    html = '<p class="text-center">Aucun produit trouvé.</p>';
                }
                
                $('#produits-list').html(html);
                
                // Mise à jour de la pagination
                let paginationHtml = '';
                for (let i = 1; i <= response.totalPages; i++) {
                    paginationHtml += `<button onclick="loadProduits(${i})" class="px-3 py-1 border rounded ${i === page ? 'bg-blue-500 text-white' : 'bg-white text-blue-500'}">${i}</button>`;
                }
                $('#pagination').html(paginationHtml);
            },
            error: function() {
                $('#produits-list').html('<p>Une erreur est survenue lors du chargement des produits.</p>');
            }
        });
    }
    
    function confirmDeletion(event, url) {
        event.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
            window.location.href = url;
        }
    }
</script>
</body>

</html>
