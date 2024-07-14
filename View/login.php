<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="../../MVC-Pharmacie/assets/css/login.css" rel="stylesheet">
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
<div id="rehetra">
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