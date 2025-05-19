<?php /* Template Name: Page : "Projets" */?>

<?=get_header();?>



<section id="projects" class="projects-section">
    <div class="projects">
        <h2>
            <?php $title = get_field('title') ?>
            <?= $title !== '' ? $title : '' ?>
        </h2>
        <p>
            <?php $description = get_field('description') ?>
            <?= $description !== '' ? $description : '' ?>
        </p>

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
                                        <figure>
                                            <?php the_post_thumbnail('medium'); ?>
                                            <span><?php the_title(); ?></span>
                                        </figure>
                                    </figure>
                                </div>
                            </a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>


    </div>
</section>



<?=get_footer();?>


