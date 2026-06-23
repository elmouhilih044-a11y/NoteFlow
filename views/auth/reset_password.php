<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Nouveau mot de passe</h2>
        <p class="auth-subtitle">Choisissez un mot de passe sécurisé.</p>

        <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠️</span>
            <span><?= htmlspecialchars($error) ?></span>
            <button class="alert-close" aria-label="Fermer">✕</button>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Minimum 8 caractères" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Répétez le mot de passe" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-full">Réinitialiser le mot de passe</button>
        </form>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>