<div id="secondary" class="widget-area col-lg-3">
	<aside class="site-subscribe widget">
		<h2>Free Ebook</h2>
		<p>Every other Tuesday we send out our lovely email newsletter with useful tips and techniques. Why don't you sign up, too, and get a free ebook as well?</p>
		<input type="text" placeholder="enter your email address here" />
	</aside><!-- site-subscribe -->
	
	<?php  
		if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar')) :
	?>	
	<?php endif; ?>

	<aside class="widget">
		<h1>Advertisement</h1>
		<img src="<?php bloginfo('template_directory'); ?>/images/advertise1.png" alt="#" />
		<img src="<?php bloginfo('template_directory'); ?>/images/advertise2.png" alt="#" />
		<img src="<?php bloginfo('template_directory'); ?>/images/advertise3.png" alt="#" />
		<img src="<?php bloginfo('template_directory'); ?>/images/advertise4.png" alt="#" />
	</aside><!-- .widget -->	
</div><!-- #secondary .widget-area -->	