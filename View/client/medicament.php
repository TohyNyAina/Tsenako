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
    <?php if ($user_logged_in): ?>
        <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=deconnecter" class="btn btn-danger mb-4">Déconnexion</a>
    <?php else: ?>
        <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=login" class="btn btn-secondary mb-4">Connexion</a>
        <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=sign" class="btn btn-primary mb-4">Inscription</a>
    <?php endif; ?>
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
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Aucun médicament trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
