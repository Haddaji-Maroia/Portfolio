<?php
/* Template Name: About */
get_header();

$title    = get_field('about_title');
$lead     = get_field('about_lead');
$text     = get_field('about_text');
$j_title  = get_field('journey_title');
$j_sub    = get_field('journey_subtitle');
$s_title  = get_field('skills_title');
$b_title  = get_field('beyond_title');

$timeline = get_field('timeline') ?: [];
$groups   = get_field('skill_groups') ?: [];
$cards    = get_field('beyond_cards') ?: [];
?>

    <main class="about-page">

        <!-- INTRO -->
        <section class="about-intro">
            <div class="about-intro__text">
                <p class="hanzi" aria-hidden="true"><span lang="zh">我</span> wǒ · me</p>

                <?php if ($title) : ?><h1><?= esc_html($title); ?></h1><?php endif; ?>
                <?php if ($lead) : ?><p class="about-lead"><?= esc_html($lead); ?></p><?php endif; ?>
                <?php if ($text) : ?><?= wp_kses_post($text); ?><?php endif; ?>
            </div>
        </section>

        <!-- JOURNEY -->
        <?php if ($timeline) : ?>
            <section class="about-journey">
                <?php if ($j_title) : ?><h2><?= esc_html($j_title); ?></h2><?php endif; ?>
                <?php if ($j_sub) : ?><p class="about-sub"><?= esc_html($j_sub); ?></p><?php endif; ?>

                <ul class="timeline">
                    <?php foreach ($timeline as $step) : ?>
                        <li>
                            <span class="timeline__year"><?= esc_html($step['year']); ?></span>
                            <p><?= esc_html($step['text']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <!-- WHAT I DO -->
        <?php if ($groups) : ?>
            <section class="about-skills">
                <?php if ($s_title) : ?><h2><?= esc_html($s_title); ?></h2><?php endif; ?>

                <div class="lantern-groups">
                    <?php foreach ($groups as $group) :
                        $items = array_filter(array_map('trim', preg_split('/\R/', (string) $group['group_items']))); ?>
                        <div class="lantern-group">
                            <h3><?= esc_html($group['group_title']); ?></h3>
                            <ul class="lanterns">
                                <?php foreach ($items as $item) : ?>
                                    <li><?= esc_html($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- BEYOND THE SCREEN -->
        <?php if ($cards) : ?>
            <section class="about-beyond">
                <?php if ($b_title) : ?><h2><?= esc_html($b_title); ?></h2><?php endif; ?>

                <div class="cards">
                    <?php foreach ($cards as $card) : ?>
                        <div class="card">
                            <span class="card__icon" aria-hidden="true"><?= esc_html($card['card_icon']); ?></span>
                            <h3><?= esc_html($card['card_title']); ?></h3>
                            <p><?= esc_html($card['card_text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <ul class="hanzi-row" aria-hidden="true">
                    <li><span lang="zh">我</span> wǒ · me</li>
                    <li><span lang="zh">梦</span> mèng · dream</li>
                    <li><span lang="zh">创</span> chuàng · create</li>
                </ul>
            </section>
        <?php endif; ?>

    </main>

<?php get_footer(); ?>