<?php   ?>


<?= get_header(); ?>

<div class="error-404-container">
    <h1>404</h1>
    <h2>Oups ! Page introuvable</h2>
    <p>
        Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
    </p>

    <!-- Bottone per tornare alla Home -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="home-button">
        Retour à l'accueil
    </a>

</div>

<?= get_footer(); ?>
