<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Maroia Haddaji">
    <meta name="keywords" content="portfolio, Maroia Haddaji, créative, développeuse">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <nav class="main-navigation" role="navigation">

        <?php
        if (function_exists('the_custom_logo')) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo) {
                echo '<img class="logo" src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
            } else {
                echo '<h1 class="site-title">' . esc_html(get_bloginfo('name')) . '</h1>';
            }
        }
        ?>

        <!-- Burger Menu -->
        <label for="menu-toggle" class="navbar__toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>

        <div class="container">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'menu',
                'container' => false,
                'fallback_cb' => false,
            ]);
            ?>
        </div>
    </nav>
</header>
