<?php get_header(); ?>	
				<div id="content" class="site-content col-lg-7">
					<div class="row">
						<?php  
							if (have_posts()) : while(have_posts()) : the_post();
						?>
						<article class="col-lg-10">
							<header class="entry-header">
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							</header>
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</article>
					<?php endwhile; else : ?>
						<article>
							<header class="entry-header">
								<h1 class="entry-title">Sorry! There're no posts here!</h1>
							</header>
						</article>
						
					<?php endif; ?>
					</div><!-- .row -->
				</div><!-- #content .site-content -->			
			</div><!-- #primary .content-area -->				

			<div id="secondary" class="widget-area col-lg-3">	
				<aside class="site-subscribe widget">
					<h2>Free Ebook</h2>
					<p>Every other Tuesday we send out our lovely email newsletter with useful tips and techniques. Why don't you sign up, too, and get a free ebook as well?</p>
					<input type="text" placeholder="enter your email address here" />
				</aside><!-- site-subscribe -->

				<aside class="widget">
					<h1>Recent Posts</h1>
					<ul>
						<li>
							<img src="<?php bloginfo('template_directory'); ?>/images/thumb1.png" alt="" />
							<a href="#">Converting Our Stories Into Multi-Screen Experience</a>
						</li>

						<li>
							<img src="<?php bloginfo('template_directory'); ?>/images/thumb2.png" alt="" />
							<a href="#">Migrating A Website To WordPress Is Easier Than You Think</a>
						</li>

						<li>
							<img src="<?php bloginfo('template_directory'); ?>/images/thumb3.png" alt="" />
							<a href="#">Infinite Scrolling In Web Design And Mobile Apps: Let's Get To The Bottom</a>
						</li>

						<li>
							<img src="<?php bloginfo('template_directory'); ?>/images/thumb4.png" alt="" />
							<a href="#">Facing The Challenge: Building A Responsive Website</a>
						</li>
					</ul>
				</aside><!-- .widget -->

				<aside class="widget">
					<h1>Advertisement</h1>
					<img src="<?php bloginfo('template_directory'); ?>/images/advertise1.png" alt="#" />
					<img src="<?php bloginfo('template_directory'); ?>/images/advertise2.png" alt="#" />
					<img src="<?php bloginfo('template_directory'); ?>/images/advertise3.png" alt="#" />
					<img src="<?php bloginfo('template_directory'); ?>/images/advertise4.png" alt="#" />
				</aside><!-- .widget -->	
			</div><!-- #secondary .widget-area -->				
		</div><!-- .row -->
	</div><!-- .container -->				
</section><!-- #main .site-main -->

<?php get_footer(); ?>