<?php
/* Template Name: Главная */
get_header();  // Подключает шапку темы
?>

<div class="main-content-wrapper">
    <div class="main-content">
        <div id="slider-wrapper">  
            <div id="slider" class="nivoSlider">
                <?php
                $slides = get_posts(array('post_type' => 'slider', 'numberposts' => -1));
                foreach ($slides as $slide) {
                    $image = get_field('slider-image', $slide->ID);
                    $link = get_field('slider-link', $slide->ID);
                    if ($image): ?>
                        <?php if ($link): ?>
                            <a href="<?php echo esc_url($link); ?>">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title($slide->ID)); ?>" />
                            </a>
                        <?php else: ?>
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title($slide->ID)); ?>" />
                        <?php endif; ?>
                    <?php endif;
                }
                ?>
            </div>
        </div>

        <div class="post">
            <div class="entry">
                <br>
                <h2 class="title">Лаборатория новых материалов и перспективных технологий</h2>
                <br>		
                <p>Лаборатория новых материалов и перспективных технологий СФТИ ТГУ создана в 2008 году. На базе лаборатории проводятся исследования в области физики и химии. В круг научных интересов лаборатории входит несколько направлений, связанных как с синтезом, так и с исследованиями физико-химических и функциональных свойств различных материалов. Основные направления:
                <ul>                  
                    <li>спектроскопия, включая лазерную спектроскопию;
                    <li> нелинейная кристаллооптика, лазерная абляция, как метод синтеза нанострутур; 
                    <li>фотохимия, включая фотокатализ;
                    <li> электрохимические методы анализа, химические методы синтеза наноматериалов, включая квантовые точки, физико-химические свойства наноматериалов.
                </ul>
                </p>
                <p>
                    Лаборатория интегрирована в структуру центров коллективного пользования ТГУ, что позволяет значительно расширить круг проводимых исследований в частности широко применять методы электронной микроскопии и рентгеновского анализа.</p>
                <p>
                    Лаборатория является базовой для физического, химического и радиофизического факультетов ТГУ: сотрудники лаборатории читают на этих факультетах спецкурсы, а студенты и аспиранты &ndash; занимаются научной работой в лаборатории.</p>

                <p> Пример получения золотых наночастиц методом лазерной абляции. <br> <br>
                <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                </p>				
            </div>
            <p class="pad-top">&nbsp;</p>				
        </div>
    </div>
    
    <div class="news-sidebar">
        <?php include get_template_directory() . '/patterns/dynamic_news.php'; ?>
    </div>
</div>

<?php get_footer();  // Подключает подвал темы ?>