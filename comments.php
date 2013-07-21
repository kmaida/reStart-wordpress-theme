<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
	<p class="nocomments comments-protected">This post is password protected. Enter the password to view comments.</p>
<?php
	return; }
?>
 
<!-- You may begin editing here -->

<section id="comments-wrapper" class="comments-wrapper clearfix">

	<?php if ( have_comments() ) : ?>
	<h2 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h2>
	 
	<?php get_template_part('nav', 'comments'); ?>
	 
	<ol class="comment-list">
    	<!-- Utilizes a callback to enable customization of comment HTML - see functions.php -->
		<?php wp_list_comments('callback=km_custom'); ?>
	</ol>
	 
	<?php get_template_part('nav', 'comments'); ?>

	<?php else : // this is displayed if there are no comments so far ?>
 
		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
            <p class="nocomments comments-open">There are no comments yet. Be the first to add one!</p>
 
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments comments-closed">Comments are closed.</p>
 
	<?php endif; ?>
    
<?php endif; ?>
 
<?php if ('open' == $post->comment_status) : ?>

	<!-- COMMENT RESPOND -->
	<?php comment_form(); ?>
 
<?php endif; // if you delete this the sky will fall on your head ?>

</section> <!-- end #comments-wrapper -->