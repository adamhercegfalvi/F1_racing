<?php

$uzenet_visszajelzes = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nev = trim($_POST['nev'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $uzenet = trim($_POST['uzenet'] ?? '');

    if ($nev != "" && filter_var($email, FILTER_VALIDATE_EMAIL) && $uzenet != "") {

        try {
            $db = new PDO(
                "mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4",
                "root",
                ""
            );

            $sql = "INSERT INTO uzenetek (nev, email, uzenet) VALUES (?, ?, ?)";
            $lekerdezes = $db->prepare($sql);
            $lekerdezes->execute([$nev, $email, $uzenet]);

            $uzenet_visszajelzes = "Az üzenetet sikeresen elküldted!";

        } catch (PDOException $e) {
            $uzenet_visszajelzes = "Hiba történt az üzenet mentésekor!";
        }

    } else {
        $uzenet_visszajelzes = "Kérlek, töltsd ki helyesen az összes mezőt!";
    }
}

if (!empty($_SESSION['login'])) {
    $db = new PDO(
        "mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4",
        "root",
        ""
    );

    $sql = "SELECT * FROM uzenetek ORDER BY datum DESC, id DESC";
    $uzenetek = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


?>
