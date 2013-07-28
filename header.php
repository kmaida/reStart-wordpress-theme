<!DOCTYPE html>

<!--[if IE 7]><html <?php language_attributes(); ?> class="ie ie7"><![endif]-->
<!--[if lte IE 8]><html <?php language_attributes(); ?> class="ie"><![endif]-->
<!--[if !IE|gte IE 9]><!--><html <?php language_attributes(); ?>><!-- <![endif]-->

	<head>
		<!-- reStart mostly-blank responsive template theme -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" media="screen">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/print.css" media="print">
        <!--[if lte IE 6]>
			<link rel="stylesheet" href="http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
		<![endif]-->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php 
			wp_enqueue_script('jquery'); 
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );	// only works if placed in the head
			
			wp_head();
		?>

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper-overflow" class="wrapper-overflow">	<!-- manages overflow for off-canvas elements -->
			<div id="wrapper-canvas" class="wrapper-canvas">	<!-- manages visible canvas -->

				<header id="header-global" class="header-global">
					<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
					<h2><?php bloginfo('description'); ?></h2>
					<a id="nav-toggle" class="nav-toggle" href="#nav-global">Menu</a>
				</header>
				<nav id="nav-global" class="nav-global" role="navigation">
		        	<!-- wp_nav_menu generates a container div with a class of "menu" -->
					<?php wp_nav_menu('Primary Navigation','title_li='); ?>
				</nav>
				
				<div id="wrapper-content" class="wrapper-content clearfix"> <!-- manages content (main, sidebar, footer) -->