<?php  
get_header(); ?>

<div id="mainarea">

<?php
if(have_posts()) : while(have_posts()) : the_post (); ?>

    <h2><?php the_title(); ?></h2>
    <?php the_content();
	
endwhile; endif;


get_sidebar();
get_footer(); ?>