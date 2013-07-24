<?php

// Internationalization
load_theme_textdomain ( 'reStart', TEMPLATEPATH.'/lang' );

// enqueue theme's javascript file
function theme_scripts() {
	wp_enqueue_script(
		/* handle */	'modernizr',
		/* src */		get_stylesheet_directory_uri() . '/js/libs/modernizr.js',
		/* deps */		'',
		/* ver */		'2.6.2',
		/* in footer */	false
	);

	$jsFile = '/js/script.js';

	wp_enqueue_script(
		/* handle */	'script',
		/* src */		get_stylesheet_directory_uri() . $jsFile,
		/* deps */		array( 'jquery' ),
		/* ver */		filemtime(get_template_directory() . $jsFile),
		/* in footer */	true
	);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Remove the version number of WP from the header for better security
remove_action('wp_head', 'wp_generator');

// Content Width
if ( ! isset( $content_width ) ) $content_width = 960;

// Add support for Sidebar Widgets
if (function_exists('register_sidebar')) {
	register_sidebar();
}

// Register menu(s)
if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'reStart' )
	));
}

// Add support for TinyMCE custom editor stylesheet
if (function_exists('add_editor_style')) {
	add_editor_style( 'editor-style.css' );
}

// Replace excerpt [...] with permalink 
function replace_excerpt($content) {
	return str_replace('[...]',
		'<a class="read-more-link" href="'. get_permalink() .'">read more <span class="arrow">&raquo;</span></a>', $content
	);
}
add_filter('the_excerpt', 'replace_excerpt');

// Add theme support functions
if (function_exists('add_theme_support')) {
	
	// Add support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );
	
	// Add support for Featured Images
	add_theme_support('post-thumbnails');
	
	// (name of the thumbnail, width, height, crop mode)
	set_post_thumbnail_size(150, 100, true);	// Default thumbnail for loop.
	add_image_size('featured-single', 400, 600, false);	// The thumbnail in the single post, linking to the full-size image.
}

// Attachment: Generate link to full-size image
function get_image_url( $image_id, $image_size ) {
    $image = wp_get_attachment_image_src( $image_id, $image_size );
    return $image[0];
}

// Custom callback for threaded comments to permit HTML editing
function km_custom($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
		<li id="li-comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
			<div id="comment-<?php comment_ID(); ?>" class="the-comment">
			<div class="comment-author vcard">
				<?php echo get_avatar($comment,$size='36',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'reStart'), get_comment_author_link()) ?>
			</div>
			
	<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.', 'reStart') ?></em>
		<br>
	<?php endif; ?>

	<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars(get_comment_link( $comment->comment_ID )) ?>">
		<?php printf(__('%1$s at %2$s', 'reStart'), get_comment_date(),get_comment_time()) ?></a><?php edit_comment_link( __( '(Edit)', 'reStart' ), ' ' ); ?>
	</div>
	
	<?php comment_text() ?>
	
	<?php if($args['max_depth']!=$depth) { ?>
		<div class="reply">
			<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	<?php } ?>
	</div>
	
<?php } ?>