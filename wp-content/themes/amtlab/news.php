<?php
/* Template Name: News */
get_header();  // Подключает шапку темы
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/allnews.css"  type="text/css" />

        <?php
        // Параметры запроса для вывода новостей
        $args = array(
            'post_type'      => 'news',         // Тип записи
            'posts_per_page' => 300,             // Количество новостей на странице
            'orderby'        => 'date',         // Сортировка по дате
            'order'          => 'DESC',         // Отображение от новых к старым
        );

        $news_query = new WP_Query($args);
        
        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();
                ?>

<div class="employee-card">
    <?php if (get_field('news-image')) : ?>
        <div class="news-photo">
            <img src="<?php the_field('news-image'); ?>" alt="<?php the_title(); ?>"/>
        </div>
    <?php endif; ?>
    <div class="employee-details">
        <h3 class="employee-name"><?php echo get_the_date('d.m.Y'); ?></h3>
        <p class="employee-position"><?php the_field('news-text'); ?></p>
    </div>
</div>
    
            <?php endwhile;

            // Пагинация
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total' => $news_query->max_num_pages, // Общее количество страниц
                'prev_text' => '« Назад',
                'next_text' => 'Вперед »',
            ));
            echo '</div>';

        else :
            echo '<p>Нет новостей для отображения.</p>';
        endif;

        wp_reset_postdata(); // Сбрасываем данные запроса
        ?>

<?php get_footer(); ?>
