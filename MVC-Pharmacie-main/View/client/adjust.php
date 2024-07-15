<?php
session_start();
require_once '../../Utils/DB.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $quantity = intval($_POST['quantity']);

    $db = new DB();
    $sql = "SELECT nom, nombre FROM medicament WHERE id = :id";
    $stmt = $db->ds->prepare($sql);
    $stmt->execute(['id' => $id]);
    $medicament = $stmt->fetch(PDO::FETCH_OBJ);

    if ($medicament && $quantity > $medicament->nombre) {
        $_SESSION['error'] = "Stock insuffisant pour le médicament {$medicament->nom}. Stock disponible : {$medicament->nombre}";
    } else {
        if ($quantity < 1) {
            unset($_SESSION['panier'][$id]);
        } else {
            $_SESSION['panier'][$id] = $quantity;
        }
    }
    header('Location: /MVC-Pharmacie/View/client/panier.php');
    exit();
}
