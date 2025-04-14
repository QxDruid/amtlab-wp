<?php
/*
Template Name: Публикации
*/
get_header(); ?>

<br>    
 <h2 class="title">Публикации</h2> <br>
<br>

<div class="publications-container">
    <?php
    $years = get_posts(array(
        'post_type' => 'publications',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'orderby' => 'meta_value_num',
        'meta_key' => 'publication_year',
        'order' => 'DESC',
    ));

    $unique_years = array_unique(array_map(function ($post_id) {
        return get_field('publication_year', $post_id);
    }, $years));

    foreach ($unique_years as $year) :
    ?>
        <input type="checkbox" id="year-<?php echo esc_attr($year); ?>" class="toggle">
        <label class="dis_header" for="year-<?php echo esc_attr($year); ?>">
            <strong><?php echo esc_html($year); ?></strong>
        </label>
        <div class="div_body">
            <ol>
                <?php
                $publications = new WP_Query(array(
                    'post_type' => 'publications',
                    'meta_query' => array(
                        array(
                            'key' => 'publication_year',
                            'value' => $year,
                            'compare' => '='
                        )
                    ),
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => -1
                ));

                while ($publications->have_posts()) : $publications->the_post();
                    $title = get_field('publication_title');
                    $link = get_field('publication_link');
                ?>
                    <li>
                        <?php echo wp_kses_post($title); ?>
                        <a href="<?php echo esc_url($link); ?>" target="_blank" style="color:#364c92;">
                            <b>DOI: <?php echo esc_html($link); ?></b>
                        </a>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ol>
        </div>
    <?php endforeach; ?>
</div>

<?php get_footer(); ?>
