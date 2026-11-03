<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
		<img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
		<h1><?= $fejlec['cim'] ?></h1>
		<?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
		<?php if(isset($_SESSION['login'])) { ?>Bejlentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
	</header>
    <div id="wrapper">
        <aside id="nav">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#f1Navbar"
                    aria-controls="f1Navbar"
                    aria-expanded="false"
                    aria-label="Menü megnyitása">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="f1Navbar">
                <ul class="navbar-nav">

                    <?php foreach ($oldalak as $url => $oldal) { ?>
                        <?php if ((!isset($_SESSION['login']) && $oldal['menun'][0]) ||
                                  (isset($_SESSION['login']) && $oldal['menun'][1])) { ?>

                            <li class="nav-item <?= ($oldal == $keres) ? 'active' : '' ?>">
                                <a class="nav-link"
                                   href="<?= ($url == '/') ? '.' : $url ?>">
                                    <?= $oldal['szoveg'] ?>
                                </a>
                            </li>

                        <?php } ?>
                    <?php } ?>

                </ul>
            </div>

        </div>
    </nav>
</aside>
        <div id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
