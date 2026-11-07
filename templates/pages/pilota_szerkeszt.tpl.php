<section class="container py-4">
    <?php if (!empty($_SESSION['login'])): ?>

        <h1>Pilóta módosítása</h1>

        <?php if (!empty($uzenet)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($uzenet) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($hiba)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($hiba) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <label class="form-label">Azonosító</label>
            <input type="number" name="az" class="form-control mb-3" readonly>

            <label class="form-label">Név</label>
            <input type="text" name="nev" class="form-control mb-3" 
                value="<?= htmlspecialchars($pilota['nev'] ?? '') ?>" required>

            <label class="form-label">Nem</label>
            <select name="nem" class="form-select mb-3">
                <option value="F" <?= ($pilota['nem'] ?? '') === 'F' ? 'selected' : '' ?>>Férfi</option>
                <option value="N" <?= ($pilota['nem'] ?? '') === 'N' ? 'selected' : '' ?>>Nő</option>
            </select>

            <label class="form-label">Születési dátum</label>
            <input type="date" name="szuldat" class="form-control mb-3">

            <label class="form-label">Nemzetiség</label>
            <input type="text" name="nemzet" class="form-control mb-3">

            <button type="submit" class="btn btn-warning">
                Módosítás mentése
            </button>
        </form>

    <?php else: ?>
        <p>Az oldal megtekintéséhez be kell jelentkezned!</p>
    <?php endif; ?>
</section>
