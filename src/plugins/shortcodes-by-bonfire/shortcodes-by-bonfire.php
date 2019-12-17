<?php
/*
Plugin Name: Shortcodes, by Bonfire 
Plugin URI: http://bonfirethemes.com/
Description: A wide collection of shortcodes from Bonfire Themes.
Version: 1.0
Author: Rain Anderson
Author URI: http://bonfirethemes.com/
License: GPL2
*/


	//
	// BUILD THE 'CHEAT SHEET' META BOX
	//
	
	add_action( 'add_meta_boxes', 'bonfire_shortcodes_cheat_sheet' );

	function bonfire_shortcodes_cheat_sheet() {
		$screens = array( 'post', 'page' );
		foreach ($screens as $screen) {
			add_meta_box(
				'bonfire_shortcodes_sectionid',
				__( 'Bonfire Shortcodes Cheat Sheet', 'bonfire' ),
				'bonfire_shortcodes_custom_box',
				$screen
			);
		}
	}
	
	/* Add box content */
	function bonfire_shortcodes_custom_box( $post ) {
	?>

	<p><strong>Color options for all shortcodes:</strong> silver, green, blue, salmon, red, orange, pink
	<br>
	<br>
	<strong>IMAGE HOVER</strong><br>
	<code>[imagehover]IMAGE HERE[/imagehover]</code>
	<br>
	<br>
	<strong>INFO BOX</strong><br>
	<code>[infobox image="IMAGE URL" title="TEXT" description="TEXT" corner="NUMBER"]CONTENT HERE[/infobox]</code>
	<br>
	<br>
	<br>
	<strong>PROGRESS BAR</strong><br>
	<code>[progressbar description="TEXT" description2="TEXT" progress="NUMBER" width="NUMBER px or %" height="NUMBER" corner="NUMBER" color="COLOR"]</code>
	<br>
	<br>
	<br>
	<strong>TEXT HIGHLIGHTING</strong><br>
	<code>[highlight color="COLOR"]TEXT HERE[/highlight]</code>
	<br>
	<br>
	<br>
	<strong>COLUMN</strong><br>
	<code>[column width="NUMBER %/px" position="LEFT/RIGHT"]PARAGRAPH HERE[/column]</code>
	<br>
	<br>
	<br>
	<strong>BUTTON</strong><br>
	<code>[button link="URL" color="COLOR" corner="NUMBER" textsize="NUMBER"]BUTTON TEXT HERE[/button]</code>
	<br>
	<br>
	<br>
	<strong>BOX</strong><br>
	<code>[box width="NUMBER %/px" height="NUMBER %/px" position="LEFT/RIGHT" corner="NUMBER" color="COLOR" textalign="LEFT/CENTER/RIGHT" textsize="NUMBER"]BOX CONTENT HERE[/box]</code>
	<br>
	<br>
	<br>
	<strong>ALERT</strong><br>
	<code>[alert width="NUMBER %/px" position="LEFT/RIGHT" id="NUMBER 1-10" corner="NUMBER" textalign="LEFT/CENTER/RIGHT" textsize="NUMBER" color="COLOR"]ALERT TEXT HERE[/alert]</code>
	<br>
	<br>
	<br>
	<strong>TOGGLE BOX (open on page load)</strong><br>
	<code>[boxopen width="NUMBER %/px" position="LEFT/RIGHT" id="NUMBER 1-10" corner="NUMBER" color="COLOR" textalign="LEFT(DEFAULT)/CENTER/RIGHT" textsize="NUMBER" title="TITLE"]BOX CONTENT HERE[/boxopen]</code>
	<br>
	<br>
	<br>
	<strong>TOGGLE BOX (closed on page load)</strong><br>
	<code>[boxclosed width="NUMBER %/px" position="LEFT/RIGHT" id="NUMBER 1-10" corner="NUMBER" color="COLOR" textalign="LEFT(DEFAULT)/CENTER/RIGHT" textsize="NUMBER" title="TITLE"]BOX CONTENT HERE[/boxclosed]</code>
	<br>
	<br>
	<br>
	<strong>DIVIDERS</strong><br>
	<br>
	<strong>Mini divider</strong><br>
	<code>[minidivider color="COLOR" width="NUMBER %/px"]</code><br>
	<br>
	<strong>Shadow dividers</strong><br>
	<code>[shadowup1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[shadowup2 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[shadowdown1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[shadowdown2 color="COLOR" width="NUMBER %/px"]</code><br>
	<br>
	<strong>Solid line dividers</strong><br>
	<code>[solid1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[solid2 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[solid3 color="COLOR" width="NUMBER %/px"]</code><br>
	<br>
	<strong>Double line dividers</strong><br>
	<code>[double1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[double2 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[double3 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[double4 color="COLOR" width="NUMBER %/px"]</code><br>
	<br>
	<strong>Dotted line dividers</strong><br>
	<code>[dotted1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[dotted2 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[dotted3 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[dotted4 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[dotted5 color="COLOR" width="NUMBER %/px"]</code><br>
	<br>
	<strong>Dashed line dividers</strong><br>
	<code>[dashed1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[dashed1 color="COLOR" width="NUMBER %/px"]</code><br>
	<code>[dashed1 color="COLOR" width="NUMBER %/px"]</code><br>
	<br>
	<br>
	<br>
	<strong>NEWLINE (use after positioning shortcodes)</strong><br>
	<code>[newline]</code>
	<br>
	<br>
	
	<?php
	}


	//
	// ENQUEUE shortcodes-by-bonfire.css
	//
	
	function bonfire_shortcodes()  
    {
        wp_register_style( 'bonfire-shortcodes', plugins_url( '/shortcodes-by-bonfire.css', __FILE__ ) . '', array(), '1', 'all' );
        wp_enqueue_style( 'bonfire-shortcodes' );  
    }  
    add_action( 'wp_enqueue_scripts', 'bonfire_shortcodes' ); 


	//
	// ENQUEUE shortcodes.js
	//
	
	function bonfire_shortcodes_js() {  
		wp_register_script( 'shortcodes-js', plugins_url( '/shortcodes-by-bonfire.js', __FILE__ ) . '', array( 'jquery' ), '1' );  

		wp_enqueue_script( 'shortcodes-js' );  
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_shortcodes_js' );  


	//
	// IMAGE HOVER
	//
	
	//[imagehover]IMAGE HERE[/imagehover]
	function imagehover($atts, $content = null) {
	extract(shortcode_atts(array( ), $atts));
		return '<span class="bonfire-image-hover">'.do_shortcode($content).'</span>';}
	add_shortcode('imagehover', 'imagehover');


	//
	// INFO BOX
	//
	
	//[infobox image="IMAGE URL" title="TEXT" description="TEXT" corner="NUMBER"]CONTENT HERE[/infobox]
	function infobox($atts, $content = null) {
	extract(shortcode_atts(array( 'title' => '', 'description' => '', 'image' => '', 'corner' => '2' ), $atts));
		return '<div class="infobox">
					<div class="infobox-image" style="background-image:url('.$image.');border-top-left-radius:'.$corner.'px;border-bottom-left-radius:'.$corner.'px;"></div>
					<div class="infobox-content-wrapper" style="border-top-right-radius:'.$corner.'px;border-bottom-right-radius:'.$corner.'px;">
						<div class="infobox-title">'.$title.'</div>
						<div class="infobox-description">'.$description.'</div>
						<div class="infobox-content">'.do_shortcode($content).'</div>
					</div>
				</div>';}
	add_shortcode('infobox', 'infobox');
	

	//
	// PROGRESS BAR
	//
	
	//[progressbar description="TEXT" progress="NUMBER" width="NUMBER px or %" height="NUMBER" corner="NUMBER" color="COLOR"]
	function progressbar($atts, $content = null) {
	extract(shortcode_atts(array( 'description' => '', 'description2' => '', 'progress' => '','width' => '100%','height' => '30','corner' => '2','color' => '' ), $atts));
		return '<div class="progress-description-2">'.$description2.'</div>
				<div class="progress-wrapper" style="max-width:'.$width.';border-radius:'.$corner.'px;">
					<div class="progress-description">'.$description.'</div>
					<div class="nowidth progress'.$color.'" style="width:'.$progress.'%;height:'.$height.'px;border-radius:'.$corner.'px;z-index:-1;"></div>
				</div>';}
	add_shortcode('progressbar', 'progressbar');


	//
	// TEXT HIGHLIGHING
	//
	
	//[highlight color="color"]TEXT HERE[/highlight]
	function highlight($atts, $content = null) {
	extract(shortcode_atts(array( 'color' => '' ), $atts));
		return '<span class="highlight'.$color.'">'.do_shortcode($content).'</span>';}
	add_shortcode('highlight', 'highlight');


	//
	// COLUMNS
	//

	//[column width="NUMBER %/px" position="LEFT/RIGHT"]PARAGRAPH HERE[/column]
	function column($atts, $content = null) {
	extract(shortcode_atts(array( 'width' => '100%', 'position' => 'left' ), $atts));
		return '<div class="bonfire-columns-wrapper" style="width:'.$width.';float:'.$position.';"><div class="bonfire-column"><p>'.do_shortcode($content).'</p></div></div>';}
	add_shortcode('column', 'column');
	
	
	//
	// VIDEO SHORTCODES
	//
	
	//[youtube id="VIDEO ID"]
	function youtube( $atts ){
	extract(shortcode_atts(array('id' => '' ), $atts));
	return '<div class="video-container"><iframe src="http://www.youtube.com/embed/'.$id.'?wmode=transparent" wmode="Opaque"></iframe></div>';}
	add_shortcode( 'youtube', 'youtube' );
	
	//[vimeo id="VIDEO ID"]
	function vimeo( $atts ){
	extract(shortcode_atts(array('id' => '' ), $atts));
	return '<div class="video-container"><iframe src="http://player.vimeo.com/video/'.$id.'"></iframe></div>';}
	add_shortcode( 'vimeo', 'vimeo' );
	
	//[dailymotion id="VIDEO ID"]
	function dailymotion( $atts ){
	extract(shortcode_atts(array('id' => '' ), $atts));
	return '<div class="video-container"><iframe src="http://www.dailymotion.com/embed/video/'.$id.'"></iframe></div>';}
	add_shortcode( 'dailymotion', 'dailymotion' );
	
	//[bliptv id="VIDEO ID"]
	function bliptv( $atts ){
	extract(shortcode_atts(array('id' => '' ), $atts));
	return '<div class="video-container"><iframe src="http://blip.tv/play/'.$id.'.x?p=1"></iframe><embed type="application/x-shockwave-flash" src="http://a.blip.tv/api.swf#'.$id.'" style="display:none"></embed></div>';}
	add_shortcode( 'bliptv', 'bliptv' );

	//[ustream id="VIDEO ID"]
	function ustream( $atts ){
	extract(shortcode_atts(array('id' => '' ), $atts));
	return '<div class="video-container"><iframe width="480" height="302" src="http://www.ustream.tv/embed/'.$id.'?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe></div>';}
	add_shortcode( 'ustream', 'ustream' );
	
	//[ustreamrec id="VIDEO ID"]
	function ustreamrec( $atts ){
	extract(shortcode_atts(array('id' => '' ), $atts));
	return '<div class="video-container"><iframe width="480" height="302" src="http://www.ustream.tv/embed/recorded/'.$id.'?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe></div>';}
	add_shortcode( 'ustreamrec', 'ustreamrec' );
	

	//
	// BUTTONS
	//
	
	//[button link="URL" color="COLOR" corner="NUMBER" textsize="NUMBER"]BUTTON TEXT HERE[/button]
	function button($atts, $content = null) {
	extract(shortcode_atts(array( 'link' => '#', 'color' => '','corner' => '2', 'textsize' => '14' ), $atts));
		return '<a href="'.$link.'"><span class="button'.$color.'" style="border-radius:'.$corner.'px;font-size:'.$textsize.'px;display:inline-block;">'.do_shortcode($content).'</span></a>';}
	add_shortcode('button', 'button');
	
	
	//
	// BOXES
	//
	
	//[box width="NUMBER %/px" height="NUMBER %/px" position="LEFT/RIGHT" corner="NUMBER" color="COLOR" textalign="LEFT/CENTER/RIGHT" textsize="NUMBER"]BOX CONTENT HERE[/box]
	function box($atts, $content = null) {
	extract(shortcode_atts(array( 'width' => '','height' => '','position' => '','corner' => '2','color' => '','textalign' => '','textsize' => '14' ), $atts));
		return '<div class="box'.$color.'" style="width:'.$width.';height:'.$height.';float:'.$position.';border-radius:'.$corner.'px;text-align:'.$textalign.';font-size:'.$textsize.'px;">'.do_shortcode($content).'</div>';}
	add_shortcode('box', 'box');
	
	
	//
	// TOGGLE BOXES
	//
	
	//[boxopen width="NUMBER %/px" position="LEFT/RIGHT" id="NUMBER 1-10" corner="NUMBER" color="COLOR" textalign="LEFT(DEFAULT)/CENTER/RIGHT" textsize="NUMBER" title="TITLE"]BOX CONTENT HERE[/boxopen]
	function boxopen($atts, $content = null) {
	extract(shortcode_atts(array( 'width' => '','position' => '','id' => '','corner' => '2','color' => '','textalign' => '','textsize' => '14','title' => 'Show/hide content' ), $atts));
		return '
		<div class="togglebox'.$color.'" style="max-width:'.$width.';float:'.$position.';border-radius:'.$corner.'px;text-align:'.$textalign.';font-size:'.$textsize.'px;">
			<div class="toggle-hover">
				<div id="toggleopen-button'.$id.'"></div>
				<div id="boxopentoggle'.$id.'">'.$title.'</div>
			</div>
		<div id="boxopen'.$id.'" style="border-radius:'.$corner.'px;">'.do_shortcode($content).'</div>
		</div>
		';}
	add_shortcode('boxopen', 'boxopen');
	
	//[boxclosed width="NUMBER %/px" position="LEFT/RIGHT" id="NUMBER 1-10" corner="NUMBER" color="COLOR" textalign="LEFT(DEFAULT)/CENTER/RIGHT" textsize="NUMBER" title="TITLE"]BOX CONTENT HERE[/boxclosed]
	function boxclosed($atts, $content = null) {
	extract(shortcode_atts(array( 'width' => '','position' => '','id' => '','corner' => '2','color' => '','textalign' => '','textsize' => '14','title' => 'Show/hide content' ), $atts));
		return '
		<div class="togglebox'.$color.'" style="max-width:'.$width.';float:'.$position.';border-radius:'.$corner.'px;text-align:'.$textalign.';font-size:'.$textsize.'px;">
			<div class="toggle-hover">
				<div id="toggleclosed-button'.$id.'"></div>
				<div id="boxclosedtoggle'.$id.'">'.$title.'</div>
			</div>
		<div id="boxclosed'.$id.'" style="border-radius:'.$corner.'px;">'.do_shortcode($content).'</div>
		</div>
		';}
	add_shortcode('boxclosed', 'boxclosed');
	
	
	//
	// ALERTS
	//
	
	//[alert width="NUMBER %/px" position="LEFT/RIGHT" id="NUMBER 1-10" corner="NUMBER" textalign="LEFT/CENTER/RIGHT" textsize="NUMBER" color="COLOR"]BOX CONTENT HERE[/alert]
	function alert($atts, $content = null) {
	extract(shortcode_atts(array( 'width' => '','position' => '','id' => '','corner' => '2','textalign' => '','textsize' => '14','color' => '' ), $atts));
		return '
		<div id="alert'.$id.'" class="alert'.$color.'" style="max-width:'.$width.';float:'.$position.';border-radius:'.$corner.'px;text-align:'.$textalign.';font-size:'.$textsize.'px;">
		<div id="alert-button'.$id.'"></div>
		<div class="alert-inner">'.do_shortcode($content).'</div>
		</div>
		';}
	add_shortcode('alert', 'alert');
	
	
	//
	// NEW LINE
	//
	
	//[newline]
	function newline( $atts ){
	return '<div style="clear:both"></div>';}
	add_shortcode( 'newline', 'newline' );
	
	
	//
	// DIVIDERS
	//
	
	//[minidivider color="COLOR" width="NUMBER %/px"]
	function minidivider( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '45px' ), $atts));
	return '<div style="width:100%;text-align:center;"><hr class="minidivider'.$color.'" style="max-width:'.$width.'"></div>';}
	add_shortcode( 'minidivider', 'minidivider' );
	
	//[shadowup1 color="COLOR" width="NUMBER %/px"]
	function shadowup1( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="shadowup1'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'shadowup1', 'shadowup1' );
	
	//[shadowup2 color="COLOR" width="NUMBER %/px"]
	function shadowup2( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="shadowup2'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'shadowup2', 'shadowup2' );
	
	//[shadowdown1 color="COLOR" width="NUMBER %/px"]
	function shadowdown1( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="shadowdown1'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'shadowdown1', 'shadowdown1' );
	
	//[shadowdown2 color="COLOR" width="NUMBER %/px"]
	function shadowdown2( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="shadowdown2'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'shadowdown2', 'shadowdown2' );
	
	
	
	//[solid1 color="COLOR" width="NUMBER %/px"]
	function solid1( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="solid1'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'solid1', 'solid1' );
	
	//[solid2 color="COLOR" width="NUMBER %/px"]
	function solid2( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="solid2'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'solid2', 'solid2' );
	
	//[solid3 color="COLOR" width="NUMBER %/px"]
	function solid3( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="solid3'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'solid3', 'solid3' );
	
	
	
	//[double1 color="COLOR" width="NUMBER %/px"]
	function double1( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="double1'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'double1', 'double1' );
	
	//[double2 color="COLOR" width="NUMBER %/px"]
	function double2( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="double2'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'double2', 'double2' );
	
	//[double3 color="COLOR" width="NUMBER %/px"]
	function double3( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="double3'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'double3', 'double3' );
	
	//[double4 color="COLOR" width="NUMBER %/px"]
	function double4( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="double4'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'double4', 'double4' );
	
	
	
	//[dotted1 color="COLOR" width="NUMBER %/px"]
	function dotted1( $atts ){
	extract(shortcode_atts(array('color' => '', 'width' => '' ), $atts));
	return '<hr class="dotted1'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dotted1', 'dotted1' );
	
	//[dotted2 color="COLOR" width="NUMBER %/px"]
	function dotted2( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dotted2'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dotted2', 'dotted2' );
	
	//[dotted3 color="COLOR" width="NUMBER %/px"]
	function dotted3( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dotted3'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dotted3', 'dotted3' );
	
	//[dotted4 color="COLOR" width="NUMBER %/px"]
	function dotted4( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dotted4'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dotted4', 'dotted4' );

	//[dotted5 color="COLOR" width="NUMBER %/px"]
	function dotted5( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dotted5'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dotted5', 'dotted5' );


	
	//[dashed1 color="COLOR" width="NUMBER %/px"]
	function dashed1( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dashed1'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dashed1', 'dashed1' );

	//[dashed2 color="COLOR" width="NUMBER %/px"]
	function dashed2( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dashed2'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dashed2', 'dashed2' );
	
	//[dashed3 color="COLOR" width="NUMBER %/px"]
	function dashed3( $atts ){
	extract(shortcode_atts(array( 'color' => '', 'width' => '' ), $atts));
	return '<hr class="dashed3'.$color.'" style="max-width:'.$width.'">';}
	add_shortcode( 'dashed3', 'dashed3' );


?>