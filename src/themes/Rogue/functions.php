<?php

///////////////////////////////////////
// You may add your custom functions here
///////////////////////////////////////

	///////////////////////////////////////
	// Add nice titles across the theme
	///////////////////////////////////////
	function bonfire_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'bonfire' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'bonfire_wp_title', 10, 2 );

	///////////////////////////////////////
	// Add hook after opening body tag
	///////////////////////////////////////
	function wp_after_body() {
		do_action('wp_after_body');
	}

	///////////////////////////////////////
	// Enable featured image
	///////////////////////////////////////
	add_theme_support('post-thumbnails');

	///////////////////////////////////////
	// Add default posts and comments RSS feed links to head
	///////////////////////////////////////
	add_theme_support('automatic-feed-links');

	///////////////////////////////////////
	// Styles the visual editor with editor-style.css to match the theme style
	///////////////////////////////////////
	add_editor_style();

	///////////////////////////////////////
	// Load theme languages
	///////////////////////////////////////
	load_theme_textdomain( 'bonfire', get_template_directory().'/languages' );

	///////////////////////////////////////
	// Custom Excerpt Length
	///////////////////////////////////////
	function custom_excerpt_length( $length ) {
		return 50;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	///////////////////////////////////////
	// Default Main Nav Function
	///////////////////////////////////////
	function default_main_nav() {
		echo '<ul id="main-nav" class="main-nav clearfix">';
		wp_list_pages('title_li=');
		echo '</ul>';
	}

	///////////////////////////////////////
	// Register Widgets
	///////////////////////////////////////
	function bonfire_widgets_init() {

		register_sidebar( array(
		'name' => __( 'Footer Widgets', 'bonfire' ),
		'id' => 'footer-widgets-full',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'bonfire_widgets_init' );

	///////////////////////////////////////
	// Custom titles
	///////////////////////////////////////
	add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
	function baw_hack_wp_title_for_home( $title )
	{
	  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
	  	echo bloginfo('name') . ' | ' . get_bloginfo( 'description' );
	  }
	  return $title;
	}

	///////////////////////////////////////
	// Enqueue Google WebFonts
	///////////////////////////////////////
	function bonfire_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'bonfire-fonts', "$protocol://fonts.googleapis.com/css?family=Quantico:400,700|Bree+Serif|Merriweather:300,700|Dosis:400|Roboto:300|Montserrat|Raleway:700' rel='stylesheet' type='text/css" );}
	add_action( 'wp_enqueue_scripts', 'bonfire_fonts' );

	///////////////////////////////////////
	// Enqueue style.css (default WordPress stylesheet)
	///////////////////////////////////////
	function bonfire_style() {
		wp_register_style( 'style', get_stylesheet_uri() , array(), '1', 'all' );
		wp_enqueue_style( 'style' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_style' );

	///////////////////////////////////////
	// Enqueue misc-footer.js
	///////////////////////////////////////
    function bonfire_miscfooter() {
		wp_register_script( 'misc-footer', get_template_directory_uri() . '/js/misc-footer.js',  array( 'jquery' ), '1', true );
		wp_enqueue_script( 'misc-footer' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_miscfooter' );

	///////////////////////////////////////
	// Enqueue autogrow/jquery.autogrow-textarea.js
	///////////////////////////////////////
    function bonfire_autogrow() {
		if ( is_singular() ) {
		wp_register_script( 'autogrow', get_template_directory_uri() . '/js/autogrow/jquery.autogrow-textarea.js',  array( 'jquery' ), '1', true );
		wp_enqueue_script( 'autogrow' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_autogrow' );

	///////////////////////////////////////
	// Enqueue comment-form.js
	///////////////////////////////////////
	function bonfire_commentform() {
		if ( is_single() ) {
		wp_register_script( 'comment-form', get_template_directory_uri() . '/js/comment-form.js',  array( 'jquery' ), '1', true );
		wp_enqueue_script( 'comment-form' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_commentform' );

	///////////////////////////////////////
	// Enqueue jquery.scrollTo-min.js (smooth scrolling to anchors)
	///////////////////////////////////////
    function bonfire_scrollto() {
		wp_register_script( 'scroll-to', get_template_directory_uri() . '/js/jquery.scrollTo-min.js',  array( 'jquery' ), '1', true );
		wp_enqueue_script( 'scroll-to' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_scrollto' );

	///////////////////////////////////////
	// Enqueue comment-reply.js (threaded comments)
	///////////////////////////////////////
	function bonfire_comment_reply(){
		if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' );
	}
	add_action('wp_print_scripts', 'bonfire_comment_reply');

	///////////////////////////////////////
	// Define content width
	///////////////////////////////////////
	if ( ! isset( $content_width ) ) $content_width = 1000;

	///////////////////////////////////////
	// Custom Comment Output
	///////////////////////////////////////
	function custom_theme_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment;
	   ?>

		<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>

			<div class="comment-container">

				<div class="comment-entry">
					<span class="comment-author"><?php printf(get_comment_author_link()) ?></span>
					(<?php comment_reply_link(array_merge( $args, array('add_below' => 'comment', 'depth' => $depth, 'reply_text' => __( 'reply', 'bonfire' ), 'max_depth' => $args['max_depth']))) ?>):
					<?php echo get_comment_text(); ?>
					<?php if ($comment->comment_approved == '0') : ?>
					<span class="awaiting-moderation"><?php _e('(Awaiting moderation.)', 'bonfire') ?></span>
					<?php endif; ?>
					<?php edit_comment_link( __('Edit', 'bonfire')) ?>
				</div>

			</div>

	<?php
	}


	///////////////////////////////////////
	// Workflow redirect pages
	///////////////////////////////////////
	/**
	* Add read_private_posts capability to subscriber
	* Note this is saves capability to the database on admin_init, so consider doing this once on theme/plugin activation
	*/
	function redirect_private_content() {
		global $wp_query, $wpdb, $wp;
		if ( is_404() ) {
			$current_query = $wpdb->get_row($wp_query->request);
			if( 'private' == $current_query->post_status ) {
				// wp_redirect( wp_login_url( home_url( $wp->request ) ) );
				wp_redirect( wp_login_url( home_url(add_query_arg(array($_GET), $wp->request)) ) );
				exit;
			}
		}
	}
	add_action( 'template_redirect', 'redirect_private_content', 9 );
?>
