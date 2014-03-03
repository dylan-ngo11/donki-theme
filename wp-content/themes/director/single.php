<?php get_header(); ?>
<div id="main" class="group">
	<div id="blog" class="left-col">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post">
				<h2><?php the_title(); ?></h2>
				<div class="byline">by <a href="<?php the_author_posts_link(); ?>" > <?php the_author(); ?></a> on <span class="date" ><?php the_time('l F d, Y'); ?></span><br/>
				Posted in: <?php the_category(', ') ?> | <?php the_tags(); ?>
				</div>

				<?php the_content(); ?>
			</div>
			<div class="navi">
				<div class="right">
					<?php previous_post_link('Previous'); ?> / <?php next_post_link('Next'); ?>
				</div>
			</div>
		<?php endwhile; else: ?>
			<p><?php _e('No posts were found. Sorry!'); ?></p>
		<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>