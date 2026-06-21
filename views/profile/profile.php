<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Mon Profil</h2>
<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label>Nom</label><br>
    <input
        type="text"
        name="name"
        value="<?= htmlspecialchars($user['name']) ?>"
    ><br><br>
    <label>Email</label><br>
    <input
        type="email"
        name="email"
        value="<?= htmlspecialchars($user['email']) ?>"
    ><br><br>
    <label>Mot de passe actuel</label><br>
    <input
        type="password"
        name="currentPassword"
    ><br><br>
    <button type="submit">
        Mettre à jour
    </button>
</form>
<?php require __DIR__ . '/../layout/footer.php'; ?>