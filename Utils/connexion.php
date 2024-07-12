<?php
    //connexion a la base de données
    $con = mysqli_connect("localhost","root","","pharmacie");
    if(!$con){
        echo "Vous n'etes pas connecté à le base de donnée";
    }
?>