<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    if ($_SESSION['panier'][$id] < 1) unset($_SESSION['panier'][$id]);
    else $_SESSION['panier'][$id] -= 1;
    header('Location: /MVC-Pharmacie/View/client/panier.php');
    exit();
}