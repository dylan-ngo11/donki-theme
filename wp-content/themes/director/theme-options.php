<?php  
	//create custom plugin setting menu
	add_action('admin_menu', 'directory_create_menu');

	function directory_create_menu(){
		//create new menu
		add_submenu_page( 'themes.php', 'Director Theme option', 'Director Option', 'administrator', __FILE__ , 'wptuts_landing_settings_page' );
	}

	//call register setting function
	add_action( 'admin_init', 'director_register_settings');

	function director_register_settings(){
		//register our settings
		register_setting( 'director-setting-group', 'director_facebook');
		register_setting('director-setting-group', 'director_twitter' );
		register_setting( 'director-setting-group', 'director_rss' );
		register_setting( 'director-setting-group', 'director_logo');
		register_setting( 'director-setting-group', 'director_analytics');
	}
?>