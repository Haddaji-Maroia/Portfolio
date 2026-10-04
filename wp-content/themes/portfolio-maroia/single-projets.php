<?php get_header(); ?>

<?php
$back_page = get_page_by_path('mes-projets');
$back_url  = $back_page ? get_permalink($back_page) : home_url('/projets/');

// immagini del progetto: galleria, oppure immagine singola
$raw    = get_field('galerie_projects') ?: get_field('image_projet');
$images = [];

if ($raw) {
    $items = (is_array($raw) && isset($raw[0])) ? $raw : [$raw];

    foreach ($items as $item) {
        if (is_array($item)) {
            $images[] = [
                    'thumb' => $item['sizes']['large'] ?? $item['url'] ?? '',
                    'full'  => $item['url'] ?? '',
                    'alt'   => $item['alt'] ?? '',
            ];
        } elseif (is_numeric($item)) {
            $images[] = [
                    'thumb' => wp_get_attachment_image_url((int) $item, 'large'),
                    'full'  => wp_get_attachment_image_url((int) $item, 'full'),
                    'alt'   => get_post_meta((int) $item, '_wp_attachment_image_alt', true),
            ];
        } elseif (is_string($item)) {
            $images[] = ['thumb' => $item, 'full' => $item, 'alt' => ''];
        }
    }
}
$total = count($images);
?>

    <main class="single-project">

        <header class="sp-hero">
            <a class="sp-back" href="<?= esc_url($back_url); ?>">← Tous les projets</a>
            <h1><?php the_title(); ?></h1>
        </header>

        <?php if ($images) : ?>
            <div class="sp-gallery__grid" id="galerie">
                <?php foreach ($images as $n => $image) : ?>
                    <?php if (!empty($image['thumb'])) : ?>
                        <figure>
                            <a href="#img-<?= $n; ?>" aria-label="Agrandir l’image">
                                <img src="<?= esc_url($image['thumb']); ?>" alt="<?= esc_attr($image['alt']); ?>" loading="lazy">
                            </a>
                        </figure>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <?php foreach ($images as $n => $image) : ?>
                <?php if (!empty($image['thumb'])) : ?>
                    <div class="lb" id="img-<?= $n; ?>">
                        <a class="lb__bg" href="#galerie" aria-label="Fermer"></a>
                        <img class="lb__img" src="<?= esc_url($image['full'] ?: $image['thumb']); ?>" alt="<?= esc_attr($image['alt']); ?>" loading="lazy">
                        <a class="lb__btn lb__close" href="#galerie" aria-label="Fermer">×</a>
                        <?php if ($total > 1) : ?>
                            <a class="lb__btn lb__prev" href="#img-<?= ($n - 1 + $total) % $total; ?>" aria-label="Image précédente">‹</a>
                            <a class="lb__btn lb__next" href="#img-<?= ($n + 1) % $total; ?>" aria-label="Image suivante">›</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <section class="sp-intro">
            <div class="sp-intro__text">
                <?php $description_project = get_field('description_project'); ?>
                <?php if ($description_project) : ?>
                    <p><?= wp_kses_post($description_project); ?></p>
                <?php endif; ?>

                <?php if (have_rows('link_project')) : ?>
                    <div class="sp-links">
                        <?php $i = 0; while (have_rows('link_project')) : the_row();
                            $link_name = get_sub_field('link_name');
                            $link_url  = get_sub_field('link_url');
                            if ($link_name && $link_url) : ?>
                                <a class="sp-btn <?= $i === 0 ? 'sp-btn--filled' : ''; ?>"
                                   href="<?= esc_url($link_url); ?>" target="_blank" rel="noopener noreferrer">
                                    <?= esc_html($link_name); ?>
                                </a>
                                <?php $i++; endif;
                        endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (have_rows('technologies')) : ?>
                <aside class="sp-tech">
                    <h2>Technologies</h2>
                    <ul>
                        <?php while (have_rows('technologies')) : the_row();
                            $tech_name = get_sub_field('technology_name');
                            if (!empty($tech_name)) : ?>
                                <li><?= esc_html($tech_name); ?></li>
                            <?php endif;
                        endwhile; ?>
                    </ul>
                </aside>
            <?php endif; ?>
        </section>

        <?php if (have_rows('about_project')) : ?>
            <section class="sp-about">
                <div class="sp-about__grid">
                    <?php while (have_rows('about_project')) : the_row();
                        $title       = get_sub_field('title_box_description');
                        $description = get_sub_field('explications');
                        if (empty($title) && empty($description)) continue; ?>
                        <article class="sp-card">
                            <?php if (!empty($title)) : ?>
                                <h3><?= esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($description)) : ?>
                                <p><?= esc_html($description); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>

        <div class="sp-footer">
            <a class="sp-btn" href="<?= esc_url($back_url); ?>">← Tous les projets</a>
        </div>

    </main>

<?php get_footer(); ?>