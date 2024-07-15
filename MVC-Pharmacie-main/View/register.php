<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="../../MVC-Pharmacie/assets/css/register.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var nom = document.getElementById('nom').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmer = document.getElementById('confirmer').value;

            if (nom == "" || email == "" || password == "" || confirmer == "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }

            if (password !== confirmer) {
                alert("Les mots de passe ne correspondent pas.");
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
    </header> <br><br><br><br><br>
    <!-- =================================================================NAVBAR END ========================================================================= -->

    <h1>INSCRIPTION</h1>
    <?php if (isset($_GET['error'])) : ?>
        <div class="alert alert-danger">
            <?php if ($_GET['error'] == 'password_mismatch') : ?>
                Les mots de passe ne correspondent pas.
            <?php elseif ($_GET['error'] == 'email_used') : ?>
                Cet email est déjà utilisé.
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <form action="../../MVC-Pharmacie/Controller/utilisateurController.php?action=inscrire" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="formulaire">
            <div class="nom">
                <input type="text" id="nom" name="nom" class="anatiny" required>
                <label for="nom">Nom Complet</label>
            </div>
            <br>
            <div class="nom">
                <input type="email" id="email" name="email" class="anatiny" required>
                <label for="email">Email</label>
            </div>
            <br>
            <div class="nom">
                <input type="password" id="password" name="mdp" class="anatiny" required>
                <label for="password">Mot de passe</label>
            </div>
            <br>
            <div class="nom">
                <input type="password" id="confirmer" name="confirmer" class="anatiny" required>
                <label for="confirmer">Confirmer votre mot de passe</label>
            </div>
            <input type="submit" value="S'inscrire" class="btn">
        </div>
    </form>

</body>

</html>