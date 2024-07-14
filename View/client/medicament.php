<?php
include_once '../layout/client/clientNavbar.php';
?>

<?php 
include_once '../client/acceuil.php';
?>

<body class="bg-gray-100">
<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-bold mb-5">Liste des Médicaments</h1>
    <?php if ($user_logged_in): ?>
        <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=deconnecter" class="btn btn-danger mb-4">Déconnexion</a>
    <?php else: ?>
        <div class="flex justify-center space-x-4 mb-4">
            <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=login" class="btn btn-secondary">Connexion</a>
            <a href="../../../MVC-Pharmacie/Controller/utilisateurController.php?action=sign" class="btn btn-primary">Inscription</a>
        </div>
    <?php endif; ?>
    <div id="medicaments-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Les cartes de médicaments seront affichées ici -->
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
                    let html = '';
                    data.forEach(function(medicament) {
                        html += '<div class="bg-white p-4 rounded shadow">';
                        if (medicament.photo) {
                            html += '<img src="../../../MVC-Pharmacie/uploads/' + medicament.photo + '" alt="' + medicament.nom + '" class="w-full h-80 object-cover mb-4">';
                        }
                        html += '<h3 class="text-xl font-bold text-gray-800 mb-4">' + medicament.nom + '</h3>';
                        html += '<p class="text-gray-600 mb-4">' + medicament.prix + ' Ar</p>';
                        html += '<div class="flex justify-between">';
                        html += '<a href="' + medicament.id + '" class="btn btn-warning">Ajouter au panier</a>';
                        html += '</div>';
                        html += '</div>';
                    });
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
<?php
include_once '../layout/client/clientFooter.php';
?>
