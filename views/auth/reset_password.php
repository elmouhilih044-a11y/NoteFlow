<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Réinitialisation du mot de passe</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label>Nouveau mot de passe</label><br>
    <input type="password" name="password" required><br><br>
    <label>Confirmer le mot de passe</label><br>
    <input type="password" name="confirm_password" required><br><br>
    <button type="submit">
        Réinitialiser
    </button>
</form>
<?php require __DIR__ . '/../layout/footer.php'; ?>