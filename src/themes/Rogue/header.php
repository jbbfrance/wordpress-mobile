<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo bloginfo('rss2_url'); ?>">

<!-- wp_header -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- wp_after_body -->
<?php wp_after_body(); ?>

		<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
		<?php if ( is_plugin_active( 'taptap-for-rogue/taptap.php' ) ) { ?>
		<!-- BEGIN MENU BUTTON -->
		<div class="taptap-menu-button-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if( get_option('bonfire_taptap_absolute_position') ) { ?> taptap-absolute<?php } ?><?php if( get_option('bonfire_taptap_left_right') ) { ?> taptap-right<?php } ?>">
			<div class="taptap-menu-button">
				<div class="taptap-menu-button-middle"></div>
			</div>
		</div>
		<!-- END MENU BUTTON -->

		<!-- BEGIN SEARCH BUTTON -->
		<?php if( get_option('bonfire_taptap_hide_search') ) { ?>
		<?php } else {?>
		<div class="taptap-search-button<?php if( get_option('bonfire_taptap_left_right') ) { ?>-right<?php } ?><?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if( get_option('bonfire_taptap_absolute_position') ) { ?> taptap-absolute<?php } ?>">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
			<path id="magnifier-3-icon" d="M208.464,363.98c-86.564,0-156.989-70.426-156.989-156.99C51.475,120.426,121.899,50,208.464,50
				c86.565,0,156.991,70.426,156.991,156.991C365.455,293.555,295.029,363.98,208.464,363.98z M208.464,103.601
				c-57.01,0-103.389,46.381-103.389,103.39s46.379,103.389,103.389,103.389c57.009,0,103.391-46.38,103.391-103.389
				S265.473,103.601,208.464,103.601z M367.482,317.227c-14.031,20.178-31.797,37.567-52.291,51.166L408.798,462l51.728-51.729
				L367.482,317.227z"/>
			</svg>
		</div>
		<?php } ?>
		<!-- END SEARCH BUTTON -->
		
		<!-- BEGIN SEARCH FORM -->
		<div class="taptap-search-wrapper<?php if( get_option('bonfire_taptap_absolute_position') ) { ?> taptap-absolute<?php } ?><?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>">
				<!-- BEGIN SEARCH FORM CLOSE ICON -->
				<div class="taptap-search-close-icon">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
					<path d="M9.016,40.837c0.195,0.195,0.451,0.292,0.707,0.292c0.256,0,0.512-0.098,0.708-0.293l14.292-14.309
						l14.292,14.309c0.195,0.196,0.451,0.293,0.708,0.293c0.256,0,0.512-0.098,0.707-0.292c0.391-0.39,0.391-1.023,0.001-1.414
						L26.153,25.129L40.43,10.836c0.39-0.391,0.39-1.024-0.001-1.414c-0.392-0.391-1.024-0.391-1.414,0.001L24.722,23.732L10.43,9.423
						c-0.391-0.391-1.024-0.391-1.414-0.001c-0.391,0.39-0.391,1.023-0.001,1.414l14.276,14.293L9.015,39.423
						C8.625,39.813,8.625,40.447,9.016,40.837z"/>
					</svg>
				</div>
				<!-- END SEARCH FORM CLOSE ICON -->
			
				<form method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
					<input type="text" name="s" id="s" placeholder="<?php _e( 'type search term...' , 'bonfire' ) ?>">
				</form>
		</div>
		<!-- END SEARCH FORM -->

		<!-- BEGIN LOGO -->
		<?php if( get_option('bonfire_taptap_hide_logo') ) { ?>
		<?php } else {?>
			<div class="taptap-logo-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if( get_option('bonfire_taptap_absolute_position') ) { ?> taptap-absolute<?php } ?><?php if( get_option('bonfire_taptap_left_right') ) { ?> taptap-left<?php } ?>">
				<?php if ( get_theme_mod( 'taptap_logo' ) ) : ?>
			
					<!-- BEGIN LOGO IMAGE -->
					<div class="taptap-logo-image">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'taptap_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
					</div>
					<!-- END LOGO IMAGE -->
			
				<?php else : ?>
			
					<!-- BEGIN LOGO -->
					<div class="taptap-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</div>
					<!-- END LOGO -->
			
				<?php endif; ?>
			</div>
		<?php } ?>
		<!-- END LOGO -->
		
		<!-- BEGIN HEADER BACKGROUND -->
		<?php if( get_option('bonfire_taptap_show_header') ) { ?>
			<div class="tap-tap-header<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?> 	<?php if( get_option('bonfire_taptap_absolute_position') ) { ?> taptap-absolute<?php } ?>">
			</div>
		<?php } ?>
		<!-- END HEADER BACKGROUND -->
		
		<!-- BEGIN MENU BACKGROUND COLOR -->
		<div class="taptap-background-color">
		</div>
		<!-- END MENU BACKGROUND COLOR -->
		
		<!-- BEGIN MENU BACKGROUND IMAGE -->
		<?php if(get_option('bonfire_taptap_background_image')) { ?>
		<div class="taptap-background-image" style="background-image: url(<?php echo get_option('bonfire_taptap_background_image'); ?>);">
		</div>
		<?php } ?>
		<!-- END MENU BACKGROUND IMAGE -->

		<!-- BEGIN MAIN WRAPPER -->
		<div class="taptap-main-wrapper">
			<div class="taptap-main-inner">
				<div class="taptap-main">
					<div class="taptap-main-inner-inner">
						<!-- BEGIN HEADING -->
						<div class="taptap-heading">
							<?php echo stripslashes(get_option('bonfire_taptap_heading')); ?>
						</div>
						<!-- END HEADING -->
						
						<!-- BEGIN SUBHEADING -->
						<div class="taptap-subheading">
							<?php echo stripslashes(get_option('bonfire_taptap_subheading')); ?>
						</div>
						<!-- END SUBHEADING -->
						
						<!-- BEGIN IMAGE -->
						<?php if(get_option('bonfire_taptap_image')) { ?>
						<div class="taptap-image">
							<img src="<?php echo get_option('bonfire_taptap_image'); ?>">
						</div>
						<?php } ?>
						<!-- END IMAGE -->
						
						<!-- BEGIN MENU -->
						<?php $walker = new TapTap_Menu_Description; ?>
						<?php wp_nav_menu( array( 'container_class' => 'taptap-by-bonfire', 'theme_location' => 'taptap-by-bonfire', 'walker' => $walker, 'fallback_cb' => '' ) ); ?>
						<!-- END MENU -->
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN WRAPPER -->
		<?php } ?>

<div id="sitewrap">
	<div id="body" class="pagewidth clearfix">