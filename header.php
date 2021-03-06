<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="description" content="Cargo Media AG, Basel" />
	<meta name="keywords" content="Cargo Media AG, cargo, media, jobs, webfactory, web development" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?></title>
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/favicon.ico" type="image/x-icon" />

	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_directory' ); ?>/img/icon/apple-touch-icon-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/img/icon/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/img/icon/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/img/icon/apple-touch-icon-144x144-precomposed.png" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/css/reset.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/style.css" />
	<script type='text/javascript' src="<?php bloginfo( 'template_directory' ); ?>/js/jquery-1.7.1.min.js"></script>
	<script type='text/javascript' src="<?php bloginfo( 'template_directory' ); ?>/js/cm.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>

<body class="<?php if(is_page()) {echo 'page-'.$post->post_name; } ?>">
	<div class="frame">
		<div class="frameMask left"></div>
		<div class="frameMask right"></div>
		<header>
			<div class="sheet">
				<a href="/" class="logo">
					<div class="sign">
						<div class="ball b1"></div>
						<div class="ball b2"></div>
						<div class="ball b3"></div>
						<div class="ball m1"></div>
						<div class="ball m2"></div>
						<div class="ball m3"></div>
						<div class="ball t1"></div>
						<div class="ball t2"></div>
						<div class="ball t3"></div>
					</div>
					<div class="text"><span>CARGO</span><span>media</span></div>
				</a>
				<nav id="access" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
			</div>
		</header>
		<?php if ( is_front_page() ) { ?>
		<div class="headerImage">
			<?php
			// Check to see if the header image has been removed
			$header_image = get_header_image();
			if ( $header_image ) :
				// Compatibility with versions of WordPress prior to 3.4.
				if ( function_exists( 'get_custom_header' ) ) {
					// We need to figure out what the minimum width should be for our featured image.
					// This result would be the suggested width if the theme were to implement flexible widths.
					$header_image_width = get_theme_support( 'custom-header', 'width' );
				} else {
					$header_image_width = HEADER_IMAGE_WIDTH;
				}
				?>
				<?php
				// The header image
				// Check if this is a post or page, if it has a thumbnail, and if it's a big one
				if ( is_singular() && has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
						$image[1] >= $header_image_width ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
				else :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						$header_image_width  = get_custom_header()->width;
						$header_image_height = get_custom_header()->height;
					} else {
						$header_image_width  = HEADER_IMAGE_WIDTH;
						$header_image_height = HEADER_IMAGE_HEIGHT;
					}
					?>
					<div class="imgWrapper sheet">
						<div class="smoothDevide"></div>
						<div class="smoothDevide right"></div>
						<div class="smoothDevide top"></div>
						<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
					</div>
					<?php endif; // end check for featured image or standard header ?>
				<?php endif; // end check for removed header image ?>
			</div>
		<?php } ?>
		<section id="main">
