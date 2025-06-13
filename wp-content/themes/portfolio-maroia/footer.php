<footer>
    <nav class="footer-nav">
        <div class="footer-column">
            <h3>Coordonnées</h3>
            <ul>
                <li><a href="tel:+32465309771">+32 (0)465 30 97 71</a></li>
                <li><a href="mailto:maroia.haddaji@student.hepl.be">maroia.haddaji@student.hepl.be</a></li>
                <li>Beyne-Heusay, Province de Liège, Belgique</li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Navigation</h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ]);
            ?>
        </div>

        <div class="footer-column">
            <h3>Social</h3>
            <ul>
                <li><a href="https://github.com/Haddaji-Maroia" target="_blank" rel="noopener">Github</a></li>
                <li><a href="https://linkedin.com/" target="_blank" rel="noopener">LinkedIn</a></li>
            </ul>
        </div>
    </nav>

    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Maroia Haddaji. Tous droits réservés.</p>
    </div>

    <?php wp_footer(); ?>
</footer>
</body>
</html>
