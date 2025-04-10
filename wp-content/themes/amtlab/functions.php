<?php
function mytheme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('staff-page-style', get_template_directory_uri() . '/css/staff.css');
    wp_enqueue_style('gallery-style', get_template_directory_uri() . '/css/gallery.css');

    wp_enqueue_style('publications-style', get_template_directory_uri() . '/css/publications.css');

    wp_enqueue_style('menumatic-style', get_template_directory_uri() . '/css/menu/MenuMatic.css'); 
    wp_enqueue_style('screen-style', get_template_directory_uri() . '/css/screen.css'); 
    wp_enqueue_style('style-style', get_template_directory_uri() . '/css/style.css'); 
    wp_enqueue_style('slider-style', get_template_directory_uri() . '/css/slider.css'); 
    wp_enqueue_style('nivo-slider-style', get_template_directory_uri() . '/css/nivo-slider.css');
    wp_enqueue_style('nggallery-slider-style', get_template_directory_uri() . '/css/plugins/nggallery.css');
    wp_enqueue_style('filebase-slider-style', get_template_directory_uri() . '/css/plugins/wp-filebase.css');
    wp_enqueue_style('shutter-slider-style', get_template_directory_uri() . '/css/plugins/shutter-reloaded.css');
    wp_enqueue_style('popup-slider-style', get_template_directory_uri() . '/css/plugins/popup.css');
    wp_enqueue_style('event-list-slider-style', get_template_directory_uri() . '/css/plugins/event-list.css');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

function create_news_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Новости',
            'singular_name' => 'Новость',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'show_in_rest' => true,
        'supports' => array('title'),
        'capability_type' => 'post', // Добавляем права, чтобы WP не путался
        'menu_position' => 5, // Размещаем в админке рядом с "Записями"
        'menu_icon' => 'dashicons-info', // Иконка для новостей

    );
    register_post_type('news', $args);
}
add_action('init', 'create_news_post_type');

function create_employee_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Сотрудники',
            'singular_name' => 'Сотрудник',
            'add_new' => 'Добавить нового',
            'add_new_item' => 'Добавить нового сотрудника',
            'edit_item' => 'Редактировать сотрудника',
            'new_item' => 'Новый сотрудник',
            'view_item' => 'Посмотреть сотрудника',
            'search_items' => 'Искать сотрудников',
            'not_found' => 'Сотрудники не найдены',
            'not_found_in_trash' => 'Сотрудники не найдены в корзине',
            'all_items' => 'Все сотрудники',
            'menu_name' => 'Сотрудники',
        ),
        'public' => true,
        'supports' => array('title'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'employees'),
        'show_in_rest' => true, // для Gutenberg
        'menu_icon' => 'dashicons-businessperson', // Иконка для сотрудников
    );
    register_post_type('employee', $args);
}
add_action('init', 'create_employee_post_type');

function create_slider_cpt() {
    $args = array(
        'label' => 'Слайды',
        'public' => true,
        'menu_icon' => 'dashicons-format-image', // Иконка в админке
        'supports' => array('title'), // Только заголовок и изображение
    );
    
    register_post_type('slider', $args);
}
add_action('init', 'create_slider_cpt');


function create_gallery_post_type() {
    register_post_type('gallery', array(
        'label' => 'Галерея',
        'public' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail'),
    ));
}
add_action('init', 'create_gallery_post_type');

function create_publications_post_type() {
    register_post_type('publications', array(
        'label' => 'Публикации',
        'public' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title'),
    ));
}
add_action('init', 'create_publications_post_type');


function remove_comments_menu() {
    
    remove_menu_page('edit.php'); // Удаляет вкладку "Заметки"
    remove_menu_page('edit-comments.php'); // Удаляет вкладку "Комментарии"
}
add_action('admin_menu', 'remove_comments_menu', 999);

function restrict_pages_menu() {
    // Проверка, является ли пользователь администратором
    if (!current_user_can('administrator')) {
        remove_menu_page('edit.php?post_type=page'); // Удаляет вкладку "Страницы" для всех, кроме администратора
    }
}
add_action('admin_menu', 'restrict_pages_menu', 999);


require_once get_template_directory() . '/acf-import.php';
?>