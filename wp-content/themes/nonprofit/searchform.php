<?php
/**
 * The template for displaying search forms in Nonprofit
 *
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ) ?>" class="searchform" id="searchform" method="get">
				<div>
					<input type="text" id="s" placeholder="<?php echo esc_html__('Type & hit enter...','nonprofit') ?> " name="s" value="">
				</div>
</form>