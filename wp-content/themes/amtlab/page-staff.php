<?php
/* Template Name: Сотрудники */

get_header();

// Запрос на получение сотрудников
$args = array(
    'post_type' => 'employee',
    'posts_per_page' => -1 // Получаем все записи
);
$employee_query = new WP_Query($args);

if ($employee_query->have_posts()) :
    echo '<div class="employee-container">';
    while ($employee_query->have_posts()) : $employee_query->the_post();
        ?>
        <div class="employee-card">
            <?php if (get_field('photo')) : ?>
                <div class="employee-photo">
                    <img src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>" />
                </div>
            <?php endif; ?>
            <div class="employee-details">
                <h3 class="employee-name"><?php the_title(); ?></h3>
                <p class="employee-position"><?php the_field('position'); ?></p>
                <p class="employee-degree"><?php the_field('grade'); ?></p>
                <p class="employee-email"><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                
                <div class="employee-interests-wrapper">
                    <p class="employee-interests-label">Сфера интересов:</p>
                    <p class="employee-interests"><?php the_field('interests'); ?></p>
                </div>
            </div>
        </div>
        <?php
    endwhile;
    echo '</div>';
else :
    echo '<p>Сотрудники не найдены.</p>';
endif;

wp_reset_postdata();

get_footer();
