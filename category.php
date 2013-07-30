<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage reStart
 */

get_header(); ?>

		<section class="main clearfix">

			<h1 class="title"><?php
				printf( __( 'Category Archives: %s', 'reStart' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?></h1>
			
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo '<div class="archive-meta">' . $category_description . '</div>';
			?>
				
			<?php get_template_part('loop','category'); ?>
			
			<?php if ( $wp_query->max_num_pages > 1 ) : // Display navigation to next/previous posts when applicable ?>
				<nav class="nav-below nav-paglinks clearfix">
				    <?php get_template_part('nav','paglinks'); // Paginated links list with page numbers and prev/next links ?>
				</nav>
			<?php endif; ?>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
