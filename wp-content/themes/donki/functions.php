<?php require_once('widget-recent-post.php'); ?>
<?php  
	register_nav_menus( 
		array(
			'top_header_menu' => 'Top Header: Menu at top of header',
			'left_menu' => 'Left Header: Menu at left of website'
		)
	);

	/**
	 * Register sidebar widget right
	 */
	if(function_exists('register_sidebar')){
		register_sidebar(array(
			'name'          => __('Primary Sidebar', 'primary-sidebar'),
			'id'            => 'primary-widget-sidebar',
			'description'   => __('The primary widget area', 'dir'),
			'before_widget' => '<aside class="widget">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		));
	}

	/**
	 * Register widget footer
	 */
	if(function_exists('register_sidebar')){
		register_sidebar(array(
			'name'          => __('Footer Sidebar', 'footer-sidebar'),
			'id'            => 'footer-widget-sidebar',
			'description'   => __('The footer widget area', 'dir'),
			'before_widget' => '<aside class="widget-footer col-lg-3">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		));
	}

	/**
	 * Register Post thumbnail
	 */
	add_theme_support('post-thumbnails');
?>
