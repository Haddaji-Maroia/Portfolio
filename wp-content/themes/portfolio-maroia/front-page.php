<?php /* Template Name: Home page */ ?>
<?php
get_header();
?>

<main>
    <?php
    $hero_title    = get_field('title') ?: "hi, I'm Marwa";
    $hero_subtitle = get_field('subtitle_title') ?: 'Web developer & designer';
    ?>
    <section id="landing" class="landing" role="region" aria-label="Section d’accueil" itemscope itemtype="https://schema.org/Person">
        <div class="content">
            <h1 class="title" itemprop="name">
            <span class="title-row">
                <span class="title-text"><?= esc_html($hero_title); ?></span>
                <img src="<?= esc_url(get_template_directory_uri() . '/assets/images/peonie.png'); ?>"
                     alt="" aria-hidden="true"
                     class="peony">
            </span>
                <span class="subtitle" itemprop="jobTitle"><?= esc_html($hero_subtitle); ?></span>
            </h1>

            <div class="clouds" aria-hidden="true">
                <img class="cloud cloud-left oscillate"
                     src="<?= esc_url(get_template_directory_uri() . '/assets/images/clouds-left.svg'); ?>" alt="">
                <img class="cloud cloud-right oscillate"
                     src="<?= esc_url(get_template_directory_uri() . '/assets/images/clouds-right.svg'); ?>" alt="">
            </div>
        </div>
    </section>




    <?php
    $projects_title    = get_field('projects_title') ?: 'A glimpse of my work';
    $projects_subtitle = get_field('subtitle_projects') ?: "A collection of digital experiences, interfaces and ideas I've brought to life.";

    $query_args = [
            'post_type'      => 'projets',
            'posts_per_page' => 4,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
    ];


    if (function_exists('pll_current_language')) {
        $query_args['lang'] = pll_current_language();
    }

    $projects = new WP_Query($query_args);

    // pagina Projets nella lingua giusta
    $projects_page = get_page_by_path('mes-projets');
    $projects_id   = $projects_page ? $projects_page->ID : 0;

    if ($projects_id && function_exists('pll_get_post')) {
        $projects_id = pll_get_post($projects_id) ?: $projects_id;
    }

    $projects_url = $projects_id ? get_permalink($projects_id) : home_url('/');
    $projects_button = get_field('projects_button');

    ?>


    <section class="projects-section" id="projets">
        <div class="projects">
            <h2><?= esc_html($projects_title); ?></h2>
            <p class="projects__subtitle"><?= esc_html($projects_subtitle); ?></p>

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

            <?php if ($projects_button) : ?>
                <a class="btn-outline" href="<?= esc_url($projects_url); ?>"><?= esc_html($projects_button); ?></a>
            <?php endif; ?>
        </div>
    </section>

    <?php
    $contact_title    = get_field('contact_title') ?: 'Un mot, un souffle';
    $contact_subtitle = get_field('subtitle_contact') ?: 'Je serais ravie d’échanger autour d’un projet, d’une idée ou simplement d’un rêve partagé.';

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
                <h2 id="contact-title"><?= esc_html($contact_title); ?></h2>
                <p class="contact__paragraphe"><?= esc_html($contact_subtitle); ?></p>
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
                            <?php if ($errors) : ?><p class="is-error"><?= esc_html(pf_t('Merci de corriger les champs indiqués ci-dessous.')); ?></p><?php endif; ?>
                        </div>

                        <form data-contact-form
                              action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate
                              aria-label="<?= esc_attr(pf_t('Formulaire de contact')); ?>"
                              data-err-name="<?= esc_attr(pf_t('Le nom est requis.')); ?>"
                              data-err-email="<?= esc_attr(pf_t('L’adresse email est requise.')); ?>"
                              data-err-email-bad="<?= esc_attr(pf_t('Adresse email invalide.')); ?>"
                              data-err-message="<?= esc_attr(pf_t('Le message est requis.')); ?>"
                              data-msg-fix="<?= esc_attr(pf_t('Merci de corriger les champs indiqués ci-dessous.')); ?>"
                              data-msg-fail="<?= esc_attr(pf_t('Une erreur est survenue, merci de réessayer.')); ?>">

                            <input type="hidden" name="action" value="handle_contact_form">
                            <input type="hidden" name="form_lang" value="<?= esc_attr(function_exists('pll_current_language') ? pll_current_language() : ''); ?>">
                            <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>

                            <div class="hp-field" aria-hidden="true">
                                <label for="website"><?= esc_html(pf_t('Ne pas remplir')); ?></label>
                                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <p class="form-note"><?= sprintf(esc_html(pf_t('Les champs marqués d’un %s sont obligatoires.')), '<span class="required">*</span>'); ?></p>

                            <div class="form-input-container">
                                <div class="form-input-wrapper <?= isset($errors['name']) ? 'has-error' : ''; ?>">
                                    <label for="name"><?= esc_html(pf_t('Nom')); ?> <span class="required">*</span></label>
                                    <input type="text" id="name" name="name" placeholder="<?= esc_attr(pf_t('Ex. Mark Smith')); ?>"
                                           value="<?= $val('name'); ?>" required aria-required="true" aria-describedby="err-name">
                                    <p class="field-error" id="err-name"><?= esc_html($errors['name'] ?? ''); ?></p>
                                </div>

                                <div class="form-input-wrapper <?= isset($errors['email']) ? 'has-error' : ''; ?>">
                                    <label for="email"><?= esc_html(pf_t('Email')); ?> <span class="required">*</span></label>
                                    <input type="email" id="email" name="email" placeholder="<?= esc_attr(pf_t('Ex. marksmith@gmail.com')); ?>"
                                           value="<?= $val('email'); ?>" required aria-required="true" aria-describedby="err-email">
                                    <p class="field-error" id="err-email"><?= esc_html($errors['email'] ?? ''); ?></p>
                                </div>

                                <div class="form-input-wrapper <?= isset($errors['message']) ? 'has-error' : ''; ?>">
                                    <label for="message"><?= esc_html(pf_t('Message')); ?> <span class="required">*</span></label>
                                    <textarea name="message" id="message" rows="8" placeholder="<?= esc_attr(pf_t('Ex. Écrivez votre message ici')); ?>"
                                              required aria-required="true" aria-describedby="err-message"><?= esc_textarea($old['message'] ?? ''); ?></textarea>
                                    <p class="field-error" id="err-message"><?= esc_html($errors['message'] ?? ''); ?></p>
                                </div>
                            </div>

                            <button class="btn-form" type="submit"><?= esc_html(pf_t('Contactez-moi !')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
