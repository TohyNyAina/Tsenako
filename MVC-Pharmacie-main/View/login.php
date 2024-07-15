<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="../../MVC-Pharmacie/assets/css/login.css" rel="stylesheet">
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
                <img src="../../../../MVC-Pharmacie/assets/img/logo.jpg" alt="Samsung Logo" class="h-12">
                <p>Pharmacy</p>
                <a href="../index.php" class="text-gray-600 hover:text-gray-900">Boutique</a>
            </div>

            <!-- Navbar droite -->
            <div class="flex items-center space-x-3">
                <!--Bouton Deconnexion-->
                <a href="../../../MVC-Pharmacie/View/login.php" class="btn bg-blue-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                    Connexion
                </a>
            </div>
        </div>
    </header> <br><br>
    <!-- =================================================================NAVBAR END ========================================================================= -->

    <div id="rehetra">
        <br><br>
        <h1>Connexion</h1>
        <!-- <a href="../Controller/utilisateurController.php?action=prem" class="btn btn-success mb-4">Revenir à la liste des medicaments</a> -->
        <form action="../../MVC-Pharmacie/Controller/utilisateurController.php?action=connecter" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="boite">
                <input type="email" name="email" class="case" required>
                <label for="nom">Adresse Email</label>
            </div>
            <div class="boite">
                <input type="password" name="mdp" class="case" required>
                <label for="passe">Mot de passe</label>
            </div>
            <div class="seconnecter">
                <input type="submit" value="Se connecter" class="btn" id="btn">
            </div>

        </form>
        <div class="sinscrire">
            <a href="register.php"><input type="submit" value="S'inscrire" class="btn"></a>
        </div>

    </div>
</body>

</html>