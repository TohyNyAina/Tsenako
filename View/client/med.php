<?php

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!isset($_SESSION['panier'])) $_SESSION['panier'] = [];
    if (array_key_exists($id, $_SESSION['panier'])) {
        $_SESSION['panier'][$id]++;
    }
    else $_SESSION['panier'][$id] = 1;
    header('Location: /MVC-Pharmacie/View/client/medicament.php');
    exit();
}