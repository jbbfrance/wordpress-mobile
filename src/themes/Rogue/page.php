<?php get_header(); ?>

<div id="content" class="clearfix">
	<div class="wrapper-outer">

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

			<div class="page-wrapper">

				<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- BEGIN PAGE TITLE -->
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<!-- END PAGE TITLE -->
				
				<!-- BEGIN PAGE CONTENT -->
				<div class="entry-content"><?php the_content(); ?></div>
				<!-- END PAGE CONTENT -->
				
				<!-- BEGIN POST NAVIGATION -->
				<div class="link-pages">
				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'bonfire').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<!-- END POST NAVIGATION -->
				
				<!-- BEGIN EDIT POST LINK -->
				<?php edit_post_link(__('EDIT', 'bonfire')); ?>
				<!-- END EDIT POST LINK -->
		
				<?php endwhile; ?>

			</div>
			<!-- /.page-wrapper -->

	</div>
	<!-- /.wrapper-outer -->
</div>
<!-- /#content -->

<?php get_footer(); ?>