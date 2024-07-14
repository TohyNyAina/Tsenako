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
    <h1>INSCRIPTION</h1>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            <?php if ($_GET['error'] == 'password_mismatch'): ?>
                Les mots de passe ne correspondent pas.
            <?php elseif ($_GET['error'] == 'email_used'): ?>
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
