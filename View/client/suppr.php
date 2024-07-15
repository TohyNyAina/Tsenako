<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    unset($_SESSION['panier'][$id]);
    header('Location: /MVC-Pharmacie/View/client/panier.php');
    exit();
}
