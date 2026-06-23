<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-wrapper">

    <div class="page-header">
        <div>
            <h2>Mon Profil</h2>
            <p class="page-meta">Gérez vos informations personnelles</p>
        </div>
    </div>

    <div class="profile-layout">

        <!-- Sidebar avatar -->
        <aside class="profile-sidebar">
            <div class="profile-avatar">
                <?= strtoupper(mb_substr($user['name'], 0, 1)) ?>
            </div>
            <div class="profile-name"><?= htmlspecialchars($user['name']) ?></div>
            <div class="profile-email"><?= htmlspecialchars($user['email']) ?></div>
        </aside>

        <!-- Form -->
        <div class="profile-form-card">
            <h3>Modifier les informations</h3>

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
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name"
                           value="<?= htmlspecialchars($user['name']) ?>">
                </div>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email"
                           value="<?= htmlspecialchars($user['email']) ?>">
                </div>
                <div class="form-group">
                    <label for="currentPassword">Mot de passe actuel <span class="tag">Requis</span></label>
                    <input type="password" id="currentPassword" name="currentPassword"
                           placeholder="Confirmez votre identité">
                </div>
                <div class="action-row" style="margin-top: 0; padding-top: 0; border: none;">
                    <button type="submit" class="btn">Enregistrer les modifications</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>