<?php  
	/*
	* Template Name: Archives
	*/
?>
<?php get_header(); ?>
<div id="main" class="group">
	<div id="blog" class="left-col archives">
		<h2>Archives by month:</h2>
		<ul>
			<?php wp_get_archives(); ?>
		</ul>
		<h2>Archives by Subject:</h2>
		<ul>
			<?php wp_list_categories('hieracrchical=0&title_li='); ?>
		</ul>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>