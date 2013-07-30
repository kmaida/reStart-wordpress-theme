<?php get_header(); ?>

		<section class="main clearfix">

			<?php if (have_posts()) : ?>

				<h1 class="title">Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
				
				<?php get_search_form(); ?>
	            
				<section class="search-results">
					<?php get_template_part('loop'); ?>
				</section>
			
	            <?php if ( $wp_query->max_num_pages > 1 ) : ?>
	                <nav class="nav-below">
	                    <?php get_template_part('nav','archive'); ?>
	                </nav>
	            <?php endif; ?>

			<?php else : ?>

				<h1 class="title">No search results</h1>
				<p>Sorry, &ldquo;<?php the_search_query(); ?>&rdquo; could not be found on the site. Please try another search:</p>
				
				<?php get_search_form(); ?>

			<?php endif; ?>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>