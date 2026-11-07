<?php if (!empty($_SESSION['login'])): ?>
<section class="container py-4">
    <h1>Új pilóta hozzáadása</h1>

    <?php if (!empty($uzenet)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($uzenet) ?></div>
    <?php endif; ?>

    <?php if (!empty($hiba)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($hiba) ?></div>
    <?php endif; ?>

    <form method="post" action="?pilota_uj">

        <label class="form-label">Azonosító</label>
        <input type="number" name="az" class="form-control mb-3" required>

        <label class="form-label">Név</label>
        <input type="text" name="nev" class="form-control mb-3" required>

        <label class="form-label">Nem</label>
        <select name="nem" class="form-select mb-3">
            <option value="F">Férfi</option>
            <option value="N">Nő</option>
        </select>

        <label class="form-label">Születési dátum</label>
        <input type="date" name="szuldat" class="form-control mb-3">

        <label class="form-label">Nemzetiség</label>
        <input type="text" name="nemzet" class="form-control mb-3">

        <button type="submit" class="btn btn-danger">
            Pilóta mentése
        </button>

    </form>
</section>
<?php else: ?>
    <p>Az oldal megtekintéséhez be kell jelentkezned!</p>
<?php endif; ?>
