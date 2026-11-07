
<section class="container py-4">
    <h1 class="mb-4">Formula–1 pilóták</h1>

    <?php if (isset($adatbazisHiba)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($adatbazisHiba) ?>
        </div>
    <?php else: ?>

        <p>Összesen <?= count($pilotak) ?> pilóta található az adatbázisban.</p>

        <?php if (!empty($_SESSION['login'])): ?>
            <a href="/F1_racing/?pilota_uj" class="btn btn-danger mb-3">
                Új pilóta hozzáadása
            </a>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th>Név</th>
                        <th>Nem</th>
                        <th>Születési dátum</th>
                        <th>Nemzetiség</th>

                        <?php if (!empty($_SESSION['login'])): ?>
                            <th>Művelet</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($pilotak as $pilota): ?>
                        <tr>
                            <td><?= htmlspecialchars((string)$pilota['az']) ?></td>
                            <td><?= htmlspecialchars($pilota['nev']) ?></td>
                            <td><?= htmlspecialchars($pilota['nem'] ?? '') ?></td>
                            <td><?= htmlspecialchars($pilota['szuldat'] ?? '') ?></td>
                            <td><?= htmlspecialchars($pilota['nemzet'] ?? '') ?></td>

                            <?php if (!empty($_SESSION['login'])): ?>
                                <td>
                                    <a href="/F1_racing/?pilota_szerkeszt&az=<?= $pilota['az'] ?>"
                                       class="btn btn-warning btn-sm">
                                        Módosítás
                                    </a>

                                    <form method="post" action="/F1_racing/?pilota_torles" class="d-inline">
                                        <input type="hidden" name="az" value="<?= htmlspecialchars((string)$pilota['az']) ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Törlés
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</section>
