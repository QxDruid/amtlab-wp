<?php
/* Template Name: Главная */
get_header();  // Подключает шапку темы
?>

<div class="main-content-wrapper">
    <div class="main-content">
        <!-- Slider Section -->
        <section class="slider-container">
            <div class="slider">
                <?php
                $slides = get_posts(array('post_type' => 'slider', 'numberposts' => -1));
                foreach ($slides as $slide) {
                    $image = get_field('slider-image', $slide->ID);
                    $link = get_field('slider-link', $slide->ID);
                    if ($image): ?>
                        <div class="slide">
                            <?php if ($link): ?>
                                <a href="<?php echo esc_url($link); ?>">
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title($slide->ID)); ?>" />
                                </a>
                            <?php else: ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title($slide->ID)); ?>" />
                            <?php endif; ?>
                        </div>
                    <?php endif;
                }
                ?>
            </div>
            <div class="slider-controls">
                <button class="prev-slide" aria-label="Previous slide">❮</button>
                <div class="slider-dots"></div>
                <button class="next-slide" aria-label="Next slide">❯</button>
            </div>
        </section>

        <!-- Main Content Section -->
        <article class="post">
            <div class="entry">
                <h2 class="title">Лаборатория новых материалов и перспективных технологий</h2>
                <p>Лаборатория новых материалов и перспективных технологий СФТИ ТГУ создана в 2008 году. На базе лаборатории проводятся исследования в области физики и химии. В круг научных интересов лаборатории входит несколько направлений, связанных как с синтезом, так и с исследованиями физико-химических и функциональных свойств различных материалов. Основные направления:</p>
                <ul>                  
                    <li>спектроскопия, включая лазерную спектроскопию;</li>
                    <li>нелинейная кристаллооптика, лазерная абляция, как метод синтеза нанострутур;</li>
                    <li>фотохимия, включая фотокатализ;</li>
                    <li>электрохимические методы анализа, химические методы синтеза наноматериалов, включая квантовые точки, физико-химические свойства наноматериалов.</li>
                </ul>
                <p>Лаборатория интегрирована в структуру центров коллективного пользования ТГУ, что позволяет значительно расширить круг проводимых исследований в частности широко применять методы электронной микроскопии и рентгеновского анализа.</p>
                <p>Лаборатория является базовой для физического, химического и радиофизического факультетов ТГУ: сотрудники лаборатории читают на этих факультетах спецкурсы, а студенты и аспиранты &ndash; занимаются научной работой в лаборатории.</p>
                <p>Пример получения золотых наночастиц методом лазерной абляции.</p>
                <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </article>
    </div>
    
    <!-- News Sidebar -->
    <aside class="news-sidebar">
        <?php include get_template_directory() . '/patterns/dynamic_news.php'; ?>
    </aside>
</div>

<?php get_footer();  // Подключает подвал темы ?>