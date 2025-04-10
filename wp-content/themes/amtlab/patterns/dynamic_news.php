<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/news.css"  type="text/css" />
<div class="sidecont rightsector">
	<div class="sidebar sidebar-right">
<div class="widget widget_sideblog">
    <h2><font color="#294c94">Новости</font></h2>
    <div id="news-container">
        <?php
        // Параметры запроса для новостей
        $args = array(
            'post_type'      => 'news',         // Тип записи
            'posts_per_page' => 10,              // Количество новостей на странице
            'orderby'        => 'date',         // Сортировка по дате
            'order'          => 'DESC',         // Отображение от новых к старым
        );

        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            echo '<ul id="news-list">';
            while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                <li class="news-item">
                    <b><font color="#cd5700"><?php echo get_the_date('d.m.Y'); ?></font></b>
                        <div class="news-content">
                    
                        <?php if (get_field('news-image')) : ?>
                        <div class="news-photo">
                            <img src="<?php the_field('news-image'); ?>"/>
                        </div>
                        <?php endif; ?>
                        <div class="full-news-text"><?php the_field('news-text'); ?></div>
                    </div>
                </li>
            <?php endwhile;
            echo '</ul>';
        else :
            echo '<p>Нет новостей для отображения.</p>';
        endif;

        wp_reset_postdata(); // Сбрасываем данные запроса
        ?>
    </div> <!-- /news-container -->
    <div class="view-all-news">
        <a href="<?php echo home_url('/allnews/'); ?>">Все новости</a> <!-- Ссылка на архив новостей -->
    </div>
</div>


</div>
</div>	
</div>

