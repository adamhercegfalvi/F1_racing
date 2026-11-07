
<?php
$uzenet = "A törlés nem sikerült.";

if (!empty($_SESSION['login']) &&
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['az']) &&
    ctype_digit((string)$_POST['az'])) {

    try {
        $dbh = new PDO(
            'mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $sql = "DELETE FROM pilota WHERE az = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_POST['az']));

        if ($sth->rowCount() > 0) {
            $uzenet = "A pilóta sikeresen törölve!";
        } else {
            $uzenet = "A pilóta nem található.";
        }

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $uzenet = "Nem sikerült törölni a pilótát. Lehet, hogy versenyeredmény tartozik hozzá.";
    }
}
?>
