<?php
/* Template Name: Main */
get_header();  // Подключает шапку темы
?>
  

      
   <!-- плавающая картинка -->
<!-- <meta name="NextGEN" version="1.9.3" /> -->   
      
      
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.nivo.slider.pack.js" tppabs="<?php echo get_template_directory_uri()?>/js/jquery.nivo.slider.pack.js"></script>	
			

<div id="slider-wrapper">  
    <div id="slider" class="nivoSlider">
        <?php
        $slides = get_posts(array('post_type' => 'slider', 'numberposts' => -1)); // Получаем все слайды
        foreach ($slides as $slide) {
            $image = get_field('slider-image', $slide->ID); // Получаем изображение из ACF
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


<div class="clear"></div>
<script>
var $j = jQuery.noConflict();
$j(document).ready(function(){
	$j('#slider').nivoSlider({      	
		effect: 'fade',
		keyboardNav: false      
	});  
});
</script>



	<!-- надпись под картинкой -->
<!-- <meta name="NextGEN" version="1.9.3" /> -->	

<div class="post" id="post-427">
	<div class="entry">       <br>





		<br>
		<h2 class="title">Лаборатория новых материалов и перспективных технологий</h2>
		<br>		
		<p>Лаборатория  новых материалов и перспективных технологий СФТИ ТГУ создана в 2008 году. На  базе лаборатории проводятся исследования в области физики и химии. В круг  научных интересов лаборатории входит несколько направлений, связанных как с  синтезом, так и с исследованиями физико-химических и функциональных свойств  различных материалов. Основные направления:
		<ul>                  
		<li>спектроскопия, включая лазерную  спектроскопию;
		<li> нелинейная кристаллооптика, лазерная абляция, как метод синтеза  нанострутур; 
		<li>фотохимия, включая фотокатализ;
		<li>  электрохимические методы анализа,  химические методы синтеза наноматериалов, включая квантовые точки,  физико-химические свойства наноматериалов.
		</ul>
		</p>
		<p>
							
							Лаборатория  интегрирована в структуру центров коллективного пользования ТГУ, что позволяет  значительно расширить круг проводимых исследований в частности широко применять  методы электронной микроскопии и рентгеновского анализа.</p>
		<p>
							Лаборатория  является базовой для физического, химического и радиофизического факультетов  ТГУ: сотрудники лаборатории читают на этих факультетах спецкурсы, а студенты и  аспиранты &ndash; занимаются научной работой в лаборатории.</p>

		<p> Пример получения золотых наночастиц методом лазерной абляции. <br> <br>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/lwEKHf-Y9xQ" frameborder="0" allowfullscreen></iframe>
		</p>				

	</div>

	<p class="pad-top">&nbsp;</p>				
</div>
							




	   

<div class="clear"></div>
	
<!-- новости -->
<!-- <meta name="NextGEN" version="1.9.3" /> -->
<?php get_footer();  // Подключает подвал темы ?>