
	<footer class="wd-copyright wd-footer-2">
			<div class="social-icon">
				<?php if (nonprofit_get_option('nonprofit_facebook','') != ""){ ?>
				<a href="<?php echo nonprofit_get_option('nonprofit_facebook');?>"><i class= "fa fa-facebook" ></i></a>
				<?php } ?>
				<?php if (nonprofit_get_option('nonprofit_twitter','') != ""){ ?>
				<a href="<?php echo nonprofit_get_option('nonprofit_twitter');?>"><i class= "fa fa-twitter" ></i></a>
				<?php } ?>
				<?php if (nonprofit_get_option('nonprofit_google_plus','') != ""){ ?>
				<a href="<?php echo nonprofit_get_option('nonprofit_google_plus');?>"><i class= "fa fa-google-plus" ></i> </a>
				<?php } ?>
			</div>
			<div>
				<?php
				 $nonprofit_copyright = nonprofit_get_option('nonprofit_copyright','');
				 echo esc_html($nonprofit_copyright); ?>
			</div>
	</footer>
