<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="content" class="list-post">

		<?php // get loop.php ?>

<div class="wrapper-outer">
<!-- BEGIN LOOP + SEPARATOR -->
<?php get_template_part( 'includes/loop-single'); ?>
<!-- END LOOP + SEPARATOR -->

<!-- BEGIN COMMENTS -->
<?php comments_template(); ?>
<!-- END COMMENTS -->
</div>

	<!-- BEGIN AUTO-EXPAND TEXTAREA -->
	<script>
	jQuery(document).ready(function() {
		'use strict';
			jQuery( "textarea" ).autogrow();
	});
	</script>
	<!-- END AUTO-EXPAND TEXTAREA -->

	</div>
	<!-- /#content -->
	
</div>

<?php endwhile; ?>
<?php get_footer(); ?>