<?php
/**
 * Loop
 *
 * @package WordPress
 * @subpackage reStart
 */
?>

<?php if ( ! have_posts() ) : // If there are no posts to display, such as an empty archive page ?>

	<article class="not-found">
		<h1 class="title">Not Found</h1>
		<p>Sorry, but the requested resource was not found on this site.</p>
		<?php get_search_form(); ?>
	</article>
	
<?php endif; ?>
	
<?php while ( have_posts() ) : the_post(); // Start the loop ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header-article">
			<h1 class="title">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php $title = get_the_title(); if (strlen($title) == 0) _e('Untitled Post', 'reStart'); else _e($title, 'reStart'); ?>
            </a>
            </h1>
			<p>Posted on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
		</header>
        
		<section class="the-content clearfix">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php the_content('read more &raquo;'); ?>
		</section>
        
		<footer class="footer-article">
			<p><?php the_tags('Tags: ', ', ', '<br>'); ?> <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
		</footer>
	</article>

<?php endwhile; // End the loop ?>