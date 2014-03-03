<?php
get_header();

if(have_posts()) : while (have_posts()) : the_post();

    $preview = get_post_meta($post->ID, 'preview',true);
    $previewfull = get_post_meta($post->ID, 'preview-full',true);
    $date = get_post_meta($post->ID, 'date',true);
    $client = get_post_meta($post->ID, 'client',true);
    $link = get_post_meta($post->ID, 'link',true);

    ?>
    
    <h2><?php the_title(); ?></h2>

	<div class="work worksingle">
	
	    <?php if($preview) { ?>
	        <div id="fancyopen">
	            <a href="<?php if($previewfull) { echo $previewfull; } else { echo '#'; } ?>">
	            <img src="<?php bloginfo('template_directory'); ?>/inc/thumb.php?src=<?php echo $preview; ?>&w=930&h=430&zc=1&q=100" alt="<?php the_title(); ?>" /></a>
	        </div>
	        <?php
	    }
	    
	    if($date || $client || $link) {
		    echo '<ul class="meta">';
		    if($date) { echo "<li>$date</li>"; }
		    if($client) { echo "<li>$client</li>"; }
		    if($link) { echo "<li><a href='$link'>Visit Site</a></li>"; }
		    echo '</ul>';
		}
		
	    the_content();
		?>
		
	</div>
	
<?php
endwhile; endif;

get_footer(); ?>