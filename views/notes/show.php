<?php require __DIR__ . '/../layout/header.php'; ?>
<h2><?= htmlspecialchars($note['title']) ?></h2>
<p>
    <strong>Date :</strong>
    <?= $note['created_at'] ?>
</p>
<hr>
<p>
    <?= nl2br(htmlspecialchars($note['content'])) ?>
</p>
<hr>
<p>
    <a href="index.php?page=notes">
        Retour
    </a>
</p>
<?php require __DIR__ . '/../layout/footer.php'; ?>