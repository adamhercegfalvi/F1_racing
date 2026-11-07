
<?php
include('./includes/config.inc.php');

// Az URL alapján kiválasztjuk az oldalt
$oldal = explode('&', $_SERVER['QUERY_STRING'])[0];

if ($oldal != "") {
    if (isset($oldalak[$oldal]) &&
        file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {

        $keres = $oldalak[$oldal];

    } else {
        $keres = $hiba_oldal;
        header("HTTP/1.0 404 Not Found");
    }
} else {
    $keres = $oldalak['/'];
}

// Pilóták listázása
if ($keres['fajl'] === 'pilotak') {
    include('./logicals/pilotak.php');
}

// Új pilóta hozzáadása
if ($keres['fajl'] === 'pilota_uj') {
    include('./logicals/pilota_uj.php');
}

// Pilóta módosítása
if ($keres['fajl'] === 'pilota_szerkeszt') {
    include('./logicals/pilota_szerkeszt.php');
}

// Pilóta törlése
if ($keres['fajl'] === 'pilota_torles') {
    include('./logicals/pilota_torles.php');
}

include('./templates/index.tpl.php');
?>
