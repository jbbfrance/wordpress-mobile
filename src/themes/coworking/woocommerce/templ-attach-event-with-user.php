<?php
/*
*  Template Name: Attach Event With User
* https://events.eu.ngrok.io/attach-event-with-user/?id=109037&token=aad3726317e0f1a92ee66c0c48cadee3b79401ad
*/
global $wp_query, $wpdb, $wp;

// If not connected exit
if (! is_user_logged_in()) {
  exit(0);
}

if ( isset($_GET['token']) ) {

  $table_name = $wpdb->prefix . 'posts';

  $event = get_page_by_path( sanitize_text_field( $_GET['token'] ), 'OBJECT' , 'tc_events' );

  if(is_null($event) || !isset($event->ID)) {
    return;
  }

  $arg = array(
      'ID' => $event->ID,
      'post_author' => get_current_user_id(),
  );
  wp_update_post( $arg );

  // Redirect to my-account
  wp_redirect(  home_url( 'my-events' ) );

}

exit(0);
?>
