<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="../../MVC-Pharmacie/assets/css/register.css" rel="stylesheet">
    <script>
        function validateForm() {
            var nom = document.getElementById('nom').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (nom == "" || email == "" || password == "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<body>
    <h1>INSCRIPTION</h1>
    <!-- <a href="../Controller/utilisateurController.php?action=prem" class="btn btn-success mb-4">Revenir à la liste des medicaments</a> -->
    <form action="../Controller/utilisateurController.php?action=inscription" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="formulaire">
            <div class="nom">
                <input type="text"  name= "nom"  class="anatiny" required>
                <label for="nom">Nom Complet</label>
            </div>
            <br>
            <!-- <div class="nom">
                <input type="text"  name= "prenom" class="anatiny" required>
                <label for="prenom">Prenoms</label>
            </div> -->
            <br>
            <div class="nom">
                <input type="email"  name= "email" class="anatiny" required>
                <label for="email">Email</label>
            </div>
            <br>
            <div class="nom">
                <input type="password" name= "mdp" class="anatiny" required>
                <label for="password">Mot de passe</label>
            </div>
            <br>
            <div class="nom">
                <input type="password"  name="confirmer" class="anatiny" required>
                <label for="password">Confirmer votre mot de passe</label>
            </div>
            <input type="submit" value="S'inscrire" class="btn">
          
        </div>
    </form>
    
</body>
</html>