<?php /* Template Name: Home page */ ?>
<?php
get_header();
?>

<main>
    <section id="landing" class="landing" role="region" aria-label="Section d’accueil" itemscope itemtype="https://schema.org/Person">
        <div class="content">
            <h1 class="title" itemprop="name">
                <?php $title = get_field('title') ?>
                <span style="display:flex;align-items:center;justify-content:center;gap:10px;line-height:1;">
                    <span><?= $title !== '' ? esc_html($title) : '' ?></span>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/peonie.png'); ?>"
                             alt="" aria-hidden="true"
                             class="peony">
                    </span>
                <span class="subtitle" itemprop="jobTitle" style="display:block;">Web developer &amp; designer</span>
            </h1>
            <div class="clouds">
                <img class="cloud cloud-left oscillate"
                     src="<?php echo get_template_directory_uri(); ?>/assets/images/clouds-left.svg"
                     alt="Grosse nuage style chinois">
                <img class="cloud cloud-right oscillate"
                     src="<?php echo get_template_directory_uri(); ?>/assets/images/clouds-right.svg"
                     alt="Petit nuage style chinois">
            </div>
        </div>
    </section>

<!--    <section id="aboutMe" class="about-me" role="region" aria-labelledby="about-title" itemprop="description">-->
<!--        <div class="presentation">-->
<!--            <div class="text-about">-->
<!--                --><?php //$about_title = get_field('about_title') ?>
<!--                <h2 id="about-title" itemprop="description">--><?php //= $about_title !== '' ? $about_title : '' ?><!--</h2>-->
<!--                --><?php //$about_text = get_field('about_text') ?>
<!--                --><?php //= $about_text !== '' ? $about_text : '' ?>
<!--            </div>-->
<!--            <div class="illustration">-->
<!--                <div class="circle-container">-->
<!--                    <img class="circle" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/circle.svg"-->
<!--                         alt="Cercle bleu décoratif" role="presentation">-->
<!--                    <img class="avatar" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/dragon-avatar.png"-->
<!--                         alt="Avatar illustré de dragon">-->
<!--                </div>-->
<!--            </div>-->
<!--            <img class="lantern__chinese" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/lantern.svg"-->
<!--                 alt="Lanterne chinoise décorative">-->
<!--            <img class="corner-about corner-top-left-about"-->
<!--                 src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/frame-decoration.svg"-->
<!--                 alt="Décoration de coin style chinois">-->
<!--            <img class="corner-about corner-bottom-right-about"-->
<!--                 src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/frame-decoration.svg"-->
<!--                 alt="Décoration de coin style chinois">-->
<!--        </div>-->
<!--    </section>-->

    <section class="projects-section" id="projets">
        <div class="projects">
            <h2>A glimpse of my work</h2>
            <p class="projects__subtitle">A collection of digital experiences, interfaces and ideas I've brought to life.</p>

            <?php
            $projects = new WP_Query([
                    'post_type'      => 'projets',
                    'posts_per_page' => 4,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
            ]);
            ?>

            <?php if ($projects->have_posts()) : ?>
                <div class="projects__grid">
                    <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                        <a class="project-card" href="<?php the_permalink(); ?>">
                            <div class="project-card__media">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('large', ['alt' => '']);
                                } ?>
                            </div>
                            <h3 class="project-card__title"><?php the_title(); ?></h3>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>

            <a class="btn-outline" href="<?= esc_url(home_url('/mes-projets/')); ?>">See more</a>
        </div>
    </section>

<!--    <section id="history" class="history-section" role="region" aria-labelledby="history-title">-->
<!--        <div class="history">-->
<!--            <img class="furin furin-top" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/furin-top.svg"-->
<!--                 alt="Carillon japonais supérieur">-->
<!--            <img class="furin furin-bottom"-->
<!--                 src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/furin-bottom.svg"-->
<!--                 alt="Carillon japonais inférieur">-->
<!--            --><?php //$history_title = get_field('history_title') ?>
<!--            <h2 id="history-title">--><?php //= $history_title !== '' ? $history_title : '' ?><!--</h2>-->
<!---->
<!--            --><?php //if (have_rows('experiences')) : ?>
<!--                <div class="timeline">-->
<!--                    --><?php //while (have_rows('experiences')) : the_row();
//                        $date = get_sub_field('date');
//                        $description = get_sub_field('description');
//                        ?>
<!--                        <div class="experience" itemscope itemtype="https://schema.org/Organization">-->
<!--                            <p class="year">-->
<!--                                --><?php //if (!empty($date)) : ?>
<!--                                    <span class="date" itemprop="foundingDate">--><?php //= esc_html($date); ?><!--</span><br>-->
<!--                                --><?php //endif; ?>
<!--                                --><?php //if (!empty($description)) : ?>
<!--                                    <span itemprop="description">--><?php //= esc_html($description); ?><!--</span>-->
<!--                                --><?php //endif; ?>
<!--                            </p>-->
<!--                            <img src="--><?php //= get_template_directory_uri(); ?><!--/assets/images/lantern-blue.svg" alt="Lanterne bleue illustrée">-->
<!--                        </div>-->
<!--                    --><?php //endwhile; ?>
<!--                </div>-->
<!--            --><?php //else : ?>
<!--                <p>Aucune expérience trouvée.</p>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
<!--    </section>-->

<!--    <section id="technologies" class="technologies-section" role="region" aria-labelledby="skills-title">-->
<!--        <div class="technogies">-->
<!--            --><?php //$skill_title = get_field('skill_title') ?>
<!--            <h2 id="skills-title">--><?php //= $skill_title !== '' ? $skill_title : '' ?><!--</h2>-->
<!--            <img class="clouds2 clouds2-right"-->
<!--                 src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/cloud-2.svg" alt="Nuage flottant ">-->
<!--            <img class="clouds2 clouds2-left"-->
<!--                 src="--><?php //echo get_template_directory_uri(); ?><!--/assets/images/cloud-2.svg" alt="Nuage flottant ">-->
<!--            <div class="box-tech">-->
<!--                --><?php //if (have_rows('technologies')): ?>
<!--                    --><?php //while (have_rows('technologies')): the_row();
//                        $icon = get_sub_field('icon');
//                        $title = get_sub_field('title');
//                        $subtitle = get_sub_field('subtitle');
//                        ?>
<!--                        <div class="tech" itemscope itemtype="https://schema.org/DefinedTerm">-->
<!--                            <div class="icon">-->
<!--                                --><?php //if ($icon): ?>
<!--                                    <img src="--><?php //= esc_url($icon['url']); ?><!--" alt="--><?php //= esc_attr($icon['alt']); ?><!--">-->
<!--                                --><?php //endif; ?>
<!--                            </div>-->
<!--                            <div class="text wrapper">-->
<!--                                <p class="tech__title" itemprop="name">--><?php //= esc_html($title); ?><!--</p>-->
<!--                                <p itemprop="description">--><?php //= esc_html($subtitle); ?><!--</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endwhile; ?>
<!--                --><?php //endif; ?>
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <?php
    $errors  = $_SESSION['contact_form_errors'] ?? [];
    $old     = $_SESSION['contact_form_old'] ?? [];
    $success = $_SESSION['contact_form_success'] ?? '';
    unset($_SESSION['contact_form_errors'], $_SESSION['contact_form_old'], $_SESSION['contact_form_success']);

    $val = function ($key) use ($old) {
        return esc_attr(isset($old[$key]) ? $old[$key] : '');
    };
    ?>
    <section id="contactMe" class="contactMe-section" role="region" aria-labelledby="contact-title" itemscope itemtype="https://schema.org/ContactPoint">
        <div class="contact-me">
            <div class="text-wrapper">
                <h2 id="contact-title">Un mot, un souffle</h2>
                <p class="contact__paragraphe">Je serais ravie d’échanger autour d’un projet, d’une idée ou simplement d’un rêve partagé.</p>
            </div>

            <div class="contact-main">
                <div class="cloudsContact">
                    <img class="clouds-contact"
                         src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cloud-2.svg'); ?>"
                         alt="" aria-hidden="true">
                </div>

                <div class="form-section">
                    <div class="form">
                        <div class="form-status" role="status" aria-live="polite">
                            <?php if ($success) : ?><p class="is-success"><?= esc_html($success); ?></p><?php endif; ?>
                            <?php if ($errors) : ?><p class="is-error">Merci de corriger les champs indiqués ci-dessous.</p><?php endif; ?>
                        </div>

                        <form data-contact-form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate aria-label="Formulaire de contact">
                            <input type="hidden" name="action" value="handle_contact_form">
                            <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>

                            <div class="hp-field" aria-hidden="true">
                                <label for="website">Ne pas remplir</label>
                                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <p class="form-note">Les champs marqués d’un <span class="required">*</span> sont obligatoires.</p>

                            <div class="form-input-container">
                                <div class="form-input-wrapper <?= isset($errors['name']) ? 'has-error' : ''; ?>">
                                    <label for="name">Nom <span class="required">*</span></label>
                                    <input type="text" id="name" name="name" placeholder="Ex. Mark Smith"
                                           value="<?= $val('name'); ?>" required aria-required="true" aria-describedby="err-name">
                                    <p class="field-error" id="err-name"><?= esc_html($errors['name'] ?? ''); ?></p>
                                </div>

                                <div class="form-input-wrapper <?= isset($errors['email']) ? 'has-error' : ''; ?>">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" id="email" name="email" placeholder="Ex. marksmith@gmail.com"
                                           value="<?= $val('email'); ?>" required aria-required="true" aria-describedby="err-email">
                                    <p class="field-error" id="err-email"><?= esc_html($errors['email'] ?? ''); ?></p>
                                </div>

                                <div class="form-input-wrapper <?= isset($errors['message']) ? 'has-error' : ''; ?>">
                                    <label for="message">Message <span class="required">*</span></label>
                                    <textarea name="message" id="message" rows="8" placeholder="Ex. Écrivez votre message ici"
                                              required aria-required="true" aria-describedby="err-message"><?= esc_textarea($old['message'] ?? ''); ?></textarea>
                                    <p class="field-error" id="err-message"><?= esc_html($errors['message'] ?? ''); ?></p>
                                </div>
                            </div>

                            <button class="btn-form" type="submit">Contactez-moi !</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
