<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Maroia Haddaji">
    <meta name="keywords" content="portfolio portfoliomaroia">
    <?php
    wp_head();
    ?>
    <script defer src=""></script>
</head>
<body>
<header>
    <nav class="main-navigation" role="navigation">
        <?php
        if ( function_exists( 'the_custom_logo' ) ) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id );
        }
        ?>
        <img class="logo" src="<?php echo $logo[0] ?> " alt="vers la page d'accueil">

        <label for="menu-toggle" class="navbar__toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>

        <div class="container">

            <?php
            wp_nav_menu(
                    array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                        //continue nav minuto 1:10:10
                    )
            )
            ?>


            <ul class="menu">
                <li><a href="<?php echo home_url(); ?>/#landing" class="nav-link">Accueil</a></li>
                <li><a href="<?php echo home_url(); ?>/#aboutMe" class="nav-link">About me</a></li>
                <li><a href="<?php echo get_permalink( get_page_by_path('mes-projets') ); ?>" class="nav-link">Projets</a></li>
                <li><a href="<?php echo home_url(); ?>/#history" class="nav-link">Mon histoire</a></li>
                <li><a href="<?php echo home_url(); ?>/#contactMe" class="nav-link">Contact</a></li>
                <li><a href="" class="nav-link">EN</a></li>
            </ul>
        </div>
    </nav>
</header>
