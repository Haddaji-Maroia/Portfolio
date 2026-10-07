<?php /* Template Name: Page : "Projets" */ ?>
<?php get_header(); ?>

<?php
$page_title = get_field('title');
$page_desc  = get_field('description');
$all_label  = get_field('filter_all');

$lang = function_exists('pll_current_language') ? pll_current_language() : '';

// progetti nella lingua corrente
$query_args = [
        'post_type'      => 'projets',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
];
if ($lang) {
    $query_args['lang'] = $lang;
}
$projects = new WP_Query($query_args);
$types = [];
foreach ($projects->posts as $p) {
    $terms = get_the_terms($p->ID, 'type_projet');
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $t) {
            $types[$t->slug] = $t->name;
        }
    }
}
?>

    <section id="projects" class="projects-section projects-page">
        <div class="projects">
            <h1 class="sr-only"><?php the_title(); ?></h1>

            <?php if ($page_title) : ?><h2><?= esc_html($page_title); ?></h2><?php endif; ?>
            <?php if ($page_desc) : ?><p class="projects__subtitle"><?= esc_html($page_desc); ?></p><?php endif; ?>

            <?php if ($types) : ?>
                <div class="filter-buttons" role="group">
                    <button type="button" data-filter="all" class="active"><?= esc_html($all_label); ?></button>
                    <?php foreach ($types as $slug => $name) : ?>
                        <button type="button" data-filter="<?= esc_attr($slug); ?>"><?= esc_html($name); ?></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($projects->have_posts()) : ?>
                <div class="projects__grid">
                    <?php while ($projects->have_posts()) : $projects->the_post();
                        $terms   = get_the_terms(get_the_ID(), 'type_projet');
                        $classes = 'project-card project';
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $classes .= ' ' . $term->slug;
                            }
                        }
                        ?>
                        <a class="<?= esc_attr($classes); ?>" href="<?php the_permalink(); ?>">
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
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll(".filter-buttons button");
            const projects = document.querySelectorAll(".project");

            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const filter = button.getAttribute("data-filter");

                    buttons.forEach(btn => btn.classList.remove("active"));
                    button.classList.add("active");

                    projects.forEach(project => {
                        project.style.display =
                            (filter === "all" || project.classList.contains(filter)) ? "" : "none";
                    });
                });
            });
        });
    </script>

<?php get_footer(); ?>