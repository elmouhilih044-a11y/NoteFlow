<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Créer un compte</h2>
        <p class="auth-subtitle">C'est gratuit et immédiat.</p>

        <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠️</span>
            <span><?= htmlspecialchars($error) ?></span>
            <button class="alert-close" aria-label="Fermer">✕</button>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" placeholder="Votre nom" autocomplete="name">
            </div>
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="vous@exemple.com" autocomplete="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Minimum 8 caractères" autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirmation</label>
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Répétez votre mot de passe" autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-full" style="margin-top:6px;">Créer mon compte</button>
        </form>

        <hr class="auth-divider">

        <div class="auth-footer">
            Déjà inscrit ? <a href="index.php?page=login">Se connecter</a>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>