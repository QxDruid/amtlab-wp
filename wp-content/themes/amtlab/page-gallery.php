<?php
/*
Template Name: Галерея
*/
get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/gallery.css" type="text/css" />

<div class="main-content-wrapper">
    <div class="main-content">
        <div class="gallery-container">
            <?php
            $gallery_query = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => -1));
            if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) : $gallery_query->the_post();
                    if (get_field('gallery_image')):
            ?>
                <div class="gallery-item">
                    <img src="<?php the_field('gallery_image')?>" alt="<?php the_title(); ?>">
                </div>
            <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
    
    <!-- News Sidebar -->
    <aside class="news-sidebar">
        <?php include get_template_directory() . '/patterns/dynamic_news.php'; ?>
    </aside>
</div>

<?php get_footer(); ?>
