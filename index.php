<?php
include_once '../MVC-Pharmacie/View/layout/nav.php';
?>

<?php
include_once '../MVC-Pharmacie/View/client/acceuil.php';
?>

<!-- Troisieme section ou il y a les produits-->
<section class="bg-gray-100 py-12" id="boutique">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-green-600 mb-6">Nos Produits</h2>

        <!--Filtrage-->
        <div class="container mx-auto py-4 px-4">
            <div class="flex justify-center space-x-4">
                <button class="py-2 px-4 rounded-lg font-semibold text-gray-700 hover:bg-green-600 hover:text-white focus:outline-none active">Tout</button>
                <button class="py-2 px-4 rounded-lg font-semibold text-gray-700 hover:bg-green-600 hover:text-white focus:outline-none">Comprimés</button>
                <button class="py-2 px-4 rounded-lg font-semibold text-gray-700 hover:bg-green-600 hover:text-white focus:outline-none">Sirops</button>
                <button class="py-2 px-4 rounded-lg font-semibold text-gray-700 hover:bg-green-600 hover:text-white focus:outline-none">Gélules</button>
            </div>
        </div>

       
        <div id="medicaments-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Les cartes de médicaments seront affichées ici -->
        </div>

    </div>
</section>
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
                        html += '<a href="../../../MVC-Pharmacie/View/login.php"' + medicament.id + '"class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4">Veuillez vous connecter pour acheter</a>';
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

<?php
include_once '../MVC-Pharmacie/View/layout/client/clientFooter.php';
?>