
<?php
$pilota = null;

if (!empty($_SESSION['login']) && isset($_GET['az'])) {
    try {
        $dbh = new PDO(
            'mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        // Módosított adatok mentése
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $sql = "UPDATE pilota
                    SET nev = ?, nem = ?, szuldat = ?, nemzet = ?
                    WHERE az = ?";

            $sth = $dbh->prepare($sql);

            $sth->execute(array(
                trim($_POST['nev']),
                $_POST['nem'],
                $_POST['szuldat'] ?: null,
                trim($_POST['nemzet']),
                $_GET['az']
            ));

            $uzenet = "A pilóta adatai sikeresen módosítva!";
        }

        // Pilóta adatainak lekérése
        $sql = "SELECT * FROM pilota WHERE az = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_GET['az']));

        $pilota = $sth->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $hiba = "Hiba történt a pilóta adatainak kezelésekor.";
    }
}
?>
