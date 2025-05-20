<?php
get_header();
?>

<main>
    <section id="landing" class="landing">
        <div class="content">
            <h1 class="title">
                    <?php $title = get_field('title') ?>
                    <?= $title !== '' ? $title : '' ?><br>
                <span class="subtitle">Web developer & designer</span>
            </h1>
            <div class="clouds">
                <img class="cloud cloud-left oscillate"
                     src="<?php echo get_template_directory_uri(); ?>/assets/images/clouds-left.svg"
                     alt="big cloud chinese style">
                <img class="cloud cloud-right oscillate"
                     src="<?php echo get_template_directory_uri(); ?>/assets/images/clouds-right.svg"
                     alt="small cloud chinese style">
            </div>
        </div>
        <div class="tree-canvas">
            <canvas id="treeCanvas" width="600" height="600"></canvas>
        </div>
    </section>
    <section id="aboutMe" class="about-me">
        <div class="presentation">
            <div class="text-about">
                <?php $about_title = get_field('about_title') ?>
                <h2><?= $about_title !== '' ? $about_title : '' ?></h2>
                <?php $about_text = get_field('about_text') ?>
                <?= $about_text !== '' ? $about_text : '' ?>
            </div>
            <div class="illustration">
                <div class="circle-container">
                    <img class="circle" src="<?php echo get_template_directory_uri(); ?>/assets/images/circle.svg"
                         alt="simple blue circle for background">
                    <img class="avatar" src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png"
                         alt="my own illustration">
                </div>
            </div>
            <img class="lantern" src="<?php echo get_template_directory_uri(); ?>/assets/images/lantern.svg"
                 alt="chinese lantern">
            <img class="corner-about corner-top-left-about"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/frame-decoration.svg"
                 alt="decoration chinese style">
            <img class="corner-about corner-bottom-right-about"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/frame-decoration.svg"
                 alt="decoration chinese style">
        </div>
    </section>


    <section id="projects" class="projects-section">
        <div class="projects">
            <h2>
                <?php $project_title = get_field('project_title') ?>
                <?= $project_title !== '' ? $project_title : '' ?>
            </h2>

            <div class="project-container">
                <?php
                $args = [
                    'post_type' => 'projets',
                    'posts_per_page' => 3,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ];

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $project_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $project_title = get_the_title();
                        $project_link = get_permalink();
                        ?>
                        <article class="project">
                            <div class="floating">
                                <a class="project-card" href="<?= esc_url($project_link); ?>">
                                    <div class="project-cover">
                                        <figure>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('full'); ?>
                                            <?php endif; ?>
                                            <span><?= esc_html(get_the_title()); ?></span>
                                        </figure>
                                    </div>
                                </a>
                            </div>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Aucun projet trouvé.</p>';
                endif;
                ?>
            </div>

            <div class="button-wrapper">
                <a class="btn-projects" href="<?php echo get_permalink( get_page_by_path('mes-projets') ); ?>"><?php _e('Explorer →', 'textdomain'); ?></a>
            </div>
        </div>
    </section>


    <section id="history" class="history-section">
        <div class="history">
            <img class="furin furin-top" src="<?php echo get_template_directory_uri(); ?>/assets/images/furin-top.svg"
                 alt="japanese top furin">
            <img class="furin furin-bottom"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/furin-bottom.svg"
                 alt="japanese bottom furin">
            <h2>
                <?php $history_title = get_field('history_title') ?>
                <?= $history_title !== '' ? $history_title : '' ?>
            </h2>

            <?php
            if (have_rows('experiences')) : ?>

                <div class="timeline">

                    <?php
                    while (have_rows('experiences')) : the_row();


                        $date = get_sub_field('date');
                        $description = get_sub_field('description');
                        ?>

                        <div class="experience">
                            <p class="year">
                                <?php if (!empty($date)) : ?>
                                    <span class="date"><?= esc_html($date); ?></span><br>
                                <?php endif; ?>

                                <?php if (!empty($description)) : ?>
                                    <?= esc_html($description); ?>
                                <?php endif; ?>
                            </p>

                            <img src="<?= get_template_directory_uri(); ?>/assets/images/lantern-blue.svg" alt="lantern blue">
                        </div>

                    <?php endwhile; ?>
                </div>

            <?php else : ?>
                <p>No experience...</p>
            <?php endif; ?>


        </div>
    </section>

    <section id="technologies" class="technologies-section">
        <div class="technogies">
            <h2>
                <?php $skill_title = get_field('skill_title') ?>
                <?= $skill_title !== '' ? $skill_title : '' ?>
            </h2>
            <img class="clouds2 clouds2-right"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-2.svg" alt="clouds chinese style">
            <img class="clouds2 clouds2-left"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-2.svg" alt="clouds chinese style">
            <div class="box-tech">
                <?php if (have_rows('technologies')): ?>
                    <?php while (have_rows('technologies')): the_row();
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $subtitle = get_sub_field('subtitle');
                        ?>
                        <div class="tech">
                            <div class="icon">
                                <?php if ($icon): ?>
                                    <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="text wrapper">
                                <p><?= esc_html($title); ?></p>
                                <p><?= esc_html($subtitle); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section id="contactMe" class="contactMe-section">
        <div class="contact-me">
            <div class="text-wrapper">
                <h2>Un mot, un souffle </h2>
                <p>Je serais ravie d’échanger autour d’un projet, d’une idée ou simplement d’un rêve partagé.</p>
            </div>
            <div class="contact-main">
                <div class="cloudsContact">
                    <img class="clouds-contact"
                         src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-2.svg"
                         alt="clouds chinese style">
                </div>
                <div class="form-section">
                    <section class="form-container">
                        <div class="form">
                            <form action="" method="post">
                                <h2>Formulaire de contact</h2>
                                <div class="form-input-container">
                                    <div class="form-input-wrapper">
                                        <label for="familyname">Nom</label>
                                        <input type="text" id="familyname" name="familyname" placeholder="Ex. Mark">
                                    </div>
                                    <div class="form-input-wrapper">
                                        <label for="name">Prénom</label>
                                        <input type="text" id="name" name="name" placeholder="Ex. Smith">
                                    </div>
                                    <div class="form-input-wrapper">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                               placeholder="Ex. marksmith@gmail.com">
                                    </div>
                                    <div class="form-input-wrapper">
                                        <label for="object">Sujet</label>
                                        <input type="text" id="object" name="object" placeholder="Ex. Votre sujet">
                                    </div>
                                    <div class="form-input-wrapper">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10"
                                                  placeholder="Ex. Écrivez votre message ici"></textarea>
                                    </div>
                                </div>
                                <button class="btn-form" type="submit">Contactez-moi !</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </section>
</main>
</body>

<?php
get_footer();
?>
