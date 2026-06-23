<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Connexion</h2>
        <p class="auth-subtitle">Ravi de vous revoir.</p>

        <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠️</span>
            <span><?= htmlspecialchars($error) ?></span>
            <button class="alert-close" aria-label="Fermer">✕</button>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="vous@exemple.com" autocomplete="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-full" style="margin-top:6px;">Se connecter</button>
        </form>

        <hr class="auth-divider">

        <div class="auth-footer">
            <a href="index.php?page=forgot_password">Mot de passe oublié ?</a>
            &nbsp;·&nbsp;
            <a href="index.php?page=register">Créer un compte</a>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>