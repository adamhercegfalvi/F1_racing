
<section class="container py-4">
    <h1 class="mb-4">Formula–1 pilóták</h1>

    <?php if (isset($adatbazisHiba)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($adatbazisHiba) ?>
        </div>
    <?php else: ?>

        <p>Összesen <?= count($pilotak) ?> pilóta található az adatbázisban.</p>

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th>Név</th>
                        <th>Nem</th>
                        <th>Születési dátum</th>
                        <th>Nemzetiség</th>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</section>
