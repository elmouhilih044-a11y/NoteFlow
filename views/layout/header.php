<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NoteFlow</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="index.php?page=notes">Mes Notes</a> |
            <a href="index.php?page=profile&action=update">Profil</a> |
            <a href="index.php?page=logout">Déconnexion</a>
        <?php else: ?>
            <a href="index.php?page=login">Connexion</a> |
            <a href="index.php?page=register">Inscription</a> |
            <a href="index.php?page=forgot_password">Mot de passe oublié</a>
        <?php endif; ?>
    </nav>
    <hr>
    <main>