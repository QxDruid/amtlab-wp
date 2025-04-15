<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Amtlab</title>

<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">
    <div id="wrapper-bg">
        <div id="outer-wrapper" class="outer-wrapper">
            <div class="site-container">
                <!-- Header -->
                <div id="header" class="outer">
                    <div class="header-part">
                        <div class="header-logo">
                            <a href="<?php echo home_url('/'); ?>">
                                <img src="<?php echo get_template_directory_uri()?>/img/logo_1.jpg" 
                                     alt="Лаборатория новых материалов и перспективных технологий СФТИ ТГУ" 
                                     title="Лаборатория новых материалов и перспективных технологий СФТИ ТГУ" 
                                     class="logoimg" />
                            </a>	
                        </div>
                        <div class="header-text">						
                            <h1>
                                <a href="<?php echo home_url('/'); ?>">
                                    Лаборатория новых материалов и перспективных технологий СФТИ ТГУ
                                </a>
                            </h1>
                            <h2></h2>
                        </div>	
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="outer">
                    <div id="navcontainer">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'menu',
                            'menu_id' => 'nav'
                        ));
                        ?>
                    </div>
                </div>
                
                <!-- Main Content Wrapper -->
                <div class="outer" id="contentwrap">
                    <div class="postcont">
                        <div id="content">	
		                                                                                                                          
        	