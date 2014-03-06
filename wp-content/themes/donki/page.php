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

			<?php get_sidebar(); ?>			
		</div><!-- .row -->
	</div><!-- .container -->				
</section><!-- #main .site-main -->

<?php get_footer(); ?>