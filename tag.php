<?php
/**
 * The template for displaying Tag archive pages.
 *
 * @package WordPress
 * @subpackage reStart
 */

get_header(); ?>

		<section class="main clearfix">

			<h1 class="title"><?php
				printf( __( 'Tag Archives: %s', 'reStart' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			?></h1>
			<?php get_template_part('loop','tag'); ?>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
