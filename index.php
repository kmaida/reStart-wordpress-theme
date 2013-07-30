<?php
/**
 * The Index.
 *
 * @package WordPress
 * @subpackage reStart
**/
get_header(); ?>

		<section class="main clearfix">
		
			<?php if ( $wp_query->max_num_pages > 1 ) : // Display navigation to next/previous posts when applicable (above) ?>
				<nav class="nav-above clearfix">
					<?php get_template_part('nav','archive'); ?>
				</nav>	
			<?php endif; ?>

			<?php get_template_part( 'loop', 'index' ); ?>
			
			<?php if ( $wp_query->max_num_pages > 1 ) : // Display navigation to next/previous posts when applicable (above) ?>
				<nav class="nav-below nav-paglinks clearfix">
				    <?php get_template_part('nav','paglinks'); // Paginated links list with page numbers and prev/next links ?>
				</nav>
			<?php endif; ?>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>