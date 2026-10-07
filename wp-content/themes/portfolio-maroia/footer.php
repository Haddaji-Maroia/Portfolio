<?php
$front_id = (int) get_option('page_on_front');

if ($front_id && function_exists('pll_get_post')) {
    $front_id = pll_get_post($front_id) ?: $front_id;
}

$footer_text = $front_id ? get_field('footer_text', $front_id) : '';
$footer_text = $footer_text ?: 'Dessiné, codé et cultivé avec amour par Marwa';
?>
<footer class="site-footer" role="contentinfo">
    <img class="site-footer__peony"
         src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/peonie.png'); ?>"
         alt="" aria-hidden="true">

    <div class="site-footer__inner">
        <p class="site-footer__made"><?= esc_html($footer_text); ?></p>

        <ul class="site-footer__links">
            <li><a href="https://github.com/Haddaji-Maroia" target="_blank" rel="noopener" aria-label="Profil GitHub de Marwa">GitHub</a></li>
            <li><a href="#" target="_blank" rel="noopener" aria-label="Profil LinkedIn de Marwa">LinkedIn</a></li>
        </ul>

        <p class="site-footer__hanzi" aria-hidden="true">
            <span lang="zh">我</span><span class="dot">✿</span><span lang="zh">梦</span><span class="dot">✿</span><span lang="zh">创</span>
        </p>

        <p class="site-footer__copy">&copy; <?php echo date('Y'); ?> Marwa Haddaji</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>