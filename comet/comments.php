<!-- #comments -->
<div id="comments">

<?php
if ( post_password_required() ) {
	
	_e('This post is password protected. Enter the password to view any comments.','comet');
	echo "</div><!-- #comments -->";

	return;
}

// we have comments
if ( have_comments() ) { ?>
	
	<a href="#respond" class="alignright leave-one"><?php _e('Leave a comment','comet'); ?></a>
	<h3 class="comment-heading post-title"><?php comments_number(__('No Comments','comet'),__('1 Comment','comet'),__( '% Comments','comet') );?></h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
	<div class="navigation">
		<?php paginate_comments_links() ?>
	</div>
	<?php } ?>

	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=fp_comments'); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
	<div class="navigation">
		<?php paginate_comments_links() ?>
	</div>
	<?php } ?>

	<ol class="trackbacklist">
		<?php wp_list_comments('type=pingback&callback=fp_trackbacks'); ?>
	</ol>

<?php

// we dont have comments
} else {
	
	// comments are closed
	if ( ! comments_open() && ! is_page() ) {

		// _e('Comments are closed.','comet');		
	}

}

// comment form
comment_form();

?>

</div><!-- #comments -->
