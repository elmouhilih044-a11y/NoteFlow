<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-wrapper">

    <div class="page-header">
        <div>
            <h2>Mes Notes</h2>
            <p class="page-meta">
                <?= count($notes) ?> note<?= count($notes) !== 1 ? 's' : '' ?>
            </p>
        </div>
        <a href="index.php?page=notes&action=create" class="btn">
            + Nouvelle note
        </a>
    </div>

    <?php if (empty($notes)): ?>
    <div class="empty-state">
        <span class="empty-icon">📝</span>
        <h3>Aucune note pour l'instant</h3>
        <p>Commencez par créer votre première note.</p>
        <a href="index.php?page=notes&action=create" class="btn">Créer une note</a>
    </div>
    <?php else: ?>
    <div class="notes-grid">
        <?php foreach ($notes as $note): ?>
        <div class="note-card">
            <div class="note-card-body">
                <h3><?= htmlspecialchars($note['title']) ?></h3>
                <div class="note-card-date"><?= htmlspecialchars($note['created_at']) ?></div>
                <p class="note-card-excerpt">
                    <?= htmlspecialchars(substr($note['content'], 0, 120)) ?>…
                </p>
            </div>
            <div class="note-card-actions">
                <a href="index.php?page=notes&action=show&id=<?= $note['id'] ?>" class="btn btn-secondary btn-sm">Voir</a>
                <a href="index.php?page=notes&action=edit&id=<?= $note['id'] ?>" class="btn btn-secondary btn-sm">Modifier</a>
                <a href="index.php?page=notes&action=delete&id=<?= $note['id'] ?>"
                   class="btn btn-danger btn-sm delete-link">Supprimer</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>