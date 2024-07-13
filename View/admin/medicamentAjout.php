<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Médicament</title>
    <link href="../../../MVC-Pharmacie/assets/css/bootstrap.css" rel="stylesheet">
    <script>
        function validateForm() {
            var nom = document.getElementById('nom').value;
            var prix = document.getElementById('prix').value;
            var categorie = document.getElementById('categorie').value;
            var nombre = document.getElementById('nombre').value;
            var ordonance = document.getElementById('ordonance').value;
            var photo = document.getElementById('photo').value;

            if (nom == "" || prix == "" || categorie == "" || nombre == "" || ordonance == "" || photo == "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-5">Ajouter un Médicament</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=lister" class="btn btn-success mb-4">Revenir à la liste des medicaments</a>
    <form action="../../MVC-Pharmacie/Controller/medicamentController.php?action=inserer" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="form-group">
            <label for="prix">Prix en Ariary:</label>
            <input type="number" id="prix" name="prix" class="form-control">
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="ordonance">Ordonance:</label>
            <select id="ordonance" name="ordonance" class="form-control">
                <option value="0">Non Obligatoire</option>
                <option value="1">Obligatoire</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</body>
</html>
