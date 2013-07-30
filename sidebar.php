		<aside id="sidebar-global" class="sidebar-global clearfix">
			<ul>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			
				<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() ) : ?>
				<li class="currently-browsing">
					<?php if (is_404()) { ?>
					<p>Please contact us or try again with a new search using the form below.</p>

					<?php } elseif (is_category()) { ?>
					<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

					<?php } elseif (is_day()) { ?>
					<p>You are currently browsing the archives for the day <?php the_time('l, F jS, Y'); ?>.</p>

					<?php } elseif (is_month()) { ?>
					<p>You are currently browsing the archives for <?php the_time('F, Y'); ?>.</p>

					<?php } elseif (is_year()) { ?>
					<p>You are currently browsing the archives for the year <?php the_time('Y'); ?>.</p>

					<?php } elseif (is_search()) { ?>
					<p>You have searched the archives for <strong>'<?php the_search_query(); ?>'</strong>.</p>

					<?php } ?>
				</li>
				<?php endif; ?>

				<li class="search">
					<?php get_search_form(); ?>
				</li>
				
				<li class="welcome">
					<h2>Welcome</h2>
					<p>Lorem ipsum dolor sit amet.</p>
				</li>
				
				<li class="recent-posts">
					<h2>Recent Posts</h2>
					<ul>
					<?php
						$args = array( 'numberposts' => '10' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<li><a href="'.get_permalink($recent["ID"]).'" title="'.esc_attr($recent["post_title"]).'" >'.$recent["post_title"].'</a></li> ';
						}
					?>
					</ul>
				</li>

				<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
				
				<!--li class="tags">
					<h2>Tags</h2>
					<?php wp_tag_cloud('format=list&unit=px&smallest=16&largest=16'); ?>
				</li-->

				<!--li class="archives">
					<h2>Archives</h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li-->
				
				<!-- ?php wp_list_pages('title_li=<h2>Pages</h2>'); ? -->
				
				<!--?php wp_list_bookmarks(); ?-->

				<li class="meta">
					<h2>Meta</h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</li>

			<?php endif; ?>
			</ul>
		</aside>