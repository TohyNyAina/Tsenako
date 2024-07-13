<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="../../MVC-Pharmacie/assets/css/bootstrap.css" rel="stylesheet">
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
<div class="container mt-5">
    <h1 class="text-center mb-5">Connexion</h1>
    <a href="../Controller/utilisateurController.php?action=prem" class="btn btn-success mb-4">Revenir à la liste des medicaments</a>
    <form action="../Controller/utilisateurController.php?action=Connexion" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="nom">Role:</label>
            <input type="text" id="role" name="role" class="form-control">
        </div>
        <div class="form-group">
            <label for="prix">Email:</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="categorie">Password:</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
</div>
</body>
</html>