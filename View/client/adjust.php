<?php
session_start();
require_once '../../Utils/DB.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $quantity = intval($_POST['quantity']);

    $db = new DB();
    $sql = "SELECT nom, nombre FROM produit WHERE id = :id";
    $stmt = $db->ds->prepare($sql);
    $stmt->execute(['id' => $id]);
    $medicament = $stmt->fetch(PDO::FETCH_OBJ);

    if ($quantity < 0) {
        $_SESSION['error'] = "La quantité ne peut pas être négative.";
    } elseif ($medicament && $quantity > $medicament->nombre) {
        $_SESSION['error'] = "Stock insuffisant pour le produit {$medicament->nom}. Stock disponible : {$medicament->nombre}";
    } else {
        if ($quantity < 1) {
            unset($_SESSION['panier'][$id]);
        } else {
            $_SESSION['panier'][$id] = $quantity;
        }
    }
    header('Location: /Tsenako/View/client/panier.php');
    exit();
}
