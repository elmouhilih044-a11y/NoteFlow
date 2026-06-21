<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Créer une note</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label>Titre</label><br>
    <input type="text" name="title"><br><br>
    <label>Contenu</label><br>
    <textarea name="content" rows="8" cols="50"></textarea><br><br>
    <button type="submit">
        Créer
    </button>
</form>
<p>
    <a href="index.php?page=notes">
        Retour à la liste
    </a>
</p>
<?php require __DIR__ . '/../layout/footer.php'; ?>