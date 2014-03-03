<?php
/*
Template Name: Portfolio
*/

get_header(); ?>

<h2>Portfolio</h2>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

query_posts("paged=$paged&cat=$ts_portfolio_cat");
$counter = 0;
while (have_posts()) : the_post();

    $counter++;
    $preview = get_post_meta($post->ID, 'preview',true);
    $date = get_post_meta($post->ID, 'date',true);

	?>
	
	<div class="work <?php if($counter == 2) { echo "last"; $counter = 0; } ?>">

	    <?php if($preview) { ?>
	        <a href="<?php the_permalink(); ?>">
	            <img src="<?php bloginfo('template_directory'); ?>/inc/thumb.php?src=<?php echo $preview; ?>&w=450&h=210&zc=1&q=100"
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

<div class="navigation">
    <div class="alignleft"><?php next_posts_link('« Older Entries') ?></div>
    <div class="alignright"><?php previous_posts_link('Newer Entries »') ?></div>
</div>

<?php get_footer(); ?>