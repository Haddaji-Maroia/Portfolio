<?php
/* Template Name: About */
get_header();
$img = get_template_directory_uri() . '/assets/images/';
?>

    <main class="about-page">

        <!-- INTRO -->
        <section class="about-intro">
            <div class="about-intro__text">
                <p class="hanzi"><span lang="zh">我</span> wǒ · me</p>
                <h1>A little about me</h1>
                <p class="about-lead">Hi, I'm Marwa — a web developer &amp; designer based in Belgium.</p>
                <p>I enjoy turning ideas into thoughtful digital experiences, combining clean code with visual design. I'm especially drawn to projects where creativity and technology meet.</p>
                <p>When I'm not coding, you'll probably find me exploring new stories, discovering new places or learning something new.</p>
            </div>
        </section>

        <!-- JOURNEY -->
        <section class="about-journey">
            <h2>A journey in progress</h2>
            <p class="about-sub">Still learning, still creating, still curious.</p>

            <ul class="timeline">
                <li><span class="timeline__year">2023</span><p>Started my journey in web development</p></li>
                <li><span class="timeline__year">2024</span><p>Discovered my passion for interfaces &amp; digital experiences</p></li>
                <li><span class="timeline__year">2025</span><p>Building projects and expanding my technical skills</p></li>
                <li><span class="timeline__year">2026</span><p>Web development, projects and an internship</p></li>
            </ul>
        </section>

        <!-- WHAT I DO -->
        <section class="about-skills">
            <h2>What I do</h2>
            <p class="about-sub">Every tool I use leaves its mark.</p>

            <div class="seal-groups">

                <div class="seal-group">
                    <h3><span lang="zh" class="seal-group__hanzi">码</span> Development</h3>
                    <p>Building responsive and functional websites and applications.</p>
                    <ul class="seals">
                        <li class="seal">HTML</li>
                        <li class="seal">CSS</li>
                        <li class="seal seal--wide">JavaScript</li>
                        <li class="seal">PHP</li>
                        <li class="seal">Laravel</li>
                    </ul>
                </div>

                <div class="seal-group">
                    <h3><span lang="zh" class="seal-group__hanzi">画</span> Design</h3>
                    <p>Designing interfaces that feel clear, intuitive and visually coherent.</p>
                    <ul class="seals">
                        <li class="seal">Figma</li>
                        <li class="seal">UI design</li>
                        <li class="seal seal--wide">Responsive</li>
                    </ul>
                </div>

                <div class="seal-group">
                    <h3><span lang="zh" class="seal-group__hanzi">学</span> Exploring</h3>
                    <p>Always learning, experimenting and discovering new ways to create.</p>
                    <ul class="seals">
                        <li class="seal seal--draft">Flutter</li>
                        <li class="seal seal--draft seal--wide">WordPress</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- BEYOND THE SCREEN -->
        <section class="about-beyond">
            <h2>Beyond the screen</h2>
            <div class="cards">
                <div class="card"><span class="card__icon" aria-hidden="true">♡</span><h3>Currently learning</h3><p>Chinese &amp; new web technologies</p></div>
                <div class="card"><span class="card__icon" aria-hidden="true">⋆˚꩜｡</span><h3>Usually coding with</h3><p>Music, or a drama playing somewhere</p></div>
                <div class="card"><span class="card__icon" aria-hidden="true">˙⋆✮</span><h3>Dreaming about</h3><p>Working &amp; studying abroad</p></div>
                <div class="card"><span class="card__icon" aria-hidden="true">𐙚⋆.˚</span><h3>I love</h3><p>Design, stories &amp; visual details</p></div>
            </div>

            <ul class="hanzi-row" aria-hidden="true">
                <li><span lang="zh">我</span> wǒ · me</li>
                <li><span lang="zh">梦</span> mèng · dream</li>
                <li><span lang="zh">创</span> chuàng · create</li>
            </ul>
        </section>

    </main>

<?php get_footer(); ?>