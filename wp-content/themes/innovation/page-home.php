<?php
/*
Template Name: Homepage
*/

get_header(); ?>

<h2>Latest Projects</h2>

<?php query_posts("cat=$ts_portfolio_cat&showposts=2");
$counter = 0;
while (have_posts()) : the_post();

	$counter++;
	$preview = get_post_meta($post->ID, 'preview',true);
	$date = get_post_meta($post->ID, 'date',true);
	?>
	
	<div class="work <?php if($counter == 2) { echo "last"; $counter = 0; }; ?>">
	
		<?php if($preview) { ?>
			<a href="<?php the_permalink(); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/inc/thumb.php
				?src=<?php echo $preview; ?>&amp;w=450&h=210&amp;zc=1&amp;q=100"
				 alt="<?php the_title(); ?>" />
			</a>
			<?php
		} ?>
		
		<p>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a> <?php
			
			if($date) {
				echo"<span>($date)</span>";
			} ?>
		</p>

	</div><!--/work-->

<?php endwhile; ?>

</div><!--/contentwrap-->


<div class="extraswrap">
	<?php dynamic_sidebar('Homepage Bottom');
	get_footer(); ?>