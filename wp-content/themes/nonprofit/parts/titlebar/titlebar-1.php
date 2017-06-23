<?php
$nonprofit_page_titlebar_bmargin = get_post_meta(get_queried_object_id(), "nonprofit_page_titlebar_bmargin", true)
?>

<div class="wd-title-bar" style="margin-bottom: <?php echo esc_attr($nonprofit_page_titlebar_bmargin); ?>;">
	<div class="row">
		<div class="large-12 columns wd-title-section_l">
			<?php
			if (nonprofit_is_blog()){
				$page_for_posts = get_option( 'page_for_posts' );
				if($page_for_posts != 0) {
				?>
				<h2><?php echo get_the_title($page_for_posts); ?></h2>
				<h5><?php echo esc_html__('Our Latest Blog Posts', 'nonprofit'); ?></h5>
			  <?php
			  }else{ ?>
			  	<h2><?php echo esc_html__('Blog', 'nonprofit'); ?></h2>
				<h5><?php echo esc_html__('Our Latest Blog Posts', 'nonprofit'); ?></h5>
			  <?php
			  }

			}elseif(is_search()){ ?>
				<h2><?php echo esc_html__('Search Result of', 'nonprofit') .': '. get_search_query( false ); ?></h2>
				<?php
			}else {
				the_title( '<h2>', '</h2>' );
				if ( ! empty( $nonprofit_page_sub_title ) ) { ?>
					<h5><?php echo esc_html($nonprofit_page_sub_title) ?></h5>
				<?php }
			} ?>
		</div>

	</div>
</div>