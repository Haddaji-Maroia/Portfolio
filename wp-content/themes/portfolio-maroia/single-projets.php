

<?php get_header(); ?>

<section class="single-project">
    <div class="container">
        <h1><?php the_title(); ?></h1>

        <div class="project_presentation">
            <div class="image_cover">
                <?php if (has_post_thumbnail()) : ?>
                    <figure><?php the_post_thumbnail('large'); ?></figure>
                <?php endif; ?>
            </div>

            <div class="text_projet">
                <a href="<?php echo get_permalink(get_page_by_path('mes-projets')); ?>">← Tous les projets</a>
                <?php
                $description = get_field('description_projet');
                if (!empty($description)) : ?>
                    <p><?= esc_html($description); ?></p>
                <?php endif; ?>

                <?php
                $figma_link = get_field('figma_link');
                if (!empty($figma_link)) : ?>
                    <a href="<?= esc_url($figma_link); ?>" target="_blank" rel="noopener noreferrer">Link Figma</a>
                <?php endif; ?>

                <p class="tech_title"><strong>Technologies :</strong></p>

                <?php

                if (have_rows('technologies')) : ?>
                    <div class="bloc_technologies">
                        <?php

                        while (have_rows('technologies')) : the_row();

                            $tech_name = get_sub_field('technology_name');

                            if (!empty($tech_name)) :
                                ?>
                                <span class="tech-badge"><?= esc_html($tech_name); ?></span>
                            <?php
                            endif;

                        endwhile;
                        ?>
                    </div>
                <?php else : ?>
                    <p>No technologies</p>
                <?php endif; ?>

            </div>
        </div>

        <?php

        if (have_rows('about_project')) : ?>

            <div class="explaination">

                <?php

                while (have_rows('about_project')) : the_row();


                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    ?>


                    <div class="cardproject">
                        <?php if (!empty($title)) : ?>
                            <h3><?= esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($description)) : ?>
                            <p><?= esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>

                <?php

                endwhile;
                ?>

            </div>

        <?php
        else :
            echo '<p>no section</p>';
        endif;
        ?>

    </div>
</section>

<?php get_footer(); ?>




