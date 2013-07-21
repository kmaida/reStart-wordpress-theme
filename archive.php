<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package WordPress
 * @subpackage reStart
 */

get_header(); ?>

	<section class="main clearfix">

		<?php
			/* Queue the first post, that way we know
			 * what date we're dealing with (if that is the case).
			 *
			 * We reset this later so we can run the loop
			 * properly with a call to rewind_posts().
			*/
			if ( have_posts() )
				the_post();
		?>
			
			<h1 class="title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'KMH5' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'KMH5' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'KMH5' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
					<?php _e( 'Archives', 'KMH5' ); ?>
				<?php endif; ?>
			</h1>
			
			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			
				/* Run the loop for the archives page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-archive.php and that will be used instead.
				 */
				get_template_part('loop','archive');
			?>

	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>