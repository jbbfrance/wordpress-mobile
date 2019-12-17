<?php get_header(); ?>		

<div id="content" class="clearfix">
	
	<?php // the loop ?>
	<?php if (have_posts()) : ?>

		<?php if ( is_day() ) : ?>
			<div class="showing">
				<?php _e( 'Daily:', 'bonfire' ); ?> <span><?php printf( get_the_date() ); ?></span>
			</div>

		<?php elseif ( is_month() ) : ?>
			<div class="showing">
				<?php _e( 'Monthly:', 'bonfire' ); ?> <span><?php printf( get_the_date( _x( 'F Y', 'monthly archives format', 'bonfire' ) ) ); ?></span>
			</div>

		<?php elseif ( is_year() ) : ?>
			<div class="showing">
				<?php _e( 'Yearly:', 'bonfire' ); ?> <span><?php printf( get_the_date( _x( 'Y', 'yearly archives format', 'bonfire' ) ) ); ?></span>
			</div>

		<?php else : ?>
			<?php ( 'Blog archives' ); ?>
		<?php endif; ?>
	
	<div class="wrapper-outer">
	
	<?php while (have_posts()) : the_post(); ?>

	<!-- BEGIN LOOP -->
	<?php get_template_part( 'includes/loop'); ?>
	<!-- END LOOP -->
	
	<?php endwhile; ?>
	
	<!-- BEGIN INCLUDE PAGINATION -->
	<div id="footer">
		<?php get_template_part('includes/pagination'); ?>
	</div>
	<!-- END INCLUDE PAGINATION -->
	
	<?php endif; ?>			

	</div>
	<!-- /.wrapper-outer -->
	
</div>
<!-- /#content -->

<?php get_footer(); ?>