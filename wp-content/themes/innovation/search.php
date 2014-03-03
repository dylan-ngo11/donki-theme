<?php get_header(); ?>
<div id="mainarea">

<?php if (have_posts()) : ?>

    <h4>Search Results</h4>

    <?php while (have_posts()) : the_post(); ?>

		<?php
		// Portfolio
		if(in_category("$ts_portfolio_cat")) {
		
		    $preview = get_post_meta($post->ID, 'preview',true);
		    $date = get_post_meta($post->ID, 'date',true);
		    $client = get_post_meta($post->ID, 'client',true);
		    $link = get_post_meta($post->ID, 'link',true); ?>
		
		    <div class="work worksearch">
			
		        <?php if($preview) { ?>
		            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/inc/thumb.php?src=<?php echo $preview; ?>&w=670&h=320&zc=1&q=100" alt="<?php the_title(); ?>" /></a>
		        <?php } ?>
		
		        <p>
		            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
		            <?php if($date) { echo"<span>($date)</span>"; } ?>
		        </p>
		
		    </div>
		    
		<?php
		// Blog Post
		} else { ?>

			<div id="post-<?php the_ID(); ?>" class="blogpost">
			    <h2>
			        <a href="<?php the_permalink(); ?>" title="Continue Reading &quot;<?php the_title(); ?>&quot;">
			        <?php the_title(); ?></a>
			    </h2>
			    <ul class="meta">
			        <li><?php the_category(', ') ?></li>
			        <li><a href="<?php the_permalink() ?>#comments">
			          <?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
			        <li><?php the_time('F jS') ?></li>
			    </ul>
			    <?php the_content(); ?>
			</div>
			
			<?php 
		}
  
	endwhile;
	?>

<?php
# No posts found
else : ?>

    <h2>No posts found. Try a different search?</h2>
    <?php include (TEMPLATEPATH . '/searchform.php');

endif; ?>


<div class="navigation">
    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div>


<?php
get_sidebar();
get_footer(); ?>