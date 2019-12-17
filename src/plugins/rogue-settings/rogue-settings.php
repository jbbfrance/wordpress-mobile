<?php
/*
Plugin Name: Rogue Settings, by Bonfire 
Plugin URI: http://bonfirethemes.com/
Description: Settings for Bonfire's Rogue mobile theme. Customize under Settings > Rogue Theme. Customize colors under Appearance > Customize > Rogue Theme Colors.
Version: 1.0
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
License: GPL2
*/


	//
	// CREATE THE SETTINGS PAGE (for WordPress backend, Settings > Rogue Theme)
	//
	
	/* create "Settings" link on plugins page */
	function bonfire_rogue_settings_link($links) { 
		$settings_link = '<a href="options-general.php?page=rogue-settings/rogue-settings.php">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}
	$plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$plugin", 'bonfire_rogue_settings_link' );

	/* create the "Settings > Rogue Theme" menu item */
	function bonfire_rogue_admin_menu() {
		add_submenu_page('options-general.php', 'Rogue Theme Settings', 'Rogue Theme', 'administrator', __FILE__, 'bonfire_rogue_page');
	}
	
	/* create the actual settings page */
	function bonfire_rogue_page() {
		if ( isset ($_POST['update_bonfire_rogue']) == 'true' ) { bonfire_rogue_update(); }
	?>

		<div class="wrap">
			<br>
			<h2>Rogue Theme Settings</h2>
			<strong>Psst!</strong> Rogue's color options can be changed under <strong>Appearance > Customize > Rogue Theme Colors</strong>

			<form method="POST" action="">
				<input type="hidden" name="update_bonfire_rogue" value="true" />

				<br><hr><br>

				<!-- BEGIN SHOW EXCERPTS -->
				<h2>Excerpts</h2>
				<table class="form-table">
					<tr valign="top">
					<td>
					<label><input type="checkbox" name="rogue_show_excerpt" id="rogue_show_excerpt" <?php echo get_option('bonfire_rogue_show_excerpt'); ?> /> Show excerpts on blog index (if unchecked, full posts will be shown).</label><br>
					</td>
					</tr>
				</table>
				<!-- END SHOW EXCERPTS -->

				<br><hr><br>
				
				<!-- BEGIN TITLE/BODY -->
				<h2>Title/body</h2>
				<table class="form-table">
					<!-- BEGIN ALIGN -->
					<tr valign="top">
					<td>
					<?php $rogue_align = get_option('bonfire_rogue_align'); ?>
					<label><input value="roguealignleft" type="radio" name="rogue_align" <?php if ($rogue_align=='roguealignleft') { echo 'checked'; } ?>> Left</label><br>
					<label><input value="roguealigncenter" type="radio" name="rogue_align" <?php if ($rogue_align=='roguealigncenter') { echo 'checked'; } ?>> Center</label><br>
					<label><input value="roguealignright" type="radio" name="rogue_align" <?php if ($rogue_align=='roguealignright') { echo 'checked'; } ?>> Right</label><br>
					</td>
					</tr>
					<!-- END ALIGN -->

					<!-- BEGIN CONTENT PADDING -->
					<tr valign="top">
					<td>
					<label><input type="checkbox" name="rogue_content_padding" id="rogue_content_padding" <?php echo get_option('bonfire_rogue_content_padding'); ?> /> Add padding to featured images, videos, galleries etc. placed above the title (if unchecked, the elements will run from side to side).</label><br>
					</td>
					</tr>
					<!-- END CONTENT PADDING -->
				</table>
				<!-- END TITLE/BODY -->

				<br><hr><br>
				
				<!-- BEGIN POST/PAGE TITLE -->
				<h2>Post/page title</h2>
				<table class="form-table">
					<!-- BEGIN POST/PAGE TITLE FONT SIZE -->
					<tr valign="top">
					<th scope="row">Post/page title font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="rogue_title_font_size" id="rogue_title_font_size" value="<?php echo get_option('bonfire_rogue_title_font_size'); ?>"/> px. Enter custom font size for post/page titles. If left empty, defaults to 28px
					</td>
					</tr>
					<!-- END POST/PAGE TITLE FONT SIZE -->
					
					<!-- BEGIN POST/PAGE TITLE LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Post/page title line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="rogue_title_line_height" id="rogue_title_line_height" value="<?php echo get_option('bonfire_rogue_title_line_height'); ?>"/> px. Enter custom line height for post/page titles. If left empty, defaults to 26px
					</td>
					</tr>
					<!-- END POST/PAGE TITLE LINE HEIGHT -->
					
					<!-- BEGIN POST/PAGE TITLE LETTER SPACING -->
					<tr valign="top">
					<th scope="row">Post/page title letter spacing:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="rogue_title_letter_spacing" id="rogue_title_letter_spacing" value="<?php echo get_option('bonfire_rogue_title_letter_spacing'); ?>"/> px. Enter custom letter spacing for post/page titles. If left empty, defaults to 0px
					</td>
					</tr>
					<!-- END POST/PAGE TITLE LETTER SPACING -->
					
					<!-- BEGIN POST/PAGE TITLE FONT -->
					<tr valign="top">
					<th scope="row">Post/page title font:</th>
					<td>
					<?php $rogue_post_page_title_font = get_option('bonfire_rogue_post_page_title_font'); ?>
					<label><input value="roguepostpagetitleserif" type="radio" name="rogue_post_page_title_font" <?php if ($rogue_post_page_title_font=='roguepostpagetitleserif') { echo 'checked'; } ?>> Serif</label><br>
					<label><input value="roguepostpagetitlesansserif" type="radio" name="rogue_post_page_title_font" <?php if ($rogue_post_page_title_font=='roguepostpagetitlesansserif') { echo 'checked'; } ?>> Sans Serif</label><br>
					</td>
					</tr>
					<!-- END POST/PAGE TITLE FONT -->
				</table>
				<!-- END POST/PAGE TITLE -->
				
				<br><hr><br>
				
				<!-- BEGIN BODY TEXT -->
				<h2>Body text</h2>
				<table class="form-table">
					<!-- BEGIN BODY TEXT FONT SIZE -->
					<tr valign="top">
					<th scope="row">Body text font size:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="rogue_body_font_size" id="rogue_body_font_size" value="<?php echo get_option('bonfire_rogue_body_font_size'); ?>"/> px. Enter custom font size for body text. If left empty, defaults to 16px
					</td>
					</tr>
					<!-- END BODY TEXT FONT SIZE -->
					
					<!-- BEGIN BODY TEXT LINE HEIGHT -->
					<tr valign="top">
					<th scope="row">Body text line height:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="rogue_body_line_height" id="rogue_body_line_height" value="<?php echo get_option('bonfire_rogue_body_line_height'); ?>"/> px. Enter custom line height for body text. If left empty, defaults to 27px
					</td>
					</tr>
					<!-- END BODY TEXT TITLE LINE HEIGHT -->
					
					<!-- BEGIN BODY TEXT FONT -->
					<tr valign="top">
					<th scope="row">Body text font:</th>
					<td>
					<?php $rogue_body_text_font = get_option('bonfire_rogue_body_text_font'); ?>
					<label><input value="roguebodytextserif" type="radio" name="rogue_body_text_font" <?php if ($rogue_body_text_font=='roguebodytextserif') { echo 'checked'; } ?>> Serif</label><br>
					<label><input value="roguebodytextsansserif" type="radio" name="rogue_body_text_font" <?php if ($rogue_body_text_font=='roguebodytextsansserif') { echo 'checked'; } ?>> Sans Serif</label><br>
					</td>
					</tr>
					<!-- END BODY TEXT FONT -->
				</table>
				<!-- END BODY TEXT -->
				
				<br><hr><br>

				<!-- BEGIN 'SAVE OPTIONS' BUTTON -->	
				<p><input type="submit" name="search" value="Save Options" class="button button-primary" /></p>
				<!-- BEGIN 'SAVE OPTIONS' BUTTON -->	

			</form>

		</div>
	<?php }
	function bonfire_rogue_update() {

		/* show excerpts */
		if ( isset ($_POST['rogue_show_excerpt'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('bonfire_rogue_show_excerpt', $display);
		
		/* title/body alignment */
		if ( isset ($_POST['rogue_align']) == 'true' ) {
		update_option('bonfire_rogue_align', $_POST['rogue_align']); }
		/* content padding */
		if ( isset ($_POST['rogue_content_padding'])=='on') { $display = 'checked'; } else { $display = ''; }
	    update_option('bonfire_rogue_content_padding', $display);
		
		/* post/page title font size */
		update_option('bonfire_rogue_title_font_size', $_POST['rogue_title_font_size']);
		/* post/page title line height */
		update_option('bonfire_rogue_title_line_height', $_POST['rogue_title_line_height']);
		/* post/page title letter spacing  */
		update_option('bonfire_rogue_title_letter_spacing', $_POST['rogue_title_letter_spacing']);
		/* post/page title font */
		if ( isset ($_POST['rogue_post_page_title_font']) == 'true' ) {
		update_option('bonfire_rogue_post_page_title_font', $_POST['rogue_post_page_title_font']); }

		/* body text font size */
		update_option('bonfire_rogue_body_font_size', $_POST['rogue_body_font_size']);
		/* body text line height */
		update_option('bonfire_rogue_body_line_height', $_POST['rogue_body_line_height']);
		/* body text font */
		if ( isset ($_POST['rogue_body_text_font']) == 'true' ) {
		update_option('bonfire_rogue_body_text_font', $_POST['rogue_body_text_font']); }

	}
	add_action('admin_menu', 'bonfire_rogue_admin_menu');
	?>
<?php

	//
	// Add color options to Appearance > Customize
	//
	add_action( 'customize_register', 'bonfire_rogue_customize_register' );
	function bonfire_rogue_customize_register($wp_customize)
	{
		$colors = array();

		/* post/page title */
		$colors[] = array( 'slug'=>'rogue_post_page_title_color', 'default' => '', 'label' => __( 'Post/page title', 'bonfire' ) );
		/* body text +links */
		$colors[] = array( 'slug'=>'rogue_body_text_color', 'default' => '', 'label' => __( 'Post/page text', 'bonfire' ) );
		$colors[] = array( 'slug'=>'rogue_body_link_color', 'default' => '', 'label' => __( 'Post/page link', 'bonfire' ) );

	foreach($colors as $color)
	{

	/* create custom color customization section */
	$wp_customize->add_section( 'rogue_theme_colors' , array( 'title' => __('Rogue Theme Colors', 'bonfire'), 'priority' => 32 ));
	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'rogue_theme_colors', 'settings' => $color['slug'] )));
	}
	}

	//
	// Insert theme customizer options into the footer
	//
	function bonfire_rogue_header_customize() {
	?>

		<!-- BEGIN CUSTOM COLORS (WP THEME CUSTOMIZER) -->
		<!-- post/page title -->
		<?php $rogue_post_page_title_color = get_option('rogue_post_page_title_color'); ?>
		<!-- body text + links -->
		<?php $rogue_body_text_color = get_option('rogue_body_text_color'); ?>
		<?php $rogue_body_link_color = get_option('rogue_body_link_color'); ?>
		
		<style>
		/**************************************************************
		*** CUSTOM COLORS
		**************************************************************/		
		<?php if( get_option('bonfire_rogue_content_padding') ) { ?>
		.featured-image,
		.video-container,
		.post-shortcode {
			padding-left:5px;
			padding-right:5px;
			margin-top:6px;
		}
		.featured-image img {
			margin-top:6px;
		}
		.video-container {
			padding-bottom:55%;
		}
		<?php } ?>

		.entry-title,
		.entry-title a {
			color:<?php echo esc_attr($rogue_post_page_title_color); ?>;
			font-size:<?php echo get_option('bonfire_rogue_title_font_size'); ?>px;
			letter-spacing:<?php echo get_option('bonfire_rogue_title_letter_spacing'); ?>px;
		}
		h1.entry-title { line-height:<?php echo get_option('bonfire_rogue_title_line_height'); ?>px; }
		.entry-content {
			font-size:<?php echo get_option('bonfire_rogue_body_font_size'); ?>px;
			line-height:<?php echo get_option('bonfire_rogue_body_line_height'); ?>px;
		}
		.entry-content,
		.post-cat,
		.post-tag,
		.post-author,
		.link-pages p { color:<?php echo esc_attr($rogue_body_text_color); ?>; }
		.entry-content a,
		.post-cat a,
		.post-tag a,
		.post-author a,
		.link-pages a { color:<?php echo esc_attr($rogue_body_link_color); ?>; }
		/* title/body align */
		<?php if(get_option('bonfire_rogue_align') == "roguealigncenter") { ?>
		.post-date-comment { margin-left:0; }
		.post-date-comment,
		.entry-title,
		.entry-title a,
		.entry-content {
			text-align:center;
		}
		<?php } else if(get_option('bonfire_rogue_align') == "roguealignright") { ?>
		.post-date-comment { margin-left:0; margin-right:15px; }
		.post-date-comment,
		.entry-title,
		.entry-title a,
		.entry-content {
			text-align:right;
		}
		<?php } else { ?>
		<?php } ?>
		/* post/page title font */
		<?php if(get_option('bonfire_rogue_post_page_title_font') == "roguepostpagetitlesansserif") { ?>
		.sticky,
		.entry-title,
		.entry-title a {
			font-family:'Raleway';
			font-weight:700;
		}
		<?php } ?>
		/* body text font */
		<?php if(get_option('bonfire_rogue_body_text_font') == "roguebodytextsansserif") { ?>
		.entry-content,
		.post-cat,
		.post-tag,
		.post-author,
		.link-pages p,
		h1, h2, h3, h4, h5, h6 {
			font-family:'Roboto';
			font-weight:300;
		}
		<?php } ?>		
		</style>
		<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->
	
	<?php
	}
	add_action('wp_head','bonfire_rogue_header_customize');

?>