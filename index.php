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

        <!-- Produits -->
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-7">
            
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/ibu.jpg" alt="Product 1" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Ibuprofene</h3>
                    <p class="text-gray-600 mb-2">5000Ar</p>
                </div>
                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/Busulfan-Fresenius-Kabi-6mgml.jpg" alt="Product 2" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Busulfan Fresenius</h3>
                    <p class="text-gray-600 mb-4">30.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/doli.jpg" alt="Product 3" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Doliprane</h3>
                    <p class="text-gray-600 mb-4">10.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/rhina.jpg" alt="Product 4" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">RhinaToux</h3>
                    <p class="text-gray-600 mb-4">20.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/motrin-gels-fr.png" alt="Product 5" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Motrin</h3>
                    <p class="text-gray-600 mb-2">10.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/pack_3d_dalfeine_-_new_upsa_logo.png" alt="Product 6" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Dalfeine</h3>
                    <p class="text-gray-600 mb-4">40.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/prospan.jpg" alt="Product 7" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Prospan</h3>
                    <p class="text-gray-600 mb-4">50.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/panadol.jpg" alt="Product 8" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Panadol</h3>
                    <p class="text-gray-600 mb-4">26.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/vitonic.png" alt="Product 9" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Vitonic</h3>
                    <p class="text-gray-600 mb-2">25.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/amoxicilline-ac-clavulanique-viatris-500-mg-625-mg-adulte-cp.png" alt="Product 10" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Amoxicilline</h3>
                    <p class="text-gray-600 mb-4">20.000Ar</p>
                </div>

                
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/rhinite.jpg" alt="Product 11" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Rhinite</h3>
                    <p class="text-gray-600 mb-4">30.000Ar</p>
                </div>

            
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/helicidine.jpg" alt="Product 12" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Helicidine</h3>
                    <p class="text-gray-600 mb-4">25.000Ar</p>
                </div>
            </div> -->

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
                        html += '<a href="../../../MVC-Pharmacie/View/login.php"' + medicament.id + '"class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4">Veuillez vous connecter</a>';
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