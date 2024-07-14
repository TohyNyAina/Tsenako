<?php 
include_once '../MVC-Pharmacie/View/layout/client/clientNavbar.php'
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-7">
                <!-- Product 1 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/ibu.jpg" alt="Product 1" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Ibuprofene</h3>
                    <p class="text-gray-600 mb-2">5000Ar</p>
                </div>

                <!-- Product 2 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/Busulfan-Fresenius-Kabi-6mgml.jpg" alt="Product 2" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Busulfan Fresenius</h3>
                    <p class="text-gray-600 mb-4">30.000Ar</p>
                </div>

                <!-- Product 3 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/doli.jpg" alt="Product 3" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Doliprane</h3>
                    <p class="text-gray-600 mb-4">10.000Ar</p>
                </div>

                <!-- Product 4 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/rhina.jpg" alt="Product 4" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">RhinaToux</h3>
                    <p class="text-gray-600 mb-4">20.000Ar</p>
                </div>

                <!-- Product 5 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/motrin-gels-fr.png" alt="Product 5" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Motrin</h3>
                    <p class="text-gray-600 mb-2">10.000Ar</p>
                </div>

                <!-- Product 6 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/pack_3d_dalfeine_-_new_upsa_logo.png" alt="Product 6" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Dalfeine</h3>
                    <p class="text-gray-600 mb-4">40.000Ar</p>
                </div>

                <!-- Product 7 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/prospan.jpg" alt="Product 7" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Prospan</h3>
                    <p class="text-gray-600 mb-4">50.000Ar</p>
                </div>

                <!-- Product 8 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/panadol.jpg" alt="Product 8" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Panadol</h3>
                    <p class="text-gray-600 mb-4">26.000Ar</p>
                </div>

                <!-- Product 9 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/vitonic.png" alt="Product 9" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Vitonic</h3>
                    <p class="text-gray-600 mb-2">25.000Ar</p>
                </div>

                <!-- Product 10 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/amoxicilline-ac-clavulanique-viatris-500-mg-625-mg-adulte-cp.png" alt="Product 10" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Amoxicilline</h3>
                    <p class="text-gray-600 mb-4">20.000Ar</p>
                </div>

                <!-- Product 11 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/rhinite.jpg" alt="Product 11" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Rhinite</h3>
                    <p class="text-gray-600 mb-4">30.000Ar</p>
                </div>

                <!-- Product 12 -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="images/helicidine.jpg" alt="Product 12" class="w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Helicidine</h3>
                    <p class="text-gray-600 mb-4">25.000Ar</p>
                </div>
            </div>
        </div>
    </section>

<?php 
include_once '../MVC-Pharmacie/View/layout/client/clientFooter.php';
?>   
