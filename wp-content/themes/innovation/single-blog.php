<?php get_header(); ?>
<div id="mainarea">

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" class="singleblog">

        <h2><?php the_title(); ?></h2>

        <ul class="meta">
            <li><? the_category(', ') ?></li>
            <li><a href="<?php the_permalink() ?>#comments">
                <? comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
            <li><? the_time('F jS') ?></li>
        </ul>

        <?php the_content(); ?>

    </div>
	
    <?php comments_template();
    
endwhile;

else : ?>

	<h2>404: Page Not Found</h2>

	<p>It seems what you're looking for isn't here. This is probably our fault &ndash; sorry!<br />
	Try searching instead:</p>
	
	<?php
	include(TEMPLATEPATH . '/searchform.php');


endif;

get_sidebar();
get_footer(); ?>