<?php
/*
*  Template Name: My Event
* https://events.eu.ngrok.io/attach-event-with-user/?id=109037&token=aad3726317e0f1a92ee66c0c48cadee3b79401ad
*/
global $wpdb, $wp, $wp_query;

// If not connected exit
if (! is_user_logged_in()) {
  exit(0);
}

$args = array(
  'post_type' => 'tc_events',
  'post_status' => ['publish', 'private'],
  'posts_per_page' => 5,
  'author' => get_current_user_id()
);

if ( isset($_GET['token']) ) {
  $event = get_page_by_path( sanitize_text_field( $_GET['token'] ), 'OBJECT' , 'tc_events' );

  if (is_null($event) || !isset($event->ID)) {
    return;
  }
  wp_publish_post($event->ID);
  update_post_meta( $event->ID, 'show_tickets_automatically', '1');
}

get_header();
// with sidebar
if ( ot_get_option( 'uni_single_post_with_sidebar' ) == 'on' ) {
?>
<section class="uni-container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('singlePageContent') ?>>

    <div class="wrapper">
      <div class="singleMeta">
        <?php the_title( '<h1>', '</h1>' ); ?>
      </div>
      <div class="singlePostWrap">
        <?php the_content(); ?>
        <?php ob_start(); ?>

          <?php foreach (get_posts( $args ) as $event) {
              $meta_values = get_post_meta( $event->ID );
          ?>

              [su_animate type="bounceIn" duration="1" delay="0" inline="no" class=""]
                  [su_box title="<?php echo strtoupper(esc_html__( $event->post_status, 'coworking' )) ?>" style="default" box_color="<?php echo ($event->post_status == 'private') ? '#b40404' : '#333333' ?>" title_color="#FFFFFF" radius="3" class=""]


                      [su_row class=""]
                          [su_column size="1/1" center="no" class=""]
                              <?php if (is_user_logged_in() && 'publish' != $event->post_status && get_current_user_id() === (int) $event->post_author) : ?>
                                <div class="wrap_btn_publish ">
                                  [su_tooltip style="yellow" position="top" shadow="no" rounded="no" size="default" title="" content="Tooltip text" behavior="hover" close="no" class=""]Click me to begin share this event
                                    <a class="book_now_btn" href="<?php echo get_permalink() . '?token=' . $event->post_name . '&publish=true'; ?>"><?php esc_html_e("Publish this event", "coworking") ?></a>
                                  [/su_tooltip]
                                </div>
                              <?php endif; ?>

                              <?php /* if ('publish' == $event->post_status) : ?>
                                <div class="wrap_btn_team ">
                                   <a class="book_now_btn" href="<?php echo get_permalink() . '?token=' . $event->post_name . '&publish=false'; ?>"><?php esc_html_e("Unpublish this event", "coworking") ?></a>
                                </div>
                              <?php endif;*/ ?>
                          [/su_column]
                      [/su_row]

                      [su_spacer size="20" class=""]

                      [su_label type="default" class=""]
                          <?php echo strtoupper(esc_html__( $event->post_status, 'coworking' )) ?>
                      [/su_label]

                      [su_label type="default" class=""]
                          <?php echo strtoupper(esc_html__( $event->category_sport, 'coworking' )) ?>
                      [/su_label]

                      [su_label type="info" class=""]
                          <?php echo strtoupper(esc_html__( $event->event_location, 'coworking' )) ?>
                      [/su_label]

                      [su_row class=""]
                          [su_column size="1/1" center="no" class=""]
                              <h5><?php echo $event->post_title ?></h5>
                              <?php if($event->post_status == 'publish'): ?>
                                <a href="<?php echo home_url( 'tc_events/' . $event->post_name ); ?>"><?php echo $event->post_title; ?></a>
                              <?php endif; ?>
                          [/su_column]
                      [/su_row]



                      [su_divider top="yes" text="Go to top" style="default" divider_color="#999999" link_color="#999999" size="3" margin="35" class=""]

                      [su_row class=""]
                        [su_column size="1/2" center="no" class=""]
                            [su_service title="<?php echo esc_html__( 'Quantity available', 'coworking' ) ?>" icon="icon: star" icon_color="#333333" size="32" class=""]
                                <div class="planPrice" style="line-height: 70px">
                                  <strong>X</strong>/<?php echo array_shift($meta_values['quantity_available']) ?>
                                </div>
                            [/su_service]
                        [/su_column]
                        [su_column size="1/2" center="no" class=""]
                            [su_service title="<?php echo esc_html__( 'Price per ticket', 'coworking' ) ?>" icon="icon: credit-card" icon_color="#333333" size="32" class=""]
                                <div class="planPrice" style="line-height: 70px">
                                  <small>€</small>
                                  <strong><?php echo array_shift($meta_values['price_per_ticket']) ?></strong>/<?php echo esc_html__( 'by ticket', 'coworking' ) ?>
                                </div>
                            [/su_service]
                        [/su_column]
                      [/su_row]

                      [su_row class=""]
                        [su_column size="1/2" center="no" class=""]
                            [su_service title="<?php echo esc_html__( 'Event date time', 'coworking' ) ?>" icon="icon: calendar" icon_color="#333333" size="32" class=""]
                                <div class="singleMeta" style="text-align:left">
                                    <time datetime="2016-02-08" style="margin-bottom:0"><?php echo (new DateTime(array_shift($meta_values['event_date_time'])))->format('F d, Y') ?></time><br />
                                    <time datetime="2016-02-08" style="margin-bottom:0"><?php echo (new DateTime(array_shift($meta_values['event_end_date_time'])))->format('F d, Y') ?></time>
                                    <p style="font-size:18px; color: #333333">4:00 pm – 6:00 pm</p>
                                </div>
                            [/su_service]
                        [/su_column]
                        [su_column size="1/2" center="no" class=""]
                          <?php if($event->post_status == 'publish'): ?>
                            [su_qrcode data="<?php echo home_url( 'tc_events/' . $event->post_name ); ?>" title="" size="200" margin="0" align="center" link="" target="blank" color="#000000" background="#ffffff" class=""]
                          <?php endif; ?>
                        [/su_column]
                      [/su_row]


                      [su_row class=""]
                          [su_column size="1/1" center="no" class=""]
                              [su_gmap width="100%" height="400" responsive="yes" address="<?php echo array_shift($meta_values['event_address']) ?>" zoom="0" title="" class=""]
                          [/su_column]
                      [/su_row]

                  [/su_box]
              [/su_animate]

          <?php } ?>

        <?php $output = ob_get_clean(); ?>
        <?php echo do_shortcode($output); ?>

      </div>
    </div>


  </div>
<?php endwhile; endif; ?>

</section>

<?php
}
get_footer(); ?>
