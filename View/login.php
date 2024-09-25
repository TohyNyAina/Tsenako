<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var role = document.getElementById('role').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (role == "" || email == "" || password == "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <!-- =================================================================NAVBAR============================================================================= -->
    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Navbar gauche -->
            <div class="flex items-center space-x-3">
                <img src="../../../../Tsenako/assets/img/tsenako1.png" alt="Samsung Logo" class="h-12">
                <a href="../index.php" class="text-gray-600 hover:text-gray-900">Boutique</a>
            </div>

            <!-- Navbar droite -->
            <div class="flex items-center space-x-3">
                <!--Bouton Deconnexion-->
                <a href="../../../Tsenako/View/login.php" class="btn bg-blue-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                    Connexion
                </a>
            </div>
        </div>
    </header> <br><br>
    <!-- =================================================================NAVBAR END ========================================================================= -->

    <div class="bg-gray-100">
        <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
            <div class="container mx-auto mt-5">
                <br><br>
                <form action="../../Tsenako/Controller/utilisateurController.php?action=connecter" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" class="bg-white p-6 rounded shadow-md">
                    <div class="mb-4">
                        <h1 class="block text-gray-700 font-bold mb-2">CONNEXION</h1> <br><br>
                        <label class="block text-gray-700 font-bold mb-2">Adresse Email</label>
                        <div class="relative">
                            <input
                                type="email"
                                name="email"
                                class="w-full px-3 py-2 border border-gray-300 rounded"
                                required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Mot de passe</label>
                        <div class="relative">
                            <input
                                type="password"
                                name="mdp"
                                class="w-full px-3 py-2 border border-gray-300 rounded"
                                required>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                        Se connecter
                    </button> <br> <br><br>
                    <p className="text-center text-sm text-gray-500">
                        Vous n'avez pas de compte?
                        <a className="underline" href="register.php">
                            S'inscrire
                        </a>
                    </p>
                </form>
            </div>
            <div class="container mx-auto py-4 px-4">
                <div class="relative bg-gray-200 p-4 rounded-md">
                    <img class="w-full rounded-md bg-gray-100" src="../../../Tsenako/assets/img/entana2.gif" alt="Image Description">
                    <!-- Overlay gris -->
                    <div class="absolute inset-0 bg-gray-100 opacity-30"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>