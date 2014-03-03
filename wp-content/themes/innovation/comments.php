<?php
if ( have_comments() ) : ?>

    <h4 id="comments">
        <?php comments_number('No Comments', 'One Comment', '% Comments' ); ?>
    </h4>

    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>

    <div class="comms-navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
    
<?php
else : // no comments so far

    if ('open' == $post->comment_status) :
        // If comments are open, but there are no comments.
    else :
        echo"<p>Comments are closed on this post.</p>";
    endif;

endif;


// Comment Form
if ('open' == $post->comment_status) : ?>

    <div id="respond">
    <h4><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>
    
    <div class="cancel-comment-reply">
        <small><?php cancel_comment_reply_link(); ?></small>
    </div>
    
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>
/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
    
    	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php if ( $user_ID ) : ?>
			
			    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out »</a></p>
			
			<?php else : ?>
			
			    <p><label for="author">Name:</label> <input type="text" name="author" id="author" 
			value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>
			
			    <p><label for="email">Email:</label> <input type="text" name="email" id="email" 
			value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>
			
			    <p><label for="url">Website:</label> <input type="text" name="url" id="url" 
			value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>
			
			<?php endif; ?>
			
		    <p><label for="comment">Comment:</label> <textarea name="comment" id="comment" cols="70" rows="10" tabindex="4"></textarea></p>

		    <p><label for="submit">&nbsp;</label> <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		    <?php comment_id_fields(); ?>
		    </p>
		    
		    <?php do_action('comment_form', $post->ID); ?>

	    </form>

	<?php endif; // If registration required and not logged in ?>
	</div><!--/respond-->

<?php endif; // if you delete this the sky will fall on your head ?>