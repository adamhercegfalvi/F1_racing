
<?php
include('./includes/config.inc.php');

// Az URL alapján kiválasztjuk az oldalt
$oldal = explode('&', $_SERVER['QUERY_STRING'])[0];

if (isset($oldalak[$oldal])) {
	$keres = $oldalak[$oldal];
} else {
    $keres = $hiba_oldal;
}

if ($keres['fajl'] === 'pilotak') {
    include('./logicals/pilotak.php');
}

if ($keres['fajl'] === 'pilota_uj') {
    include('./logicals/pilota_uj.php');
}

if ($keres['fajl'] === 'pilota_szerkeszt') {
    include('./logicals/pilota_szerkeszt.php');
}

if ($keres['fajl'] === 'pilota_torles') {
    include('./logicals/pilota_torles.php');
}

	include('./templates/index.tpl.php');
?>
