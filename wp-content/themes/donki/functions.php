<?php 
	require_once('widget-recent-post.php'); 
	require_once(dirname(__FILE__).'/sample/sample-config.php');
?>
<?php

	register_nav_menus( 
		array(
			'top_header_menu' => 'Top Header: Menu at top of header'
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

	/**
	 * Pagination for archive, taxonomy, category, tag and search results pages
	 *
	 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
	 * @return Prints the HTML for the pagination if a template is $paged
	 */
	function base_pagination() {
	    global $wp_query;

	    $big = 999999999; // This needs to be an unlikely integer

	    // For more options and info view the docs for paginate_links()
	    // http://codex.wordpress.org/Function_Reference/paginate_links
	    $paginate_links = paginate_links( array(
	        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
	        'current' => max( 1, get_query_var('paged') ),
	        'total' => $wp_query->max_num_pages,
	        'mid_size' => 5,
	        'type' => 'list'
	    ) );

	    // Display the pagination if more than one page is found
	    if ( $paginate_links ) {
	        echo '<div class="pagination">';
	        echo $paginate_links;
	        echo '</div><!--// end .pagination -->';
	    }
	}
?>
