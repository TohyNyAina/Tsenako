<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Médicament</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Modifier un Médicament</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=lister" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mb-4 inline-block">Revenir à la liste des medicaments</a>
    <form action="../../MVC-Pharmacie/Controller/medicamentController.php?action=modifier&id=<?php echo htmlspecialchars($medicament['id']); ?>" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($medicament['id']); ?>">
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
            <input type="text" id="nom" name="nom" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['nom']); ?>">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Prix en Ariary:</label>
            <input type="number" id="prix" name="prix" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['prix']); ?>">
        </div>
        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 font-bold mb-2">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['categorie']); ?>">
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo htmlspecialchars($medicament['nombre']); ?>">
        </div>
        <div class="mb-4">
            <label for="ordonance" class="block text-gray-700 font-bold mb-2">Ordonance:</label>
            <select id="ordonance" name="ordonance" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="0" <?php if ($medicament['ordonance'] == 0) echo 'selected'; ?>>Non Obligatoire</option>
                <option value="1" <?php if ($medicament['ordonance'] == 1) echo 'selected'; ?>>Obligatoire</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo:</label>
            <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded">
            <?php if ($medicament['photo']): ?>
                <img src="../uploads/<?php echo htmlspecialchars($medicament['photo']); ?>" alt="<?php echo htmlspecialchars($medicament['nom']); ?>" class="mt-2 w-24 h-auto rounded">
            <?php endif; ?>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Modifier</button>
    </form>
</div>
</body>
</html>
