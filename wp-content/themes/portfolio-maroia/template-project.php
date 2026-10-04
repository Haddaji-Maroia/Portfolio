<?php /* Template Name: Page : "Projets" */ ?>
<?php get_header(); ?>

    <section id="projects" class="projects-section projects-page">
        <div class="projects">
            <h1 class="sr-only">Projects page</h1>

            <h2>
                <?php $title = get_field('title'); ?>
                <?= $title ? esc_html($title) : ''; ?>
            </h2>

            <p class="projects__subtitle">
                <?php $description = get_field('description'); ?>
                <?= $description ? esc_html($description) : ''; ?>
            </p>

            <!-- Filter Buttons -->
            <div class="filter-buttons">
                <button data-filter="all" class="active">Tous</button>
                <button data-filter="web">Web</button>
                <button data-filter="mobile">Mobile</button>
                <button data-filter="design">Design</button>
            </div>

            <!-- Projects Grid -->
            <?php
            $projects = new WP_Query([
                    'post_type'      => 'projets',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
            ]);
            ?>

            <?php if ($projects->have_posts()) : ?>
                <div class="projects__grid">
                    <?php while ($projects->have_posts()) : $projects->the_post();

                        // tassonomia "type_projet" -> classi sulla card
                        $terms = get_the_terms(get_the_ID(), 'type_projet');
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
            <?php else : ?>
                <p>Aucun projet trouvé.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- JS per filtro progetti -->
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
                        if (filter === "all" || project.classList.contains(filter)) {
                            project.style.display = "";
                        } else {
                            project.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>

<?php get_footer(); ?>