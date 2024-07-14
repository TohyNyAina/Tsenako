<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Médicaments</title>
    <link href="../../../MVC-Pharmacie/assets/css/bootstrap.css" rel="stylesheet">
    <script>
        function confirmDeletion(event, url) {
            event.preventDefault();
            if (confirm("Voulez-vous vraiment supprimer cet article ?")) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-5">Liste des Médicaments</h1>
    <a href="../../MVC-Pharmacie/Controller/medicamentController.php?action=add" class="btn btn-success mb-4">Ajouter un Médicament</a>
    <div id="medicaments-list">
    
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/MVC-Pharmacie/Controller/medicamentController.php?action=lister',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    let html = '<table class="table table-bordered"><thead><tr><th>Nom</th><th>Prix en Ariary</th><th>Catégorie</th><th>Nombre</th><th>Ordonance</th><th>Photo</th><th>Actions</th></tr></thead><tbody>';
                    data.forEach(function(medicament) {
                        html += '<tr>';
                        html += '<td>' + medicament.nom + '</td>';
                        html += '<td>' + medicament.prix + ' Ar</td>';
                        html += '<td>' + medicament.categorie + '</td>';
                        html += '<td>' + medicament.nombre + '</td>';
                        html += '<td>' + medicament.ordonance + '</td>';
                        if (medicament.photo) {
                            html += '<td><img src="../../../MVC-Pharmacie/uploads/' + medicament.photo + '" alt="' + medicament.nom + '" class="img-thumbnail" width="50"></td>';
                        } else {
                            html += '<td></td>';
                        }
                        html += '<td>';
                        html += '<a href="../../../MVC-Pharmacie/Controller/medicamentController.php?action=edit&id=' + medicament.id + '" class="btn btn-warning">Modifier</a> ';
                        html += '<a href="#" onclick="confirmDeletion(event, \'../../../MVC-Pharmacie/Controller/medicamentController.php?action=supprimer&id=' + medicament.id + '\')" class="btn btn-danger">Supprimer</a>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    html += '</tbody></table>';
                    $('#medicaments-list').html(html);
                } else {
                    $('#medicaments-list').html('<p class="text-center">Aucun médicament trouvé.</p>');
                }
            },
            error: function() {
                $('#medicaments-list').html('<p>Une erreur est survenue lors du chargement des médicaments.</p>');
            }
        });
    });

    function confirmDeletion(event, url) {
        event.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')) {
            window.location.href = url;
        }
    }
</script>
</body>
</html>
