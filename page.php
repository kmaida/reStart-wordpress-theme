<?php 
/**
 * The template for displaying pages.
 *
 * @package WordPress
 * @subpackage reStart
**/
get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="main clearfix">
			<article id="post-<?php the_ID(); ?>">
				
				<header class="header-article">
					<h1 class="title"><?php the_title(); ?></h1>
					<!-- <p>Published on <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></p> -->
				</header>
				
				<section class="the-content clearfix">
					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>
				</section>
				
				<footer class="footer-article">
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</footer>
				
			</article>
            
            <?php comments_template(); ?>
            
		</section>

	<?php endwhile; else: ?>

		<section class="main clearfix">
			<article class="not-found">
				<p>Sorry, no pages matched your criteria.</p>
			</article>
		</section>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>