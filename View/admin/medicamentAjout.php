<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Médicament</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Ajouter un Médicament</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=lister" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4 inline-block">Revenir à la liste des medicaments</a>
    <form action="../../MVC-Pharmacie/Controller/medicamentController.php?action=inserer" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
            <input type="text" id="nom" name="nom" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Prix en Ariary:</label>
            <input type="number" id="prix" name="prix" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 font-bold mb-2">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="ordonance" class="block text-gray-700 font-bold mb-2">Ordonance:</label>
            <select id="ordonance" name="ordonance" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="0">Non Obligatoire</option>
                <option value="1">Obligatoire</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo:</label>
            <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Ajouter</button>
    </form>
</div>
</body>
</html>
