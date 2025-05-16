<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Maroia Haddaji">
    <meta name="keywords" content="portfolio portfoliomaroia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">


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
                <li><a href="<?php echo home_url(); ?>/#landing">Accueil</a></li>
                <li><a href="<?php echo home_url(); ?>/#aboutMe">About me</a></li>
                <li><a href="<?php echo get_permalink( get_page_by_path('mes-projets') ); ?>">Projets</a></li>
                <li><a href="<?php echo home_url(); ?>/#history">Mon histoire</a></li>
                <li><a href="<?php echo home_url(); ?>/#contactMe">Contact</a></li>
                <li><a href="">EN</a></li>
            </ul>
        </div>
    </nav>
</header>
