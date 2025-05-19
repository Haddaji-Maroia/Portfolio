<?php /* Template Name: Page : "Projets" */?>

<?=get_header();?>


<section id="projects" class="projects-section">
    <div class="projects">
        <h2>Mes projets</h2>
        <p>Voici une sélection de projets que j’ai réalisés durant mes études et mes expériences personnelles. Vous y trouverez des sites web, des maquettes graphiques et d’autres créations digitales.</p>

        <div class="project-container">
            <?php
            $args = [
                'post_type' => 'projets',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ];
            $projects = new WP_Query($args);
            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    ?>
                    <article class="project">
                        <div class="floating">
                            <a class="project-card" href="<?php the_permalink(); ?>">
                                <div class="project-cover">
                                    <figure>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium'); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.png" alt="default">
                                        <?php endif; ?>
                                        <span><?php the_title(); ?></span>
                                    </figure>
                                </div>
                            </a>
                        </div>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p>Aucun projet trouvé.</p>
            <?php endif; ?>
        </div>


    </div>
</section>



<?=get_footer();?>


