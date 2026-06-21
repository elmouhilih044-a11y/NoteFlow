<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Mes Notes</h2>
<p>
    <a href="index.php?page=notes&action=create">
        Nouvelle Note
    </a>
</p>
<?php if (empty($notes)): ?>
    <p>Aucune note trouvée.</p>
<?php else: ?>
    <?php foreach ($notes as $note): ?>
        <div>
            <h3><?= htmlspecialchars($note['title']) ?></h3>
            <small>
                <?= $note['created_at'] ?>
            </small>
            <p>
                <?= substr(htmlspecialchars($note['content']), 0, 100) ?>...
            </p>
            <a href="index.php?page=notes&action=show&id=<?= $note['id'] ?>">
                Voir
            </a>
            |
            <a href="index.php?page=notes&action=edit&id=<?= $note['id'] ?>">
                Modifier
            </a>
            |
            <a href="index.php?page=notes&action=delete&id=<?= $note['id'] ?>"
               onclick="return confirm('Supprimer cette note ?')">
                Supprimer
            </a>
            <hr>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php require __DIR__ . '/../layout/footer.php'; ?>