<?php

$uzenet_visszajelzes = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nev = trim($_POST['nev'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $uzenet = trim($_POST['uzenet'] ?? '');
    $felado = !empty($_SESSION['login'])? $_SESSION['login']: 'Vendég';

    if ($nev != "" && filter_var($email, FILTER_VALIDATE_EMAIL) && $uzenet != "") {

        try {
            $db = new PDO(
                "mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4",
                "root",
                ""
            );

            $sql = "INSERT INTO uzenetek (nev, email, uzenet) VALUES (?, ?, ?)";
            $lekerdezes = $db->prepare($sql);
            $lekerdezes->execute([$felado, $email, $uzenet]);

            $uzenet_visszajelzes = "Az üzenetet sikeresen elküldted!";

        } catch (PDOException $e) {
            $uzenet_visszajelzes = "Hiba történt az üzenet mentésekor!";
        }

    } else {
        $uzenet_visszajelzes = "Kérlek, töltsd ki helyesen az összes mezőt!";
    }
}

?>
