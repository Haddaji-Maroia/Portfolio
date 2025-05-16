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
                <?php $project_title = get_field('project_title'); ?>
                <?= $project_title !== '' ? esc_html($project_title) : ''; ?>
            </h2>

            <div class="project-container">
                <?php
                $args = [
                    'post_type' => 'projets',
                    'posts_per_page' => -1
                ];

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $project_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $project_title = get_the_title();
                        $project_link = get_permalink(); // oppure un campo ACF personalizzato, se vuoi
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
            <h2>Mon histoire</h2>

            <div class="timeline">
                <div class="experience">
                    <p class="year"><span class="date">2015-2020</span><br>Diplôme en comptabilité en Italie</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lantern-blue.svg"
                         alt="lantern blue">
                </div>
                <div class="experience">
                    <p class="year"><span class="date">2020-2021</span><br>Helmo Marketing</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lantern-blue.svg"
                         alt="lantern blue">
                </div>
                <div class="experience">
                    <p class="year"><span class="date">2021-2022</span><br>École de langue française à la HEPL</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lantern-blue.svg"
                         alt="lantern blue">
                </div>
                <div class="experience">
                    <p class="year"><span class="date">2021-2022</span><br>Helmo International Business</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lantern-blue.svg"
                         alt="lantern blue">
                </div>
                <div class="experience">
                    <p class="year"><span class="date">2023-<span class="small">à ce jour</span></span><br>HEPL
                        Techniques infographiques option web</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lantern-blue.svg"
                         alt="lantern blue">
                </div>
            </div>
        </div>
    </section>

    <section id="technologies" class="technologies-section">
        <div class="technogies">
            <h2>Les outils de mon quotidien</h2>
            <img class="clouds2 clouds2-right"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-2.svg" alt="clouds chinese style">
            <img class="clouds2 clouds2-left"
                 src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-2.svg" alt="clouds chinese style">
            <div class="box-tech">
                <div class="tech figma-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images//icons/figma.svg"
                             alt="figma icon">
                    </div>
                    <div class="text wrapper">
                        <p>Figma</p>
                        <p>Outil de design</p>
                    </div>
                </div>
                <div class="tech html-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/html.svg"
                             alt="Html icon">
                    </div>
                    <div class="text wrapper">
                        <p>HTML</p>
                        <p>Structure propre et sémantique</p>
                    </div>
                </div>
                <div class="tech css-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/css.svg"
                             alt="Css icon">
                    </div>
                    <div class="text wrapper">
                        <p>CSS</p>
                        <p>Styles fluides et responsifs</p>
                    </div>
                </div>
                <div class="tech javascript-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/javascript.svg"
                             alt="JavaScript icon">
                    </div>
                    <div class="text wrapper">
                        <p>JavaScript</p>
                        <p>Interactions dynamiques</p>
                    </div>
                </div>
                <div class="tech typescript-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/typescript.svg"
                             alt="TypeScript icon">
                    </div>
                    <div class="text wrapper">
                        <p>TypeScript</p>
                        <p>Code structuré et typé</p>
                    </div>
                </div>
                <div class="tech php-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/php.svg"
                             alt="Php icon">
                    </div>
                    <div class="text wrapper">
                        <p>PHP</p>
                        <p>Back-end simple et efficace</p>
                    </div>
                </div>
                <div class="tech sql-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sql.svg"
                             alt="Sql icon">
                    </div>
                    <div class="text wrapper">
                        <p>SQL</p>
                        <p>Gestion de bases de données</p>
                    </div>
                </div>
                <div class="tech git-tech">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/git.svg"
                             alt="Git icon">
                    </div>
                    <div class="text wrapper">
                        <p>Git</p>
                        <p>Contrôle de version propre</p>
                    </div>
                </div>
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
