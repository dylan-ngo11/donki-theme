<?php
$themename = "Innovation";
$shortname = "ts";


/* Get Categories into a drop-down list */
$categories_list = get_categories('hide_empty=0&orderby=name');
$getcat = array();
foreach($categories_list as $acategory) {
	$getcat[$acategory->cat_ID] = $acategory->cat_name;
}
$category_dropdown = array_unshift($getcat, "Choose a category:");


/* Get Pages into a drop-down list */
$pages_list = get_pages();
$getpag = array();
foreach($pages_list as $apage) {
	$getpag[$apage->ID] = $apage->post_title;
}
$page_dropdown = array_unshift($getpag, "Select a page:");


/* Get Stylesheets into a drop-down list */
$styles = array();
if(is_dir(TEMPLATEPATH . "/styles/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/styles/")) {
		while(($style = readdir($open_dirs)) !== false) {
			if(stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}
$style_dropdown = array_unshift($styles, "Choose a colour scheme:");



/* The Options*/
$options = array (

	array(	"name" => "General",
		"type" => "title"),
	
	array(	"type" => "open"),
	
	array(	"name" => "Colour Scheme",
		"desc" => "Which colour scheme would you like?",
		"id" => $shortname."_colourscheme",
		"type" => "select",
		"std" => "Choose a colour scheme:",
		"options" => $styles),
	
	array(	"name" => "Portfolio Category",
		"desc" => "Select the category portfolio items are being posted in.",
		"id" => $shortname."_portfolio_cat",
		"type" => "select",
		"std" => "Choose a category:",
		"options" => $getcat),
	
	array(	"name" => "Blog page",
		"desc" => "Select the page used as a blog (posts) page.",
		"id" => $shortname."_blogpage",
		"type" => "select",
		"std" => "Select a page:",
		"options" => $getpag),
		
	array(	"name" => "Google Analytics",
		"desc" => "Insert your Google Analytics (or other) code here.",
		"id" => $shortname."_analytics_code",
		"type" => "textarea"),
	
	array(	"type" => "close")

);





function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
if ( 'save' == $_REQUEST['action'] ) {
foreach ($options as $value) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
header("Location: themes.php?page=functions.php&saved=true");
die;
} else if( 'reset' == $_REQUEST['action'] ) {
foreach ($options as $value) {
delete_option( $value['id'] ); }
header("Location: themes.php?page=functions.php&reset=true");
die;
}
}
if(!function_exists('wp_list_comments')) {
add_theme_page($themename." Options", $themename, 'edit_themes', basename(__FILE__), 'mytheme_admin');
} else {
add_menu_page($themename." Options", $themename, 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
}
function mytheme_admin() {
global $themename, $shortname, $options;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<form method="post">



<?php foreach ($options as $value) { 
switch ( $value['type'] ) {

case "open": ?>
<table width="100%" border="0" style="background-color:#F1F1F1; border:1px solid #E3E3E3; border-top:none; padding:10px;"><?php

break;
case "close":
?>
</table><br /><?php

break;
case "title":
?>
<table width="100%" border="0" style="background-color:#6D6D6D; border: 1px solid #E3E3E3; padding:5px 10px;">
<tr>
<td colspan="2">
<h3 style="color:#fff; font-family:Georgia,'Times New Roman',Times,serif; font-weight: bold;"><?php echo $value['name']; ?></h3>
</td>
</tr>
</table><?php

break;
case 'text':
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #C8C8C8;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
<?php 

break;
case 'textarea':
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #C8C8C8;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
<?php 

break;
case 'select':
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #C8C8C8;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
<?php

break;
case "checkbox":
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
</td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #C8C8C8;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
<?php

break;
} 
}
?>
<p class="submit">
<input name="save" type="submit" value="Save changes" /> 
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');


require(TEMPLATEPATH . "/var.php");


if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Homepage Bottom',
        'before_widget' => '<div class="extras">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

}

// If using 2.6 or below, use legacy comments display
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
    if ( !function_exists('wp_list_comments') )
        $file = TEMPLATEPATH . '/comments.legacy.php';
    return $file;
}


include(TEMPLATEPATH . "/inc/bloglist-widget.php");  

?>