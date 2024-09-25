<?php
include_once '../Tsenako/View/layout/nav.php';
?>

<?php
include_once '../Tsenako/View/client/acceuil.php';
?>

<!-- Troisieme section ou il y a les produits-->
<section class="bg-gray-100 py-12" id="boutique">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-purple-600 mb-6">Nos Produits</h2>

        <div class="flex justify-center mb-5">
            <input type="text" id="search-bar" class="border border-gray-300 rounded p-2 w-full md:w-1/2" placeholder="Rechercher un produit...">
        </div>
       
        <div id="produits-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Les cartes de produit seront affichées ici -->
        </div>

    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
            function fetchProduits(query = '') {
                $.ajax({
                    url: '/Tsenako/Controller/produitController.php?action=search',
                    method: 'GET',
                    data: { query: query },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length > 0) {
                            let html = '';
                            data.forEach(function(produit) {
                                html += '<div class="bg-white p-4 rounded shadow">';
                                if (produit.photo) {
                                    html += '<img src="../../../Tsenako/uploads/' + produit.photo + '" alt="' + produit.nom + '" class="w-full h-80 object-cover mb-4">';
                                }
                                html += '<h3 class="text-xl font-bold text-gray-800 mb-4">' + produit.nom + '</h3>';
                                html += '<p class="text-gray-600 mb-4">' + produit.prix + ' Ar</p>';
                                html += '<div class="flex justify-between">';
                                html += '<a href="../../../Tsenako/View/login.php" class="btn bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded mb-4">Veuillez vous connecter pour acheter</a>';
                                html += '</div>';
                                html += '</div>';
                            });
                            $('#produits-list').html(html);
                        } else {
                            $('#produits-list').html('<p class="text-center">Aucun produit trouvé.</p>');
                        }
                    },
                    error: function() {
                        $('#produits-list').html('<p>Une erreur est survenue lors du chargement des produitss.</p>');
                    }
                });
            }

            $('#search-bar').on('input', function() {
                let query = $(this).val();
                fetchProduits(query);
            });

            // Fetch all produits initially
            fetchProduits();
        });

    function confirmDeletion(event, url) {
        event.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
            window.location.href = url;
        }
    }
</script>

<?php
include_once '../Tsenako/View/layout/client/clientFooter.php';
?>