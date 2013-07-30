<?php
/**
 * The template for displaying single posts.
 *
 * @package WordPress
 * @subpackage reStart
**/
get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="main clearfix">
        
			<article id="post-<?php the_ID(); ?>">
            
				<header class="header-article">
                
					<h1 class="title">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                            <?php $title = get_the_title(); if (strlen($title) == 0) _e('Untitled Post', 'reStart'); else _e($title, 'reStart'); ?>
                        </a>
                    </h1>
                    
					<p class="post-meta">Posted on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?>
                    
					<?php the_tags( '<br>Tags: ', ', ', ''); ?></p>
                    
				</header>
                
				<section class="the-content clearfix">
					<?php
						if ( has_post_thumbnail() ) :
							$image_id = get_post_thumbnail_id();
							$image_url = get_image_url( $image_id, 'full' );
					?>
    					<a href="<?php echo $image_url; ?>" title="<?php the_title(); ?> (view larger)"><?php the_post_thumbnail('featured-single'); ?></a>
					<?php endif; ?>
					
					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>
				</section>
                
				<footer class="footer-article">
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

					<p class="post-meta">
						This entry was posted on <?php the_time('l, F jS, Y'); ?> at <?php the_time(); ?> and is filed under <?php the_category(', ') ?>. 
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// both comments and pings open
							_e('You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.', 'reStart') ?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// only pings are open
							_e('Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.', 'reStart') ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// comments are open, pings are not
							_e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'reStart') ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// neither comments nor pings are open
							_e('Both comments and pings are currently closed.', 'reStart') ?>

						<?php } edit_post_link('Edit this entry','','.'); ?>
					</p>
                    
				</footer>
                
			</article>
			
			<!-- shows link to previous post and next post by title -->
			<?php get_template_part('nav','posts'); ?>

			<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<section class="main clearfix">
			<article class="not-found">
				<p>Sorry, no posts matched your criteria.</p>
			</article>
		</section>

	<?php endif; ?>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>