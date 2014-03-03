<?php  
	define('TEMPPLATE', get_bloginfo('stylesheet_directory'));
	define('IMAGES', TEMPPLATE. "/images");

	add_theme_support('nav-menu');
	if(function_exists('register_nav_menus')){
		register_nav_menus(
			array(
				'main' => 'Main nav'
			)
		);
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
			'name'          => __('Primary Sidebar', 'primary-sidebar'),
			'id'            => 'primary-widget-area',
			'description'   => __('The primary widget area', 'dir'), 
			'before_widget' => '<div class="widget">', 
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget_title">',
			'after_title'   => '</h3>'
		));
	}

	require_once('business-manager.php');

	require_once('theme-options.php');
	
?>