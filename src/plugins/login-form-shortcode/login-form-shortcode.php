<?php
//

/*
Plugin Name: Shortcodes, Login form
Plugin URI: https://pippinsplugins.com/wordpress-login-form-short-code/
Description: A wide collection of shortcodes.
Version: 1.0
License: GPL2
*/
	//
	// BUILD THE 'CHEAT SHEET' META BOX
	//

	add_action( 'add_meta_boxes', 'login_form_shortcodes_cheat_sheet' );

	function login_form_shortcodes_cheat_sheet() {
		$pageType = array( 'post', 'page' );
		foreach ($screens as $screen) {
			add_meta_box(
				'login_form_shortcodes_sectionid',
				__( 'Login form Shortcodes Cheat Sheet', 'login_form' ),
				'login_form_shortcodes_custom_box',
				$pageType
			);
		}
	}

	/* Add box content */
	function login_form_shortcodes_custom_box( $post ) {
	?>

	<p><strong>Color options for all shortcodes:</strong> silver, green, blue, salmon, red, orange, pink
	<br>
	<br>
	<strong>LOGIN FORM</strong><br>
	<code>[loginform redirect="http://my-redirect-url.com"]</code>
	<br>
	<br>

	<?php
	}


	//
	// LOGIN FORM
	//

  // [loginform redirect="http://my-redirect-url.com"]
  function loginform( $atts, $content = null ) {
  	extract( shortcode_atts( array('redirect' => ''), $atts ) );

  	if (!is_user_logged_in()) {
  		if($redirect) {
  			$redirect_url = $redirect;
  		} else {
  			$redirect_url = get_permalink();
  		}
  		$form = wp_login_form(array('echo' => false, 'redirect' => $redirect_url ));
  	}
  	return $form;
  }
  add_shortcode('loginform', 'loginform');


?>
