<?php require __DIR__ . '/layout/header.php'; ?>

<div class="landing-wrapper">

    <div class="landing-bg-grid" aria-hidden="true">
        <?php for ($i = 0; $i < 6; $i++): ?>
        <div class="landing-bg-card">
            <div class="landing-bg-card-line"></div>
            <div class="landing-bg-card-line"></div>
            <div class="landing-bg-card-line"></div>
        </div>
        <?php endfor; ?>
    </div>

    <div class="landing-content">

        <h1 class="landing-headline">
            Vos idées méritent<br>
            un <span>vrai espace</span>.
        </h1>

        <p class="landing-sub">
            Créez, organisez et retrouvez vos notes personnelles en un instant.
        </p>

        <div class="landing-actions">
            <a href="index.php?page=register" class="btn">Créer un compte</a>
            <a href="index.php?page=login" class="btn btn-secondary">Se connecter</a>
        </div>

        <div class="landing-features">
            <div class="landing-feature">Notes privées</div>
            <div class="landing-feature-sep"></div>
            <div class="landing-feature">Accès immédiat</div>
            <div class="landing-feature-sep"></div>
            <div class="landing-feature">Illimitées</div>
        </div>

    </div>

</div>

<?php require __DIR__ . '/layout/footer.php'; ?>