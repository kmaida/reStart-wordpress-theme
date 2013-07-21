<?php
/**
 * Loop - List
 *
 * @package WordPress
 * @subpackage reStart
 */
?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            	<?php $title = get_the_title(); if (strlen($title) == 0) _e('Untitled Post', 'reStart'); else _e($title, 'reStart'); ?>
            </a>
             on <?php the_time('d M Y'); ?> in <?php the_category(', ');?>
        </li>

    <?php endwhile; else: ?>
        <li><?php _e('No posts found.', 'reStart'); ?></li>

    <?php endif; ?>