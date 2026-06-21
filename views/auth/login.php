<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Connexion</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label>Email</label><br>
    <input type="email" name="email"><br><br>
    <label>Mot de passe</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Se connecter</button>
</form>
<p>
    <a href="index.php?page=register">
        Créer un compte
    </a>
</p>
<p>
    <a href="index.php?page=forgot_password">
        Mot de passe oublié ?
    </a>
</p>
<?php require __DIR__ . '/../layout/footer.php'; ?>