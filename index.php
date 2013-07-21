<?php
/**
 * The Index.
 *
 * @package WordPress
 * @subpackage reStart
**/
get_header(); ?>

		<section class="main clearfix">

			<?php get_template_part( 'loop', 'index' ); ?>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>