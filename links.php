<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>

		<section class="main clearfix">
			<article class="clearfix">
				<h1 class="title">Favorite Links</h1>
				<ul>
					<?php wp_list_bookmarks(); ?>
				</ul>
			</article>
		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>