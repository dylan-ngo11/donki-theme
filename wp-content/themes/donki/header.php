<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); ?><?php wp_title('|', true, 'right'); ?></title>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory' ); ?>/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<!--[if lt IE 9]>
	        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	    <?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<div class="site-headcont">
				<header id="masthead" class="site-header" role="banner">
					<div class="container">
						<div class="row">							
							<nav class="navbar navbar-default" role="navigation">
    							<!-- Brand and toggle get grouped for better mobile display -->
							    <div class="navbar-header">
							        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							            <span class="sr-only">Toggle navigation</span>
							            <span class="icon-bar"></span>
							            <span class="icon-bar"></span>							            
							            <span class="icon-bar"></span>
							        </button>
							    	<h1 class="site-title"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
							    </div>

							    <!-- Collect the nav links, forms, and other content for toggling -->
							    <div class="collapse navbar-collapse navbar-ex1-collapse">
							    	<?php if(function_exists('wp_nav_menu')) : ?>
									<?php    
										/**
										* Displays a navigation menu
										* @param array $args Arguments
										*/
										$args = array(
											'theme_location' => 'top_header_menu',
											'menu' => '',
											'container' => '',
											'container_class' => '',
											'container_id' => '',
											'menu_class' => 'nav navbar-nav',
											'menu_id' => '',
											'echo' => true,
											'fallback_cb' => 'wp_page_menu',
											'before' => '',
											'after' => '',
											'link_before' => '',
											'link_after' => '',
											'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
											'depth' => 0,
											'walker' => ''
										);
									
										wp_nav_menu( $args ); ?>

									
								<?php endif; ?>
								</div>
							</nav><!-- .site-navigation -->						
						</div><!-- .row -->
					</div><!-- .container -->
				</header><!-- #masthead .site-header -->
			</div><!-- .site-headcont -->

			<section id="main" class="site-main">
				<div class="container">
					<div class="row">
						<div id="primary" class="content-area">
							<div class="site-cat col-lg-2">
								<?php  
									
								get_the_categories();

								function get_the_categories( $parent = 0 ) 
								{
								    $categories = get_categories( "hide_empty=0&parent=$parent" );

								    if ( $categories ) {
								    	echo '<aside>';
								        foreach ( $categories as $category ) {
								            if ( $category->category_parent == $parent ) {
								                
								                echo '<h1><a href="'.get_category_link($category->cat_ID ).'">'.$category->name.'</a></h1>';
								                $subcategories=  get_categories('child_of='.intval($category->cat_ID).'&hide_empty=0');
								                if($subcategories){
									                echo '<ul>';
									                	foreach ($subcategories as $subcategory) {
												            echo '<li>';
												            echo '<a href="'.get_category_link($category->cat_ID ).'">'.$subcategory->cat_name.'</a></li>';
												        }
									                echo '</ul>';
								            	}	
										        
										    }
										}
								        echo '</aside>';
								    }
								}						
								?>
							</div><!-- .site-category -->