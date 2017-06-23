<section class="wd-footer wd-footer-3">
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


<!--.l-footer-->
<footer class="wd-copyright-3">
	<div class="row">
		<div class="large-6 columns">
			<?php
			$nonprofit_copyright = nonprofit_get_option('nonprofit_copyright','');
			?>
			<p>
				<?php echo esc_html($nonprofit_copyright); ?>
			</p>

		</div>
		<div class=" large-6 columns social-icon">

			<?php if (nonprofit_get_option('nonprofit_facebook','') != ""){ ?>
				<a href="<?php echo nonprofit_get_option('nonprofit_facebook');?>">
					
					<i class= "fa fa-facebook" ></i>
					<span>FACEBOOK</span>
				</a>
			<?php } ?>
			<?php if (nonprofit_get_option('nonprofit_twitter','') != ""){ ?>
				 <a href="<?php echo nonprofit_get_option('nonprofit_twitter');?>">
				 	<i class= "fa fa-twitter" ></i>
				 	<span>TWITTER</span>
				 </a>
			<?php } ?>
			<?php if (nonprofit_get_option('nonprofit_google_plus','') != ""){ ?>
				 <a href="<?php echo nonprofit_get_option('nonprofit_google_plus');?>">
				 	<i class= "fa fa-google-plus" ></i>
				 	<span>GOOGLE +</span>
				 </a>
			<?php } ?>
			
		</div>
	</div>
</footer>
</section>
<!--/.footer-columns-->