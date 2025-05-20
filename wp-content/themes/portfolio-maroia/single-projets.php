

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
                <p>
                    <?php $description = get_field('description') ?>
                    <?= $description !== '' ? $description : '' ?>
                </p>
                <a href="">Link Figma</a>
                <p class="tech_title"><strong>Technologies :</strong></p>

                <?php
                // Check if the repeater field has rows of data
                if (have_rows('technologies')) : ?>
                    <div class="bloc_technologies">
                        <?php
                        // Loop through the rows of data
                        while (have_rows('technologies')) : the_row();
                            // Get sub field value
                            $tech_name = get_sub_field('technology_name');
                            // Output if not empty
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

        // Check rows exists.
        if (have_rows('about_project')) : ?>

            <div class="explaination">

                <?php
                // Loop through rows.
                while (have_rows('about_project')) : the_row();

                    // Load sub field values.
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
                    // End loop.
                endwhile;
                ?>

            </div>

        <?php
// No value.
        else :
            echo '<p>Nessuna sezione disponibile al momento.</p>';
        endif;
        ?>

    </div>
</section>

<?php get_footer(); ?>




