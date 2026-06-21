<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Modifier la note</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<form method="POST" action="index.php?page=notes&action=edit&id=<?= $note['id'] ?>">
    <label>Titre</label><br>
    <input
        type="text"
        name="title"
        value="<?= htmlspecialchars($note['title']) ?>"
    ><br><br>
    <label>Contenu</label><br>
    <textarea
        name="content"
        rows="8"
        cols="50"
    ><?= htmlspecialchars($note['content']) ?></textarea><br><br>
    <button type="submit">
        Modifier
    </button>
</form>
<p>
    <a href="index.php?page=notes">
        Retour à la liste
    </a>
</p>
<?php require __DIR__ . '/../layout/footer.php'; ?>