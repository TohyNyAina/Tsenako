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
        }
    </style>
</head>

<body class="bg-gray-100">
    
    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="images/logo.jpg" alt="Samsung Logo" class="h-12">
                <p>Pharmacy</p>
                <a href="#boutique" class="text-gray-600 hover:text-gray-900">Boutique</a>
                <div class="relative group">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Administration</a>
                    <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg">
                        <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Sub-link 1</a>
                        <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Sub-link 2</a>
                    </div>
                </div>
            </div>

            <!-- Navbar droite -->
            <div class="flex items-center space-x-3">
                <!--Bouton connexion-->
                <a href="#" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                </a>

                <!--Bouton panier-->
                <a href="#" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Premiere section -->
    <div class="max-w-[50rem] mx-auto ml-16 px-4 sm:px-6 lg:px-8">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
            <div>
                <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-4xl lg:leading-tight dark:text-white">Découvrez nos <span class="text-green-600">médicaments</span></h1>
                <p class="mt-3 text-lg text-gray-800 dark:text-neutral-400">Découvrez notre large gamme de produits pharmaceutiques de qualité, accessibles en quelques clics pour votre santé et votre bien-être.</p>
                
                <!-- Barre de recherche-->
                <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                    <div class="relative w-64">
                        <input type="text" placeholder="Rechercher médicament" class="py-2 px-4 pl-10 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-gray-400">
                                <circle cx="11" cy="11" r="8"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Image -->
            <div class="container mx-auto py-4 px-4">
                <div class="relative bg-gray-200 p-4 rounded-md">
                    <img class="w-full rounded-md bg-gray-100" src="images/e3fb905b81dab1170f6b7cda040a40dc.jpg" alt="Image Description">
                    <!-- Overlay gris -->
                    <div class="absolute inset-0 bg-gray-100 opacity-30"></div>
                </div>
            </div>
        </div> 
        <!-- End Grid -->
    </div>
    <!-- End Hero -->

    <!-- Deuxieme Section -->
    <section class="bg-white py-12 mt-12">
        <div class="container mx-auto px-6 text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Bienvenue dans notre pharmacie</h2>
            <p class="text-gray-600 mb-6">Nos points forts</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white-400 p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Equipe de professionnels</h3>
                    <p class="text-gray-600">Toujours prêts et toujours serviables, nos meilleurs spécialistes en soins prennent toutes les précautions pour vous assurer de recevoir les meilleurs soins possibles.</p>
                </div>
                <div class="bg-white-400 p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Aide d'urgence</h3>
                    <p class="text-gray-600">Notre ligne d'assistance d'urgence est disponible 24h/24 et 7j/7 pour vous fournir toute l'assistance dont vous pourriez avoir besoin en cas d'urgence.</p>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Footer -->
    <footer class="bg-green-900 py-12">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2">
                    <a href="#" class="text-white hover:text-gray-900 mx-3">Boutique</a>
                    <a href="#" class="text-white hover:text-gray-900 mx-3">Administration</a>
                    <a href="#" class="text-white hover:text-gray-900 mx-3">Contactez nous</a>
                </div>
                <div class="text-center md:text-right md:order-1">
                    <p class="text-white">Pharmacy &copy; 2024.Tous droits reservés.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
