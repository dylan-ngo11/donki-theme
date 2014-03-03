<?php get_header(); ?>
<div id="mainarea">

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

query_posts("paged=$paged&cat=-$ts_portfolio_cat");
while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="blogpost">

	    <h2>
	        <a href="<?php the_permalink(); ?>" title="Continue Reading
	&quot;<?php the_title(); ?>&quot;"><?php the_title(); ?></a>
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
endwhile; ?>

<div class="navigation">
    <div class="alignleft"><?php next_posts_link('« Older Entries') ?></div>
    <div class="alignright"><?php previous_posts_link('Newer Entries »') ?></div>
</div>

<?php
get_sidebar();
get_footer(); ?>