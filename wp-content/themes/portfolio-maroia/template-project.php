<?php /* Template Name: Page : "Projets" */?>

<?=get_header();?>


<section id="projects" class="projects-section">
    <div class="projects">
        <h2>Mes projets</h2>
        <p>Voici une sélection de projets que j’ai réalisés durant mes études et mes expériences personnelles. Vous y trouverez des sites web, des maquettes graphiques et d’autres créations digitales.</p>
        <div class="project-container">
            <article class="project">
                <div class="floating">
                    <a class="project-card" href="">
                        <div class="project-cover">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio.png" alt="portfolio cover">
                                <span>Portfolio</span>
                            </figure>
                        </div>
                    </a>
                </div>
            </article>

            <article class="project">
                <div class="floating">
                    <a class="project-card" href="">
                        <div class="project-cover">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ghibliWonders.png" alt="Ghibli Wonders app cover">
                                <span>Ghibli Wonders</span>
                            </figure>
                        </div>
                    </a>
                </div>
            </article>

            <article class="project">
                <div class="floating">
                    <a class="project-card" href="">
                        <div class="project-cover">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/luffyMood.png" alt="LuffyMood app cover">
                                <span>LuffyMood</span>
                            </figure>
                        </div>
                    </a>
                </div>
            </article>

            <article class="project">
                <div class="floating">
                    <a class="project-card" href="">
                        <div class="project-cover">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cv.png" alt="cv cover">
                                <span>CV</span>
                            </figure>
                        </div>
                    </a>
                </div>
            </article>

            <article class="project">
                <div class="floating">
                    <a class="project-card" href="">
                        <div class="project-cover">
                            <figure>
                                <img src="" alt="">
                                <span>Foody App</span>
                            </figure>
                        </div>
                    </a>
                </div>
            </article>

            <article class="project">
                <div class="floating">
                    <a class="project-card" href="">
                        <div class="project-cover">
                            <figure>
                                <img src="" alt="">
                                <span>Museum App</span>
                            </figure>
                        </div>
                    </a>
                </div>
            </article>
        </div>
        <div class="button-wrapper">
            <a class="btn-projects" href="html/projects.html">Explorer  →</a>
        </div>
        <!--<img class="corner-project corner-top-left-project" src="images/frame-decoration.svg" alt="decoration chinese style">
        <img class="corner-project corner-bottom-right-project" src="images/frame-decoration.svg" alt="decoration chinese style"> -->
    </div>
</section>



<?=get_footer();?>


