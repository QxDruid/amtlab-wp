<?php
/**
 * Template Name: Контакты
 * Description: A template for the contacts page
 */

get_header(); ?>

<div class="main-content-wrapper">
    <div class="main-content">
        <div class="contact-info">
            <div class="contact-block">
                <h2>Адрес</h2>
                <p>
                    634050, Томск, пл. Новособорная, 1<br>
                    СФТИ ТГУ<br>
                    Лаборатория новых материалов и перспективных технологий
                </p>
            </div>
            
            <div class="contact-block">
                <h2>Контактная информация</h2>
                <p>
                    <strong>Тел./Факс:</strong> +7(3822)53-15-91<br>
                    <strong>E-mail:</strong> <a href="mailto:amtlab@mail.ru">amtlab@mail.ru</a>
                </p>
            </div>
        </div>
        
        <div class="map-container">
            <div class="map-wrapper">
                <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=8gbdYE1oQw83KeiYvfWv8pmSZeFtOehf&width=100%&height=450"></script>
            </div>
        </div>
            
    </div> 
        <!-- News Sidebar -->
        <aside class="news-sidebar">
            <?php include get_template_directory() . '/patterns/dynamic_news.php'; ?>
        </aside>
</div>

<?php get_footer(); ?> 