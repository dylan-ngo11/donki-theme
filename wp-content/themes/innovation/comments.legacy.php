<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h4 id="comment"><?php comments_number('No Comments', 'Comments (1)', 'Comments (%)' );?></h4>

	<ol class="commentlist">
    
    <?php $counter = 0;

	foreach ($comments as $comment) :
    	
        $counter++; ?>

		<li id="comment-<?php comment_ID(); ?>" class="comment <?php if($counter == 1) { ?>thread-even depth-1 <?php } else { ?>thread-alt depth-1 <?php $counter = 0; } ?>">
        
        	<div id="div-comment-<?php comment_ID(); ?>">
        
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 32 ); ?>
                    <cite class="fn"><?php comment_author_link() ?></cite>
                    <span class="says">says:</span>
                </div>
                
                <div class="comment-meta commentmetadata">
                    <a href="<?php the_permalink(); ?>#comment-<?php comment_ID(); ?>"><?php comment_date('F d, Y'); echo" at "; comment_date('g:i a'); ?></a>
                    <?php edit_comment_link('(Edit)','',''); ?>
                </div>
                
                <?php comment_text();
                
                if ($comment->comment_approved == '0') :
                    echo'<em>Your comment is awaiting moderation.</em>';
                endif; ?>
                
            </div>        
       </li>
       
	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far

	if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Comments are closed.</p>

	<?php endif;
endif;
?>


<?php
/* COMMENT FORM */
if ('open' == $post->comment_status) : ?>
    <h4 class="comms">Leave a Reply</h4>
    
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
    
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        
        <?php if ( $user_ID ) : ?>
        
            <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
        
        <?php else : ?>
        
            <p><label for="author">Name:</label> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>
            
            <p><label for="email">Email:</label> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>
            
            <p><label for="url">Website:</label> <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>
        
        <?php endif; ?>
        
        <p><label for="comment">Comment:</label> <textarea name="comment" id="comment" cols="70" rows="10" tabindex="4"></textarea></p>
        
        <p><label for="submit">&nbsp;</label> <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

        </p>
        <?php do_action('comment_form', $post->ID); ?>
        
        </form>
    
    <?php endif; // If registration required and not logged in ?>
    
<?php endif; // if you delete this the sky will fall on your head ?>