<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Médicament</title>
    <link href="../../../MVC-Pharmacie/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-5">Modifier un Médicament</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=lister" class="btn btn-success mb-4">Revenir à la liste des medicaments</a>
    <form action="../../MVC-Pharmacie/Controller/medicamentController.php?action=modifier&id=<?php echo htmlspecialchars($medicament['id']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($medicament['id']); ?>">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo htmlspecialchars($medicament['nom']); ?>">
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" class="form-control" value="<?php echo htmlspecialchars($medicament['categorie']); ?>">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="number" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($medicament['nombre']); ?>">
        </div>
        <div class="form-group">
            <label for="ordonance">Ordonance:</label>
            <select id="ordonance" name="ordonance" class="form-control">
                <option value="0" <?php if ($medicament['ordonance'] == 0) echo 'selected'; ?>>Non Obligatoire</option>
                <option value="1" <?php if ($medicament['ordonance'] == 1) echo 'selected'; ?>>Obligatoire</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" class="form-control">
            <?php if ($medicament['photo']): ?>
                <img src="../uploads/<?php echo htmlspecialchars($medicament['photo']); ?>" alt="<?php echo htmlspecialchars($medicament['nom']); ?>" class="img-thumbnail mt-2" width="100">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
</body>
</html>
