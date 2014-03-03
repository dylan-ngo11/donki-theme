<?php

function recentblogposts() {
    global $wpdb;
    global $post;
    require(TEMPLATEPATH . '/var.php'); ?>

    <h2>From The Blog</h2>
    <ul class="bloglist">

	<?php query_posts("cat=-$ts_portfolio_cat&showposts=5&caller_get_posts=1");
	while(have_posts()) : the_post(); ?>
	
		<?php
		$image = "";
		
		$queryattach = "SELECT guid FROM " . $wpdb->posts . " WHERE post_parent = '" . $post->ID .
		"' AND post_type = 'attachment' ORDER BY `post_date` ASC LIMIT 0,1";
		
		$post_attachments = $wpdb->get_results("$queryattach");
		
		if ($post_attachments) {
			$image = $post_attachments[0]->guid;
		}
		?>
		
		<li><a href="<?php the_permalink(); ?>">

		    <?php if($image) { ?>
		        <img src="<?php bloginfo('template_directory'); ?>/inc/thumb.php
		        ?src=<?php echo $image; ?>&amp;w=50&amp;h=50" alt="" />
		    <?php } ?>
		
		    <span class="posttitle"><?php the_title(); ?></span> <span class="postdate"><?php the_time('F jS Y') ?></span>
		
		</a><div class="clear" /></li>
		
	<?php endwhile; ?>
    </ul>

<?php
}


function widget_recentblogposts($args) {
	extract($args, EXTR_SKIP);
	echo $before_widget;
	recentblogposts();
	echo $after_widget;
}


register_sidebar_widget('Recent Blog Posts', 'widget_recentblogposts');

?>