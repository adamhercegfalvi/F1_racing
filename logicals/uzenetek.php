
<?php

$uzenetek = array();

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
