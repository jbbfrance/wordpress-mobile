<?php if(!is_single()) : global $more; $more = 0; endif; //enable more link ?>

<?php
  // Create object post content from the_content()
  global $wpdb, $wp, $wp_query;

  $token = $wp_query->query_vars['name'];
  $post_content = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . 'events_form' . " WHERE token = '" . $token . "'");

  if( ! $post_content ) {
    WPWHPRO()->webhook->echo_response_data( "Error post not found!" );
    die();
  }

  // publish current post
  if ( $_GET['active'] && is_user_logged_in() && get_current_user_id() === (int) $post_content->user_id ) {
    // update post
      do_action( 'private_to_publish', $array );
      wp_update_post( array( 'name' => $token, 'post_status' => 'publish' ) );
  }
?>

<!-- BEGIN FEATURED IMAGE -->
<div class="featured-image">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail(); ?>
	</a>
</div>
<!-- END FEATURED IMAGE -->

<!-- BEGIN CUSTOM FIELD FOR EMBEDDABLE CONTENT -->
<?php $featuredembed = get_post_meta($post->ID, 'FeaturedEmbed', true); ?>
<div class="video-container"><iframe src="https://www.google.com/maps?q=<?php echo $featuredembed; ?>&output=embed"></iframe></div>

<!-- END CUSTOM FIELD FOR EMBEDDABLE CONTENT -->

<!-- BEGIN SHORTCODE OUTSIDE THE LOOP -->
<?php if (is_user_logged_in() && 'publish' != get_post()->post_status && get_current_user_id() === (int) $post_content->user_id) : ?>
  <div class="post-shortcode">
    <?php echo do_shortcode('[button link="' . get_permalink() . '?active=true" color="blue" corner="5" textsize="12"]ACTIVE[/button]'); ?>
  </div>
<?php endif; ?>

<?php if ('publish' == get_post()->post_status) : ?>
  <div class="post-shortcode">
  	<?php echo do_shortcode('[button link="' . get_permalink(get_page_by_path('new-team')) . '?tournament=' . $token . '" color="green" corner="5" textsize="12"]CREATE A TEAM[/button]'); ?>
  </div>
<?php endif; ?>

<!-- END SHORTCODE OUTSIDE THE LOOP -->

<div class="content-wrapper-rogue">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- BEGIN POST DATE + COMMENT COUNT -->
		<div class="post-date-comment">
			<time datetime="<?php echo esc_attr( the_time('o-m-d') ); ?>"><?php the_time('F j, Y') ?></time>
			<?php if ( comments_open() ) { ?>
				/
				<div class="comment-count">
					<?php comments_number( 'Leave comment', 'One comment', '% comments' ); ?>
				</div>
			<?php } else { ?>
			<?php } ?>
		</div>
		<!-- END POST DATE + COMMENT COUNT -->

		<!-- BEGIN TITLE -->
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bonfire' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>
		<!-- END TITLE -->

		<!-- BEGIN CONTENT -->
		<div class="entry-content">
      <!-- <?php /*the_content( __( 'Continues..', 'bonfire' ) );*/ ?> -->
      <p><?php echo __( 'Here you can embed the appropriate map like seen above, or anything else you’d like, along with entering any other contact details you’d like. Perhaps simply like this:', 'bonfire' ) ?></p>
      <p>
        <?php echo __( 'Full Name', 'bonfire' ) ?> :<?php echo $post_content->fullName ?><br />
        <?php echo __( 'First Name', 'bonfire' ) ?> :<?php echo $post_content->firstName ?><br />
        <?php echo __( 'Last Name', 'bonfire' ) ?> :<?php echo $post_content->lastName ?><br />
        <?php echo __( 'Employee Job Level', 'bonfire' ) ?> :<?php echo $post_content->employeeJobLevel ?><br />
        <?php echo __( 'Employee Job Title', 'bonfire' ) ?> :<?php echo $post_content->employeeJobTitle ?><br />
        <?php echo __( 'Employee DepartmentWork', 'bonfire' ) ?> :<?php echo $post_content->employeeDepartmentWork ?><br />
        <?php echo __( 'Quality Of Work', 'bonfire' ) ?> :<?php echo $post_content->qualityOfWork ?><br />
        <?php echo __( 'Job Knowledge', 'bonfire' ) ?> :<?php echo $post_content->jobKnowledge ?><br />
        <?php echo __( 'Communication Skills', 'bonfire' ) ?> :<?php echo $post_content->communicationSkills ?>
      </p>

      <p><?php echo __( 'Send a message', 'bonfire' ) ?></p>
      <p><?php echo __( 'The contact form page template also comes with a beautiful and simple contact form, complete with validation:', 'bonfire' ) ?></p>
		</div>
		<!-- END CONTENT -->

		<!-- BEGIN POST NAVIGATION -->
		<div class="link-pages">
			<?php wp_link_pages(array(''.__('Pages:', 'bonfire').' ', 'next_or_number' => 'number')); ?>
		</div>
		<!-- END POST NAVIGATION -->

		<!-- BEGIN POST TAGS -->
		<div class="post-tag">
			<?php the_tags(''.__('Tags: ', 'bonfire').'',', '); ?>
		</div>
		<!-- END POST TAGS -->

		<!-- BEGIN SHARE BUTTON -->
		<div class="share-wrapper">

			<!-- BEGIN SHARE BUTTON LINKS -->
			<div class="share-links-wrapper">
				<div class="share-links-tooltip"></div>
					<a target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">
						<?php _e( 'TWITTER', 'bonfire' ); ?>
					</a>
					<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>">
						<?php _e( 'FACEBOOK', 'bonfire' ); ?>
					</a>
					<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
						<?php _e( 'GOOGLE PLUS', 'bonfire' ); ?>
					</a>
					<a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>">
						<?php _e( 'E-MAIL', 'bonfire' ); ?>
					</a>
			</div>
			<!-- END FEATURED STORY LINKS -->

			<div class="share-button-text-wrapper">
			<!-- BEGIN SHARE ICON -->
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
			<path id="share-2-icon" d="M230.178,107.52c0,31.488-25.526,57.015-57.019,57.015c-31.482,0-57.009-25.526-57.009-57.015
				c0-31.491,25.526-57.018,57.009-57.018C204.651,50.502,230.178,76.028,230.178,107.52z M173.164,347.462
				c-31.493,0-57.019,25.534-57.019,57.019c0,31.492,25.525,57.018,57.019,57.018c31.492,0,57.019-25.525,57.019-57.018
				C230.183,372.996,204.656,347.462,173.164,347.462z M260.129,110.277c45.523,4.372,85.009,29.728,108.64,66.257
				c17.059-7.84,35.991-9.792,53.821-6.112c-31.763-65.529-98.955-110.823-176.531-110.823c-0.101,0-0.201,0.004-0.302,0.004
				C255.449,74.236,260.703,91.702,260.129,110.277z M122.652,333.664c-30.088-47.424-30.214-108.003-0.304-155.554
				c-14.402-10.396-25.509-25.085-31.429-42.177c-54.611,70.611-54.564,169.077,0.169,239.641
				C97.094,358.571,108.238,343.975,122.652,333.664z M368.771,334.752c-23.636,36.538-63.13,61.896-108.664,66.263
				c0.718,18.387-4.28,35.872-13.879,50.675c77.506-0.066,144.625-45.342,176.364-110.826
				C404.808,344.532,385.88,342.615,368.771,334.752z M404.982,198.63c-31.483,0-57.01,25.525-57.01,57.014
				c0,31.487,25.526,57.013,57.01,57.013c31.491,0,57.018-25.525,57.018-57.013C462,224.155,436.474,198.63,404.982,198.63z"/>
			</svg>
			<!-- END SHARE ICON -->
			<!-- BEGIN SHARE TEXT -->
			<div class="share-text">
				<?php _e( 'SHARE', 'bonfire' ); ?>
			</div>
			<!-- END SHARE TEXT -->
			</div>
		</div>
		<!-- END SHARE BUTTON -->

		<!-- BEGIN EDIT POST LINK -->
		<?php edit_post_link(__('EDIT', 'bonfire')); ?>
		<!-- END EDIT POST LINK -->

	</article>

</div>
<!-- /.post -->
