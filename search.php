<?php get_header(); ?>

		<section class="main clearfix">

			<?php if (have_posts()) : ?>

			<article id="post-<?php the_ID(); ?>" class="clearfix">
            
				<h1 class="title">Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
                
				<ol class="search-results">
					<?php get_template_part('loop','list'); ?>
				</ol>
                
			</article>
			
            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <nav class="nav-below">
                    <?php get_template_part('nav','archive'); ?>
                </nav>
            <?php endif; ?>

			<?php else : ?>

			<article class="not-found clearfix">
				<h1 class="title">No search results</h1>
				<p>Sorry, nothing was found on the site matching your search criteria.</p>
			</article>

			<?php endif; ?>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>