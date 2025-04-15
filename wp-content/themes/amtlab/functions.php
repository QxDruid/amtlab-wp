<?php
function mytheme_enqueue_styles() {
    // Main theme styles
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0');
    wp_enqueue_style('screen-style', get_template_directory_uri() . '/css/screen.css', array('main-style'), '1.0.0');
    wp_enqueue_style('style-style', get_template_directory_uri() . '/css/style.css', array('screen-style'), '1.0.0');
    
    // Slider styles
    wp_enqueue_style('nivo-slider-style', get_template_directory_uri() . '/css/nivo-slider.css', array('style-style'), '1.0.0');
    wp_enqueue_style('slider-style', get_template_directory_uri() . '/css/slider.css', array('nivo-slider-style'), '1.0.0');
    
    // Page-specific styles
    wp_enqueue_style('staff-page-style', get_template_directory_uri() . '/css/staff.css', array('style-style'), '1.0.0');
    wp_enqueue_style('gallery-style', get_template_directory_uri() . '/css/gallery.css', array('style-style'), '1.0.0');
    wp_enqueue_style('publications-style', get_template_directory_uri() . '/css/publications.css', array('style-style'), '1.0.0');
    wp_enqueue_style('news-style', get_template_directory_uri() . '/css/news.css', array('style-style'), '1.0.0');
    wp_enqueue_style('allnews-style', get_template_directory_uri() . '/css/allnews.css', array('style-style'), '1.0.0');
    
    // Menu styles
    wp_enqueue_style('menumatic-style', get_template_directory_uri() . '/css/menu/MenuMatic.css', array('style-style'), '1.0.0');
    
    // Plugin styles
    wp_enqueue_style('nggallery-style', get_template_directory_uri() . '/css/plugins/nggallery.css', array('style-style'), '1.0.0');
    wp_enqueue_style('filebase-style', get_template_directory_uri() . '/css/plugins/wp-filebase.css', array('style-style'), '1.0.0');
    wp_enqueue_style('shutter-style', get_template_directory_uri() . '/css/plugins/shutter-reloaded.css', array('style-style'), '1.0.0');
    wp_enqueue_style('popup-style', get_template_directory_uri() . '/css/plugins/popup.css', array('style-style'), '1.0.0');
    wp_enqueue_style('event-list-style', get_template_directory_uri() . '/css/plugins/event-list.css', array('style-style'), '1.0.0');
    
    // Print and IE specific styles
    wp_enqueue_style('print-style', get_template_directory_uri() . '/css/print.css', array('style-style'), '1.0.0', 'print');
    wp_enqueue_style('ie-style', get_template_directory_uri() . '/css/ie.css', array('style-style'), '1.0.0');
    wp_style_add_data('ie-style', 'conditional', 'IE');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

function mytheme_enqueue_scripts() {
    // jQuery and core scripts
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery/jquery.js-ver=1.7.1', array(), '1.7.1', false);
    wp_enqueue_script('jquery');
    
    // Slider scripts
    wp_enqueue_script('nivo-slider-script', get_template_directory_uri() . '/js/jquery.nivo.slider.pack.js', array('jquery'), '1.0.0', false);
    
    // Shutter reloaded script
    wp_enqueue_script('shutter-script', get_template_directory_uri() . '/js/shutter-reloaded.js-ver=1.3.3', array('jquery'), '1.3.3', true);
    
    // Slider scripts
    wp_enqueue_script('cycle-script', get_template_directory_uri() . '/js/jquery.cycle.all.min.js-ver=2.9995', array('jquery'), '2.9995', true);
    wp_enqueue_script('ngg-slideshow-script', get_template_directory_uri() . '/js/ngg.slideshow.min.js-ver=1.06', array('jquery'), '1.06', true);
    
    // UI enhancement scripts
    wp_enqueue_script('popup-script', get_template_directory_uri() . '/js/popup.js-ver=1.7', array('jquery'), '1.7', true);
    wp_enqueue_script('swfobject-script', get_template_directory_uri() . '/js/swfobject.js-ver=1.7', array(), '1.7', true);
    
    // MooTools and Menu scripts
    wp_enqueue_script('mootools-core', get_template_directory_uri() . '/js/menu/mootools-1.2.5-core-yc.js', array(), '1.2.5', true);
    wp_enqueue_script('menumatic-script', get_template_directory_uri() . '/js/menu/MenuMatic_0.68.3.js', array('mootools-core'), '0.68.3', true);
    
    // Media and player scripts
    wp_enqueue_script('jwplayer-script', get_template_directory_uri() . '/js/jwplayer.js', array(), '1.0.0', true);
    
    // UI enhancement scripts
    wp_enqueue_script('lcr-script', get_template_directory_uri() . '/js/jquery.lcr.js', array('jquery'), '1.0.0', true);
    
    // Browser compatibility scripts
    wp_enqueue_script('pngfix-script', get_template_directory_uri() . '/js/pngfix.js', array(), '1.0.0', true);

    // Inline scripts
    $shutter_settings = array(
        'msgLoading' => 'З А Г Р У З К А',
        'msgClose' => 'Закрыть',
        'imageCount' => '1'
    );
    wp_localize_script('shutter-script', 'shutterSettings', $shutter_settings);

    $vvq_settings = array(
        'flashvars' => array(),
        'params' => array(
            'wmode' => 'opaque',
            'allowfullscreen' => 'true',
            'allowscriptaccess' => 'always'
        ),
        'attributes' => array(),
        'expressinstall' => get_template_directory_uri() . '/js/expressinstall.swf'
    );
    wp_localize_script('swfobject-script', 'vvqSettings', $vvq_settings);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

// Add inline script for MenuMatic initialization
function mytheme_add_inline_scripts() {
    ?>
    <script type="text/javascript">
        window.addEvent('domready', function() {
            var myMenu = new MenuMatic();
        });
    </script>
    <?php
}
add_action('wp_footer', 'mytheme_add_inline_scripts');

// Инициализация слайдера
function mytheme_init_slider() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Инициализация Nivo слайдера
            if ($('#slider').length) {
                $('#slider').nivoSlider({
                    effect: 'fade',
                    animSpeed: 500,
                    pauseTime: 3000,
                    directionNav: true,
                    controlNav: true,
                    pauseOnHover: true,
                    keyboardNav: false,
                    controlNavThumbs: false,
                    manualAdvance: false,
                    prevText: 'Prev',
                    nextText: 'Next',
                    randomStart: false,
                    beforeChange: function(){},
                    afterChange: function(){},
                    slideshowEnd: function(){},
                    lastSlide: function(){},
                    afterLoad: function(){}
                });
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'mytheme_init_slider');

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

// Регистрация меню
function mytheme_register_menus() {
    register_nav_menus(array(
        'primary' => __('Основное меню', 'amtlab'),
    ));
}
add_action('init', 'mytheme_register_menus');

// Функция для настройки меню
function mytheme_setup_menu() {
    // Получаем все страницы
    $pages = get_pages(array(
        'sort_column' => 'menu_order',
        'sort_order' => 'ASC'
    ));

    // Находим страницу с шаблоном index
    $index_page = null;
    foreach ($pages as $key => $page) {
        $template = get_page_template_slug($page->ID);
        if ($template === 'index.php') {
            $index_page = $page;
            unset($pages[$key]);
            break;
        }
    }

    // Создаем новый массив страниц, начиная с index
    $ordered_pages = array();
    if ($index_page) {
        $ordered_pages[] = $index_page;
    }
    $ordered_pages = array_merge($ordered_pages, $pages);

    // Обновляем порядок страниц
    $menu_order = 0;
    foreach ($ordered_pages as $page) {
        $template = get_page_template_slug($page->ID);
        $menu_title = '';
        
        // Определяем название пункта меню на основе шаблона
        switch ($template) {
            case 'index.php':
                $menu_title = 'Главная';
                break;
            case 'about.php':
                $menu_title = 'О лаборатории';
                break;
            case 'staff.php':
                $menu_title = 'Сотрудники';
                break;
            case 'gallery.php':
                $menu_title = 'Галерея';
                break;
            case 'publications.php':
                $menu_title = 'Публикации';
                break;
            case 'news.php':
                $menu_title = 'Новости';
                break;
            case 'contacts.php':
                $menu_title = 'Контакты';
                break;
            default:
                $menu_title = $page->post_title;
        }

        // Обновляем заголовок и порядок страницы
        wp_update_post(array(
            'ID' => $page->ID,
            'menu_order' => $menu_order,
            'post_title' => $menu_title
        ));
        
        $menu_order++;
    }
}
add_action('init', 'mytheme_setup_menu');

require_once get_template_directory() . '/acf-import.php';
?>