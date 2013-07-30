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
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'reStart' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'reStart' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'reStart' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
					<?php _e( 'Archives', 'reStart' ); ?>
				<?php endif; ?>
			</h1>
			
			<?php if ( $wp_query->max_num_pages > 1 ) : // Display navigation to next/previous posts when applicable (above) ?>
				<nav class="nav-above clearfix">
					<?php get_template_part('nav','archive'); ?>
				</nav>	
			<?php endif; ?>
			
			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
				get_template_part('loop','archive');
				
				<?php if ( $wp_query->max_num_pages > 1 ) : // Display navigation to next/previous posts when applicable (above) ?>
					<nav class="nav-below nav-paglinks clearfix">
					    <?php get_template_part('nav','paglinks'); // Paginated links list with page numbers and prev/next links ?>
					</nav>
				<?php endif; ?>
			?>

	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>