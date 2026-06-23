<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Mot de passe oublié</h2>
        <p class="auth-subtitle">Entrez votre email pour recevoir un lien de réinitialisation.</p>

        <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠️</span>
            <span><?= htmlspecialchars($error) ?></span>
            <button class="alert-close" aria-label="Fermer">✕</button>
        </div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <span class="alert-icon">✅</span>
            <span><?= htmlspecialchars($success) ?></span>
            <button class="alert-close" aria-label="Fermer">✕</button>
        </div>

        <div class="token-hint">
            <strong>Lien de réinitialisation (test)</strong>
            <a href="<?= htmlspecialchars($link) ?>"><?= htmlspecialchars($link) ?></a>
        </div>

        <?php else: ?>
        <form method="POST">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="vous@exemple.com" required autocomplete="email">
            </div>
            <button type="submit" class="btn btn-full">Envoyer le lien</button>
        </form>
        <?php endif; ?>

        <hr class="auth-divider">
        <div class="auth-footer">
            <a href="index.php?page=login">← Retour à la connexion</a>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>