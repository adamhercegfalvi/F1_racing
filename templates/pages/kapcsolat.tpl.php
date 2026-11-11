
<h2>Kapcsolatfelvétel</h2>

<p>Ha kérdésed van, küldj nekünk üzenetet!</p>

<?php if (!empty($uzenet_visszajelzes)): ?>
    <p><?= htmlspecialchars($uzenet_visszajelzes) ?></p>
<?php endif; ?>

<form action="" method="post" novalidate onsubmit="return ellenorzes()">

    <div class="mb-3">
        <label for="nev" class="form-label">Név:</label>
        <input type="text" class="form-control" id="nev" name="nev">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
        <label for="uzenet" class="form-label">Üzenet:</label>
        <textarea class="form-control" id="uzenet" name="uzenet" rows="5"></textarea>
    </div>

    <button type="submit" class="btn btn-danger">Üzenet küldése</button>

</form>

<script>
function ellenorzes() {

    let nev = document.getElementById("nev").value.trim();
    let email = document.getElementById("email").value.trim();
    let uzenet = document.getElementById("uzenet").value.trim();

    if (nev === "" || email === "" || uzenet === "") {
        alert("Kérlek, töltsd ki az összes mezőt!");
        return false;
    }

    if (!email.includes("@") || !email.includes(".")) {
        alert("Kérlek, adj meg egy érvényes e-mail-címet!");
        return false;
    }

    return true;
}
</script>
