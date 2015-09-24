<footer>

	<?php // Footer links
		get_template_part('views/footer/footer-links');
	?>

	<div class="container">
		<div class="row search-form-wrapper">
			<div class="col-sm-4 col-sm-push-4">
				<?php //Search form
					get_search_form();
				?>
			</div>
		</div>
	</div>

	<div class="copyrights">&copy; 1996 <?php bloginfo('name'); ?></div>

	<?php /*
	<div class="monitoring">
		<?php echo get_num_queries() . ' queries in ' . timer_stop(0) . ' seconds. '; ?>
	</div>
	*/ ?>

</footer>