<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Médicaments</title>
    <link href="../../../MVC-Pharmacie/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-5">Liste des Médicaments</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=add" class="btn btn-success mb-4">Ajouter un Médicament</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix en Ariary</th>
                <th>Catégorie</th>
                <th>Nombre</th>
                <th>Ordonance</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($medicaments) && is_array($medicaments)): ?>
                <?php foreach ($medicaments as $medicament): ?>
                <tr>
                    <td><?php echo htmlspecialchars($medicament['nom']); ?></td>
                    <td><?php echo htmlspecialchars($medicament['prix']); ?> Ar</td>
                    <td><?php echo htmlspecialchars($medicament['categorie']); ?></td>
                    <td><?php echo htmlspecialchars($medicament['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($medicament['ordonance']); ?></td>
                    <td>
                        <?php if ($medicament['photo']): ?>
                            <img src="../uploads/<?php echo htmlspecialchars($medicament['photo']); ?>" alt="<?php echo htmlspecialchars($medicament['nom']); ?>" class="img-thumbnail" width="50">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=edit&id=<?php echo $medicament['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=supprimer&id=<?php echo $medicament['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Aucun médicament trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
