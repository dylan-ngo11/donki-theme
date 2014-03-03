<?php get_header(); ?>	
				<div id="content" class="site-content col-lg-7">
					<div class="row">
						<?php  
							if (have_posts()) : while(have_posts()) : the_post();
						?>
						<article class="col-lg-10">
							<header class="entry-header">
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<h2 class="entry-author">From <?php the_author_posts_link(); ?></h2>
							</header>
							<ul class="entry-meta">
								<li class="entry-date"><?php the_date(); ?></li>
								<li class="entry-comments"><a href="#"><?php comments_popup_link('', '1 Comment', '% Comments'); ?></a></li>
							</ul><!-- .entry-meta -->
							<div class="entry-content">
								<?php the_content('...') ?>
							</div><!-- .entry-content -->
							<a class="more-link" href="<?php the_permalink(); ?>">Read More</a>
						</article>
					<?php endwhile; ?>
						<ul class="site-pagination col-lg-10">
							<?php if($wp_query->max_num_pages > 1 ) : ?>
								<li><?php next_posts_link('Previous'); ?></li>
								
								<li><a href="#"><?php previous_posts_link('Next'); ?> </a></li>
							<?php endif; ?>
						</ul><!-- .site-pagination -->
					<?php else : ?>
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