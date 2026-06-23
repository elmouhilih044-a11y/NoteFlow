<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteFlow</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<header class="site-header">
    <a href="index.php?page=notes" class="brand">
        <span class="brand-dot"></span>
        NoteFlow
    </a>
    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="index.php?page=notes">Mes Notes</a>
            <a href="index.php?page=profile&action=update">Profil</a>
            <a href="index.php?page=logout" class="nav-danger">Déconnexion</a>
        <?php else: ?>
            <a href="index.php?page=login">Connexion</a>
            <a href="index.php?page=register" class="nav-cta">S'inscrire</a>
        <?php endif; ?>
    </nav>
</header>