<h2>Beérkezett üzenetek</h2>

<?php if (!empty($_SESSION['login'])): ?>

    <?php if (!empty($uzenetek)): ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Dátum</th>
                        <th>Feladó</th>
                        <th>Email</th>
                        <th>Üzenet</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($uzenetek as $uzenet): ?>
                        <tr>
                            <td><?= htmlspecialchars($uzenet['datum']) ?></td>
                            <td><?= htmlspecialchars($uzenet['nev']) ?></td>
                            <td><?= htmlspecialchars($uzenet['email']) ?></td>
                            <td><?= nl2br(htmlspecialchars($uzenet['uzenet'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <p>Még nem érkezett üzenet.</p>
    <?php endif; ?>

<?php else: ?>

    <p>Az üzenetek megtekintéséhez be kell jelentkezned.</p>

<?php endif; ?>
