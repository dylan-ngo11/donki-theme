<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<div class="container">
						<div class="row">
							<?php  
								if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) :
							?>	
							<?php endif; ?>
							<aside class="widget-footer col-lg-3">
								<h1>Categories</h1>
								<ul>
									<li><a href="#">Apps Design</a></li>
									<li><a href="#">Graphics Design</a></li>
									<li><a href="#">Online Business</a></li>
									<li><a href="#">User Experience</a></li>
									<li><a href="#">Web Design</a></li>
									<li><a href="#">WordPress</a></li>
								</ul>
							</aside><!-- .widget-footer -->
						</div><!-- .row -->	
					</div><!-- .container -->
				</div><!-- .site-info -->
			</footer><!-- #colophon .site-footer -->
		</div><!-- #page .hfeed .site -->

		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/utility.js"></script>		
		<script src="<?php bloginfo('template_directory'); ?>/js/waypoints.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>