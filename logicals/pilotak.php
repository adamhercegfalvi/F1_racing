
<?php
$pilotak = [];

try {
    // Kapcsolódás az F1-es adatbázishoz
    $dbhF1 = new PDO(
        'mysql:host=localhost;dbname=f1_racing_db;charset=utf8mb4',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    // Pilóták lekérdezése név szerint
    $sql = "SELECT az, nev, nem, szuldat, nemzet
            FROM pilota
            ORDER BY nev ASC";

    $sth = $dbhF1->query($sql);

    // Az összes eredmény eltárolása egy tömbben
    $pilotak = $sth->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log($e->getMessage());
    $adatbazisHiba = "Nem sikerült lekérni a pilótákat.";
}
?>
