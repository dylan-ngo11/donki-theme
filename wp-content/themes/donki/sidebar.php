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

		
</div><!-- #secondary .widget-area -->	