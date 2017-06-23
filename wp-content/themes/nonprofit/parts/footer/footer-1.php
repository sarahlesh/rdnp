<section class="wd-footer">
	<div class="row">

		<?php
		$nonprofit_footer_columns = nonprofit_get_option('nonprofit_footer_columns','three_columns');
		switch ($nonprofit_footer_columns) {
			case "one_columns":
				$column_one = 12;
				break;
			case "tow_a_columns":
				$column_one = 4;
				$column_tow = 8;
				break;
			case "tow_b_columns":
				$column_one = 8;
				$column_tow = 4;
				break;
			case "tow_c_columns":
				$column_one = 6;
				$column_tow = 6;
				break;
			case "four_columns":
				$column_one = 3;
				$column_tow = 3;
				$column_three = 3;
				$column_four = 3;
			break;
			default:
				$column_one = 4;
				$column_tow = 4;
				$column_three = 4;
		} ?>

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
	<div class="row">
		<div class="large-12 columns">
			<?php wp_nav_menu( array('theme_location' => 'footer',
			                         'container_class' => 'copyright-menu',
			                         'fallback_cb' => 'nonprofit_main_menu_fallback' )) ?>

		</div>
		<div class="copyright large-12 columns">
			<?php
			$nonprofit_copyright = nonprofit_get_option('nonprofit_copyright','');
			?>
			<p>
				<?php echo esc_html($nonprofit_copyright); ?>
			</p>
		</div>
	</div>

	<?php
	if(nonprofit_get_option('nonprofit_body_border','on') == "on") { ?>
		<div class="border-bar body-border-bottom"></div>
	<?php } ?>
</footer>