<section class="wd-footer">
	<div class="row">

		<ul class="block large-<?php echo esc_attr($column_one) ?> medium-<?php echo esc_attr($column_one) ?> columns" >
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?><?php endif; ?>
		</ul>

		<?php if($nonprofit_footer_columns == 'tow_a_columns' || $nonprofit_footer_columns == 'tow_b_columns' || $nonprofit_footer_columns == 'tow_c_columns' || $nonprofit_footer_columns == 'three_columns' || $nonprofit_footer_columns == 'four_columns') {  ?>
			<ul class="block large-<?php echo esc_attr($column_tow) ?> medium-<?php echo esc_attr($column_tow) ?> columns" >
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?><?php endif; ?>
			</ul>
		<?php }  ?>

		<?php if( $nonprofit_footer_columns == 'three_columns'  || $nonprofit_footer_columns == 'four_columns' ) {
			?>
			<ul class="block large-<?php echo esc_attr($column_three) ?> medium-<?php echo esc_attr($column_three) ?> columns" >
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-3') ) : ?><?php endif; ?>
			</ul>
		<?php }  ?>
		<?php if( $nonprofit_footer_columns == 'four_columns' ) {
			?>
			<ul class="block large-<?php echo esc_attr($column_four) ?> medium-<?php echo esc_attr($column_four) ?> columns" >
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-4') ) : ?><?php endif; ?>
			</ul>
		<?php }  ?>

	</div>
</section>
<!--/.footer-columns-->

<!--.l-footer-->
<footer class="wd-copyright">
	<div class="row flex-container">
		<div>
			<img src="<?php echo get_stylesheet_directory_uri() ?>/img/unitedway.png" alt="">
		</div>
		<div class="footer-nav-bottom">
			<div class="large-12 columns">
				<?php wp_nav_menu( array('theme_location' => 'footer',
				                         'container_class' => 'copyright-menu',
				                         'fallback_cb' => 'nonprofit_main_menu_fallback' )) ?>

			</div>
			<div class="copyright large-12 columns">
				<p>
					Copyright © <?php echo date("Y"); ?> The Redwood. All rights reserved. Made with love by <a href="http://yeeboodigital.com/" target="_blank">Yeeboo Digital</a>.
				</p>
			</div>
		</div>
		<div>
			<img src="<?php echo get_stylesheet_directory_uri() ?>/img/imagine.png" alt="">
		</div>

	</div>

</footer>

<?php wp_footer() ?>
</body>
</html>
