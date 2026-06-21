<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Inscription</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label>Nom</label><br>
    <input type="text" name="name"><br><br>
    <label>Email</label><br>
    <input type="email" name="email"><br><br>
    <label>Mot de passe</label><br>
    <input type="password" name="password"><br><br>
    <label>Confirmation</label><br>
    <input type="password" name="confirmpassword"><br><br>
    <button type="submit">
        Créer un compte
    </button>
</form>
<p>
    <a href="index.php?page=login">
        Déjà un compte ?
    </a>
</p>
<?php require __DIR__ . '/../layout/footer.php'; ?>