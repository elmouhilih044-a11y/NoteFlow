<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-wrapper">

    <a href="index.php?page=notes" class="back-link">← Mes notes</a>

    <div class="content-card">
        <h2 class="section-title">Nouvelle note</h2>

        <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠️</span>
            <span><?= htmlspecialchars($error) ?></span>
            <button class="alert-close" aria-label="Fermer">✕</button>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" placeholder="Donnez un titre à votre note">
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea id="content" name="content" rows="10" placeholder="Écrivez votre note ici…"></textarea>
            </div>
            <div class="action-row">
                <button type="submit" class="btn">Enregistrer la note</button>
                <a href="index.php?page=notes" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>