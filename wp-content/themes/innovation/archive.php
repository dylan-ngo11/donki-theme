<?php
require(TEMPLATEPATH . '/var.php');
if (have_posts()) :

    $post = $posts[0]; // Hack. Set $post so that the_date() works.

    /* Portfolio category? */
    if(is_category("$ts_portfolio_cat")) {
        require(TEMPLATEPATH . '/page-portfolio.php');
        exit;
    } else {
        get_header();
        echo'<div id="mainarea">';
    } ?>
    
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h4>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h4>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	    <h4>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h4>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	    <h4>Archive for <?php the_time('F jS, Y'); ?></h4>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	    <h4>Archive for <?php the_time('F, Y'); ?></h4>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	    <h4>Archive for <?php the_time('Y'); ?></h4>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	    <h4>Author Archive</h4>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	    <h4>Blog Archives</h4>
	<?php
	}


	while (have_posts()) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" class="blogpost">
		    <h2><a href="<?php the_permalink(); ?>" title="Continue Reading &quot;<?php the_title(); ?>&quot;"><?php the_title(); ?></a></h2>
		    <ul class="meta">
		        <li><?php the_category(', ') ?></li>
		        <li><a href="<?php the_permalink() ?>#comments"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
		        <li><?php the_time('F jS') ?></li>
		    </ul>
		    <?php the_content(); ?>
		</div>
	
	<?php    
	endwhile;
	
# Archive doesn't exist:
else :

    get_header(); ?>
    <div id="mainarea">
    <h2>Not Found</h2>
    <?php include (TEMPLATEPATH . '/searchform.php');

endif; ?>


<div class="navigation">
    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div>

<?php
get_sidebar();
get_footer(); ?>