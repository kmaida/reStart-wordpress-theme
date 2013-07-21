<?php
/**
 * The template for displaying Author pages.
 *
 * @package WordPress
 * @subpackage reStart
**/
get_header(); ?>

		<section class="main author-page clearfix">

<?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    query_posts('posts_per_page=-1');
?>

			<h1 class="title">
				Author: <?php echo $curauth->nickname; ?>
			</h1>
			
			<p class="website">
				<strong>Website:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
			</p>
				
			<p class="profile">
				<strong>Profile:</strong> <?php echo $curauth->user_description; ?>
			</p>

			<h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
			
			<ul class="author-posts">
    			<?php get_template_part('loop','list'); ?>
  			</ul>

		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>