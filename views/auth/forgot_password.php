<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Mot de passe oublié</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<?php if (isset($success)): ?>
    <p><?= $success ?></p>
<?php endif; ?>
<form method="POST">
    <label>Email</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">
        Envoyer
    </button>
</form>
<p>
    <a href="index.php?page=login">
        Retour à la connexion
    </a>
</p>
<?php require __DIR__ . '/../layout/footer.php'; ?>