<?php
// styles of child theme
function uni_coworking_theme_child_styles() {

    wp_enqueue_style( 'font-awesome-min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    $ot_set_google_fonts  = get_theme_mod( 'ot_set_google_fonts', array() );

    if ( !ot_get_option('uni_google_fonts') || empty($ot_set_google_fonts) ) {
        wp_enqueue_style( 'uni-coworking-theme-fonts', uni_coworking_theme_fonts_url(), array(), '1.1.5' );
    }

    wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/bxslider.css', array(), '4.2.3' );

    wp_enqueue_style( 'remodal', get_template_directory_uri() . '/css/remodal.css', array(), '1.0.5' );

    wp_enqueue_style( 'remodal-default-theme', get_template_directory_uri() . '/css/remodal-default-theme.css', array(), '1.0.5' );

    wp_enqueue_style( 'ball-clip-rotate', get_template_directory_uri() . '/css/ball-clip-rotate.css', array(), '0.1.0' );

    wp_enqueue_style( 'uni-coworking-theme-styles', get_template_directory_uri() . '/style.css', array('bxslider', 'remodal',
    'remodal-default-theme', 'ball-clip-rotate'), '1.1.5', 'all' );

    wp_enqueue_style( 'uni-coworking-theme-adaptive', get_template_directory_uri() . '/css/adaptive.css', array('uni-coworking-theme-styles'), '1.1.5', 'screen' );

    wp_enqueue_style( 'uni-coworking-theme-child-styles', get_stylesheet_directory_uri() . '/style.css', array( 'uni-coworking-theme-styles' ), '1.1.5', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'uni_coworking_theme_child_styles' );

// after setup of the child theme
add_action( 'after_setup_theme', 'uni_coworking_theme_child_setup' );
function uni_coworking_theme_child_setup() {

    // Enable featured image
    add_theme_support( 'post-thumbnails');

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Add html5 suppost for search form and comments list
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    // translation files for the child theme
    load_child_theme_textdomain( 'coworking-child', get_stylesheet_directory() . '/languages' );
}

// add the new role in the child theme
add_action('after_switch_theme', 'uni_coworking_theme_child_activation_func', 10);
function uni_coworking_theme_child_activation_func() {
}

// remove the new role on theme deactivation
add_action('switch_theme', 'uni_coworking_theme_child_deactivation_func');
function uni_coworking_theme_child_deactivation_func() {
}

function uni_coworking_theme_child_extend_event_meta_box ( $event_meta_box ){
    $category = array(
      'label'       => esc_html__( 'Event category', 'coworking' ),
      'id'          => 'uni_event_category',
      'type'        => 'text',
      'desc'        => esc_html__( 'Please add event category', 'coworking' )
    );
    $link = array(
      'label'       => esc_html__( 'Link to the event page', 'coworking' ),
      'id'          => 'uni_event_link',
      'type'        => 'text',
      'desc'        => esc_html__( 'Please insert link to the event page', 'coworking' )
    );

    array_unshift( $event_meta_box['fields'], $category );
    array_unshift( $event_meta_box['fields'], $link );

	return $event_meta_box;
}
add_filter('unitheme_event_meta_box_array', 'uni_coworking_theme_child_extend_event_meta_box');

function uni_coworking_theme_child_extend_events_meta_box ( $events_meta_box ){
    $category = array(
      'label'       => esc_html__( 'Events category', 'coworking' ),
      'id'          => 'uni_events_category',
      'type'        => 'text',
      'desc'        => esc_html__( 'Please add events category slug name', 'coworking' )
    );

    array_push( $events_meta_box['fields'], $category );

	return $events_meta_box;
}
add_filter('unitheme_events_meta_box_array', 'uni_coworking_theme_child_extend_events_meta_box');

/*
// email templates filter
add_filter( 'uni_coworking_theme_event_email_filter', 'uni_coworking_theme_child_email_templates', 10, 2 );
function uni_coworking_theme_child_email_templates( $sTemplateName, $sState ) {
    if ( $sState == 'guest' ) {
        return '/email/event-custom-guest.php';
    } else if ( $sState == 'admin' ) {
        return '/email/event-custom-admin.php';
    }
}

// switch the subscription email to 'html'
add_filter( 'uni_coworking_theme_mailchimp_variables_filter', 'uni_coworking_theme_mailchimp_variables_func', 10, 1 );
function uni_coworking_theme_mailchimp_variables_func( $aListOfMCVars ) {
    $aListOfMCVars['email_type'] = 'html';
    return $aListOfMCVars;
}
*/


///////////////////////////////////////
// Workflow Create Event - Redirect pages
///////////////////////////////////////
/**
* Add read_private_posts capability to subscriber
* Note this is saves capability to the database on admin_init, so consider doing this once on theme/plugin activation
*/
// function redirect_private_content() {
// 	global $wp_query, $wpdb, $wp;
// 	if ( is_404() ) {
//     // create a ticket event (tickera) & Add post meta data
//     // create a ticket type event & Add post meta data
//     // add slug
//
//
//     echo "test";
//     exit();
// 	}
// }
// add_action( 'template_redirect', 'redirect_private_content', 9 );


/**
 * This will fire at the very end of a (successful) form entry.
 *
 * @link https://wpforms.com/developers/wpforms_process_complete/
 *
 * @param array  $fields    Sanitized entry field values/properties.
 * @param array  $entry     Original $_POST global.
 * @param array  $form_data Form data and settings.
 * @param int    $entry_id  Entry ID. Will return 0 if entry storage is disabled or using WPForms Lite.
 */
function wpf_dev_process_complete( $fields, $entry, $form_data, $entry_id ) {

    // Optional, you can limit to specific forms. Below, we restrict output to
    // form #5.
    if ( absint( $form_data['id'] ) !== 282 ) {
        return;
    }

    // Get the full entry object
    $entry = wpforms()->entry->get( $entry_id );
    $event_id = $entry->post_id;

    // Update post name (slug)
    $post_data = array(
        'ID'              => $event_id,
        'post_name'       => strtoupper(sha1(mt_rand(1, 90000) . 'SALT')),
        'comment_status'  => 'open'
    );
    wp_update_post( $post_data );

    // Fields are in JSON, so we decode to an array
    $entry_fields = json_decode( $entry->fields, true );

    // Categories
    // if($entry_fields[33]['value'] === 'Yes') {
    //     // Set the hidden field to 'Needs Callback' to filter through entries
    //     $entry_fields[7]['value'] = 'Needs Callback';
    // }

    if( isset($entry_fields[15]['value'])) {
        // Event Date time
        update_post_meta( $event_id, 'event_date_time', date_format((new DateTime())->setTimestamp( $entry_fields[15]['unix'] ), 'Y-m-d H:i:s') );
    }
    if( isset($entry_fields[16]['value'])) {
        // Event End time
        update_post_meta( $event_id, 'event_end_date_time', date_format((new DateTime())->setTimestamp( $entry_fields[16]['unix'] ), 'Y-m-d H:i:s') );
    }
    if( isset($entry_fields[27]['value'])) {
        // Event Location
        update_post_meta( $event_id, 'event_location', $entry_fields[27]['city'] . ", " . $entry_fields[27]['postal'] );
    }

    // Add to configuration
    update_post_meta( $event_id, 'event_presentation_page', $event_id);
    update_post_meta( $event_id, 'show_tickets_automatically', '1');
    update_post_meta( $event_id, 'event_terms', '');
    update_post_meta( $event_id, 'hide_event_after_expiration', '0');
    update_post_meta( $event_id, 'search_uniq_id', uniqid());

    //
    // Create Ticket
    //
    $post_data = array();
    $wp_error = false;

    // Type de billet
    $post_data['post_title'] = 'Standard';
    $post_data['post_status'] = 'publish';
    $post_data['post_type'] = 'tc_tickets';
    $post_data['post_name'] = 'standard';

    // Insert post
    $ticket_id = wp_insert_post( $post_data, $wp_error );

    if ( ! is_wp_error( $ticket_id ) && is_numeric( $ticket_id ) ) {
      if( isset($entry_fields[26]['value'])) {
          // Price per tiket
          update_post_meta( $ticket_id, 'price_per_ticket', $entry_fields[26]['value']);
      }
      if( isset($entry_fields[25]['value'])) {
          // Quantity available
          update_post_meta( $ticket_id, 'quantity_available', $entry_fields[25]['value']);
      }
      // Add to configuration
      update_post_meta( $ticket_id, 'event_name', $event_id);
      update_post_meta( $ticket_id, 'event_presentation_page', $event_id);
      update_post_meta( $ticket_id, 'ticket_template', '8');
      update_post_meta( $ticket_id, 'min_tickets_per_order', '1');
      update_post_meta( $ticket_id, 'max_tickets_per_order', '10');
      update_post_meta( $ticket_id, 'available_checkins_per_ticket', '');
      update_post_meta( $ticket_id, 'ticket_fee', '');
      update_post_meta( $ticket_id, 'ticket_fee_type', 'fixed');
      update_post_meta( $ticket_id, '_ticket_availability', 'open_ended');
      update_post_meta( $ticket_id, '_ticket_checkin_availability', 'open_ended');
    }

    $event_post = get_post($event_id);

    if( !is_null($event_post) && 'private' == $event_post->post_status ) {
      // wp_redirect( wp_login_url( home_url( 'tc-events/' . $event_post->post_name ) ) );
      // https://events.eu.ngrok.io/attach-event-with-user/?id=109037&token=aad3726317e0f1a92ee66c0c48cadee3b79401ad
      wp_redirect( wp_login_url( home_url( 'attach-event-with-user/?token=' . $event_post->post_name ) ) );

			exit;
		}
}
add_action( 'wpforms_process_complete', 'wpf_dev_process_complete', 10, 4 );

//
// ///////////////////////////////////////
// // Workflow redirect pages
// ///////////////////////////////////////
// /**
// * Add read_private_posts capability to subscriber
// * Note this is saves capability to the database on admin_init, so consider doing this once on theme/plugin activation
// */
// function redirect_private_content() {
// 	global $wp_query, $wpdb, $wp;
// 	if ( is_404() ) {
//     $find_post = new WP_Query([ 'post_type' => 'event', 'post_status' => 'private', 'guid' => home_url('event/' . $wp_query->query_vars['name']) ]);
// 		$post = $find_post->posts[0];
//
// 		if( 'private' == $post->post_status ) {
// 			wp_redirect( wp_login_url( home_url( 'event/' . $post->post_name ) ) );
// 			// wp_redirect( wp_login_url( home_url(add_query_arg(array($_GET), $wp->request)) ) );
// 			exit;
// 		}
// 	}
// }
// add_action( 'template_redirect', 'redirect_private_content', 9 );
