<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-wrapper">

    <a href="index.php?page=notes" class="back-link">← Mes notes</a>

    <div class="content-card">
        <div class="note-meta"><?= htmlspecialchars($note['created_at']) ?></div>
        <h2 class="section-title"><?= htmlspecialchars($note['title']) ?></h2>

        <div class="note-body">
            <?= nl2br(htmlspecialchars($note['content'])) ?>
        </div>

        <div class="action-row">
            <a href="index.php?page=notes&action=edit&id=<?= $note['id'] ?>" class="btn">Modifier</a>
            <a href="index.php?page=notes&action=delete&id=<?= $note['id'] ?>"
               class="btn btn-danger delete-link">Supprimer</a>
            <span class="spacer"></span>
            <a href="index.php?page=notes" class="btn btn-secondary">Retour</a>
        </div>
    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>