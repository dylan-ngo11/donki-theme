<?php

/* Get all our options from the database */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std'];
	} else { $$value['id'] = get_settings( $value['id'] ); }
}

/* Get Portfolio category ID from the name */
$ts_portfolio_cat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms "
	."WHERE name='$ts_portfolio_cat'");

/* Get Blog page ID from the name */
$ts_blogpage = $wpdb->get_var("SELECT `ID` FROM $wpdb->posts "
	."WHERE post_title='$ts_blogpage' AND post_type='page' LIMIT 1");

?>