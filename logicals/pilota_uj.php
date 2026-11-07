<?php
if (!empty($_SESSION['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $az = $_POST['az'];
    $nev = trim($_POST['nev']);
    $nem = $_POST['nem'];
    $szuldat = $_POST['szuldat'] ?: null;
    $nemzet = trim($_POST['nemzet']);

    if ($az === '' || $nev === '') {
        $hiba = "Az azonosító és a név megadása kötelező.";
    } else {
        try {
            $dbh = new PDO(
                'mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4',
                'root',
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );

            $sql = "INSERT INTO pilota (az, nev, nem, szuldat, nemzet)
                    VALUES (?, ?, ?, ?, ?)";

            $sth = $dbh->prepare($sql);
            $sth->execute(array($az, $nev, $nem, $szuldat, $nemzet));

            $uzenet = "A pilóta sikeresen hozzáadva!";

        } catch (PDOException $e) {
            error_log($e->getMessage());
            $hiba = "Nem sikerült menteni a pilótát. Ellenőrizd az azonosítót!";
        }
    }
}
?>
