<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<!-- Get Colour Scheme -->
<?php
require(TEMPLATEPATH . "/var.php");

if($ts_colourscheme) {
	if($ts_colourscheme == "Choose a colour scheme:") { ?>
		<link rel="stylesheet" type="text/css" media="all"
		href="<?php bloginfo('template_directory'); ?>/styles/deepblue.css" /><?php
	} else { ?>
		<link rel="stylesheet" type="text/css" media="all"
		href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $ts_colourscheme; ?>" /><?php
	}
} else { ?>
	<link rel="stylesheet" type="text/css" media="all"
	href="<?php bloginfo('template_directory'); ?>/styles/deepblue.css" /><?php
} ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<!--[if lt IE 8]>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/inc/css/ie.css" type="text/css" media="screen" />
<![endif]-->

<!--[if lt IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/inc/css/ie6.css" type="text/css" media="screen" />
<![endif]-->

<!--[if IE 6]>
<script src="<?php bloginfo('template_directory'); ?>/inc/DD_belatedPNG_0.0.7a-min.js"></script>
<script>
    DD_belatedPNG.fix('#nav, li.current_page_item a');
</script>
<![endif]-->

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/inc/fancybox/fancy.css" type="text/css" media="screen" />

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js"></script>
   
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/fancybox/jquery.fancybox-1.0.0.js"></script>
	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/animate.js"></script>

</head>
<body>


<div id="wrap">

<div id="head">
	<h1><?php bloginfo('name'); ?></h1>
	<h3><?php bloginfo('description'); ?></h3>
</div>

<div id="nav">
	<ul>
	<?php wp_list_pages("title_li="); ?>
	</ul>
</div>

<div id="content">
<div class="contentwrap">