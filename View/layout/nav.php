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
<body>
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../MVC-Pharmacie/assets/img/logo.jpg" alt="Samsung Logo" class="h-12">
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
                <a href="../../../../MVC-Pharmacie/View/client/panier.php" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                    </svg>
                </a>
            </div>
        </div>
    </header>
</body>
</html>
