
<?php 
	$nonprofit_footer_style = nonprofit_get_option('nonprofit_footer_style');
	if ($nonprofit_footer_style != 'none') {
		get_template_part('parts/footer/footer', nonprofit_get_option( 'nonprofit_footer_style', $nonprofit_footer_style ));
	}

?>


<?php wp_footer() ?>
</body>
</html>
