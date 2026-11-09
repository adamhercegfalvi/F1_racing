<h2>Kapcsolatfelvétel</h2>

<p>Ha kérdésed van, küldj nekünk üzenetet!</p>


<?php if (!empty($uzenet_visszajelzes)): ?>
    <p><?= htmlspecialchars($uzenet_visszajelzes) ?></p>
<?php endif; ?>


<form action="" method="post" onsubmit="return ellenorzes()">

    <div class="mb-3">
        <label for="nev" class="form-label">Név:</label>
        <input type="text" class="form-control" id="nev" name="nev" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="uzenet" class="form-label">Üzenet:</label>
        <textarea class="form-control" id="uzenet" name="uzenet" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-danger">Üzenet küldése</button>

</form>

<?php if (!empty($_SESSION['login'])): ?>

    <h3 class="mt-5">Beérkezett üzenetek</h3>

    <?php foreach ($uzenetek as $adat): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5><?= htmlspecialchars($adat['nev']) ?></h5>
                <p><?= htmlspecialchars($adat['email']) ?></p>
                <p><?= nl2br(htmlspecialchars($adat['uzenet'])) ?></p>
                <small><?= htmlspecialchars($adat['datum']) ?></small>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

<script>
function ellenorzes() {
    let nev = document.getElementById("nev").value.trim();
    let email = document.getElementById("email").value.trim();
    let uzenet = document.getElementById("uzenet").value.trim();

    if (nev === "" || email === "" || uzenet === "") {
        alert("Kérlek, töltsd ki az összes mezőt!");
        return false;
    }

    return true;
}
</script>