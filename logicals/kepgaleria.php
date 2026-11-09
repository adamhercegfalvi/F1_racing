<?php

if (isset($_SESSION['login']) && isset($_POST['feltoltes'])) {

    if (isset($_FILES['kep']) && $_FILES['kep']['error'] === UPLOAD_ERR_OK) {

        $kep = $_FILES['kep'];

        $maxMeret = 5 * 1024 * 1024;

        if ($kep['size'] > $maxMeret) {
            $hiba = "A kép legfeljebb 5 MB lehet.";
        } else {

            $tipus = mime_content_type($kep['tmp_name']);

            $engedelyezett = array(
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
                'image/gif' => 'gif'
            );

            if (!isset($engedelyezett[$tipus]) ||
                getimagesize($kep['tmp_name']) === false) {

                $hiba = "Csak JPG, PNG, WEBP vagy GIF képet tölthetsz fel.";

            } else {

                $kiterjesztes = $engedelyezett[$tipus];

                $fajlnev = bin2hex(random_bytes(16)) . "." . $kiterjesztes;

                $cel = __DIR__ . "/../images/galeria/" . $fajlnev;

                if (move_uploaded_file($kep['tmp_name'], $cel)) {
                    $siker = "A kép sikeresen feltöltve!";
                } else {
                    $hiba = "Nem sikerült elmenteni a képet.";
                }
            }
        }

    } else {
        $hiba = "Nem sikerült a fájl feltöltése.";
    }
}

$kepek = glob(__DIR__ . "/../images/galeria/*.{jpg,jpeg,png,webp,gif}", GLOB_BRACE);
?>
