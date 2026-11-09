
<h2>Képgaléria</h2>

<?php if (isset($siker)): ?>
    <p style="color: green;"><?php echo htmlspecialchars($siker); ?></p>
<?php endif; ?>

<?php if (isset($hiba)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($hiba); ?></p>
<?php endif; ?>

<p>Formula–1 képek és pillanatok.</p>

<?php if (isset($_SESSION['login'])): ?>

    <h3>Új kép feltöltése</h3>

    <form action="" method="post" enctype="multipart/form-data">

        <label for="kep">Válassz egy képet:</label>

        <input type="file"name="kep"id="kep"accept="image/jpeg,image/png,image/webp,image/gif"required>

        <button type="submit" name="feltoltes">Kép feltöltése</button>

    </form>

<?php endif; ?>

<h3>Feltöltött képek</h3>

<div class="row">

    <?php foreach ($kepek as $kep): ?>

        <div class="col-md-4 mb-3">

            <img
                src="images/galeria/<?php echo htmlspecialchars(basename($kep)); ?>"
                class="img-fluid rounded"
                alt="Formula 1 kép">

        </div>

    <?php endforeach; ?>

</div>
