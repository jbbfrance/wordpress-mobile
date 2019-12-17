<?php if(!is_single()) : global $more; $more = 0; endif; //enable more link ?>

<!-- BEGIN FEATURED IMAGE -->
<div class="featured-image">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail(); ?>
	</a>
</div>
<!-- END FEATURED IMAGE -->

<!-- BEGIN CUSTOM FIELD FOR EMBEDDABLE CONTENT -->
<?php $featuredembed = get_post_meta($post->ID, 'FeaturedEmbed', true); ?>
<div class="video-container"><?php echo $featuredembed; ?></div>
<!-- END CUSTOM FIELD FOR EMBEDDABLE CONTENT -->

<!-- BEGIN SHORTCODE OUTSIDE THE LOOP -->
<div class="post-shortcode">
	<?php $shortcode = get_post_meta($post->ID, 'Shortcode', true); ?><?php echo do_shortcode($shortcode); ?>
</div>
<!-- END SHORTCODE OUTSIDE THE LOOP -->

<div class="content-wrapper-rogue">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- BEGIN POST DATE + COMMENT COUNT -->
		<div class="post-date-comment">
			<time datetime="<?php echo esc_attr( the_time('o-m-d') ); ?>"><?php the_time('F j, Y') ?></time>
			<?php if ( comments_open() ) { ?>
			/
			<div class="comment-count">
				<a href="<?php the_permalink(); ?>#comments">
					<?php comments_number( 'Leave comment', 'One comment', '% comments' ); ?>
				</a>
			</div>
			<?php } else { ?>
			<?php } ?>
		</div>
		<!-- END POST DATE + COMMENT COUNT -->

		<!-- BEGIN TITLE -->
		<h1 class="entry-title">
			<!-- BEGIN IF IS STICKY -->
			<span class="sticky">
				<?php if (is_sticky()) { ?><?php _e( 'Sticky post', 'bonfire' ); ?><?php } ?>
			</span>
			<!-- END IF IS STICKY -->
		
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bonfire' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>
		<!-- END TITLE -->

		<!-- BEGIN CONTENT -->
		<div class="entry-content">
			<?php if( get_option('bonfire_rogue_show_excerpt') ) { ?>
				<?php the_excerpt(); ?>
			<?php } else { ?>
				<?php the_content(''); ?>
			<?php } ?>
		</div>
		<!-- END CONTENT -->

		<!-- BEGIN EDIT POST LINK -->
		<?php edit_post_link(__('EDIT', 'bonfire')); ?>
		<!-- END EDIT POST LINK -->

		<!-- BEGIN 'READ FULL POST' BUTTON -->
		<div class="more-button">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bonfire' ), the_title_attribute( 'echo=0' ) ) ); ?>">
				<?php _e( 'FULL POST & COMMENT', 'bonfire' ); ?>
			</a>
		</div>
		<!-- END 'READ FULL POST' BUTTON -->
	
	</article>
		
</div>
<!-- /.post -->