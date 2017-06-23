<?php
if($nonprofit_blog_type == 'nonprofit_multi_post') {
//_____________multi post  ________________________	
	//----------- masonry Posts ---------------
	if($nonprofit_blog_style != 'nonprofit_grid_blog') {
		$nonprofit_class_name = nonprofit_get_post_category ();
	   $nonprofit_class_name .= " nonprofit_multi_post_isotop_item all ".$animation_classes;
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> <?php echo esc_attr($data_animated); ?>>
	   	<div class="nonprofit_multi_post_gallery_masonry">
	   		  <ul class="nonprofit_blog_post_gallery_masonry">
				  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
						if ($portfolio_image_gallery_val != '')
						 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
							if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
								foreach ($portfolio_image_gallery_array as $gimg_id) :
									$thumb = wp_get_attachment_image_src($gimg_id, 'full');
									if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w,477, true );
									}
									echo '<li><img src="' . $image . '" alt="'.get_the_title().'"/></li>';
								endforeach;
							endif;
				  	?>
			   </ul>
			   <div class="nonprofit_multi_post_gallery_masonry_info">
				   <<?php echo esc_attr($nonprofit_blog_title_tag); ?> style="<?php echo esc_attr($nonprofit_custom_blog_name_inline_style); ?>">
					   <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				   </<?php echo esc_attr($nonprofit_blog_title_tag); ?>>
				   <div>
				   <span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				   <span style="<?php echo esc_attr($nonprofit_custom_blog_tags_date_inline_style) ?>">  <?php the_date('M, d, Y') ?>  </span>
				   <?php the_category() ?>
				   <p style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php echo wp_trim_words(get_the_content(),25); ?></p>
				   </div>
				   <div class="wd-redmore"><a href="<?php the_permalink() ?>">Continue</a><i class="ion-ios-arrow-thin-right"></i></div>
			   </div>
	   	</div>
	   </li>
		<?php
	//----------- Grid Posts ---------------	
	}else{
		//----------------post image left -------------------
		if($nonprofit_blog_affichage_type == 'nonprofit_blog_image_left'){
			//var_dump('grid image left'); 
			$nonprofit_class_name = nonprofit_get_post_category ();
			$nonprofit_class_name .= " nonprofit_multi_post_isotop_item wd-image-left all ".$animation_classes;
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> <?php echo esc_attr($data_animated); ?>>
			<div class="large-12 columns nonprofit_multi_post_gallery_left_image">
				<div class="columns large-4">
					<ul class="nonprofit_blog_post_gallery_left_image">
				  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
						if ($portfolio_image_gallery_val != '')
						 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
							if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
								foreach ($portfolio_image_gallery_array as $gimg_id) :
									$thumb = wp_get_attachment_image_src($gimg_id, 'full');
									if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, true );
									}
									echo '<li><img class="lazyOwl"  src ="' . $image . '" alt="'.get_the_title().'" /></li>';
								endforeach;
							endif;
				  	?>
				  	</ul>
			  	</div>
			  	<div class="large-8 columns nonprofit_multi_post_gallery_left_image_info">
			  		<<?php echo esc_attr($nonprofit_blog_title_tag); ?> style="<?php echo esc_attr($nonprofit_custom_blog_name_inline_style); ?>">
				   		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				   	</<?php echo esc_attr($nonprofit_blog_title_tag); ?>>
				  	<div>
				    <span style="<?php echo esc_attr($nonprofit_custom_blog_tags_date_inline_style) ?>"><?php the_date('M, d, Y') ?>  </span>
				   <span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"> <?php the_author() ?></span>
				     <?php the_category() ?>
				    <?php if($nonprofit_blog_display_content == 'yes') { ?>
				    <p style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php echo wp_trim_words(get_the_content(),20); ?></p>
				    <?php } ?>
				    </div>
				   <div class="wd-redmore"><a href="<?php the_permalink() ?>">Read More</a><i class="ion-ios-arrow-thin-right"></i></div>
			   </div>
		   </div>
	   </li>
		<?php
		//----------------post image top -------------------
		}else{
			$nonprofit_class_name = nonprofit_get_post_category ();
	   $nonprofit_class_name .= " nonprofit_multi_post_isotop_item all ".$animation_classes;
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> <?php echo esc_attr($data_animated); ?>>
	   	<div class="nonprofit_multi_post_gallery_top_image">
	   				<ul class="nonprofit_blog_post_gallery_top_image">
				  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
						if ($portfolio_image_gallery_val != '')
						 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
							if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
								foreach ($portfolio_image_gallery_array as $gimg_id) :
									$thumb = wp_get_attachment_image_src($gimg_id, 'full');
									if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w,477, true );
									}
									echo '<li><img src="' . $image . '" alt="'.get_the_title().'" /></li>';
								endforeach;
							endif;
				  	?>
				  	</ul>
	   				<div class="nonprofit_multi_post_gallery_top_image_info">
					   	<<?php echo esc_attr($nonprofit_blog_title_tag); ?> style="<?php echo esc_attr($nonprofit_custom_blog_name_inline_style); ?>">
				   			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				   		</<?php echo esc_attr($nonprofit_blog_title_tag); ?>>
					   <div>
						   <span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
						   <span style="<?php echo esc_attr($nonprofit_custom_blog_tags_date_inline_style) ?>">  <?php the_date('M, d, Y') ?>  </span>
						   <?php the_category() ?>
						   <p style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php echo wp_trim_words(get_the_content(),25); ?></p>
					   </div>
					  <div class="wd-redmore"><a href="<?php the_permalink() ?>">Continue</a><i class="ion-ios-arrow-thin-right"></i></div> 
				   </div>
	   	</div>
	   </li>
	   		
	   
		<?php	
		}
		
	}
		
   
//__________________one post___________________________
}elseif($nonprofit_blog_type == 'nonprofit_one_post') {
?>
<div class="nonprofit_one_post_gallery <?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
		<ul class="nonprofit_blog_post_gallery">
	  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
			if ($portfolio_image_gallery_val != '')
			 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
				if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
					foreach ($portfolio_image_gallery_array as $gimg_id) :
						$thumb = wp_get_attachment_image_src($gimg_id, 'full');
						if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w,477, true );
									}
									echo '<li><img src="' . $image . '" alt="'.get_the_title().'" /></li>';
					endforeach;
				endif;
	  	?>
	  	</ul>
	  	
	  	<div class="nonprofit_one_post_gallery_info">
				<<?php echo esc_attr($nonprofit_blog_title_tag); ?> style="<?php echo esc_attr($nonprofit_custom_blog_name_inline_style); ?>">
		   		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		   	</<?php echo esc_attr($nonprofit_blog_title_tag); ?>>
		    <div>
		    <span><?php the_date('M, d, Y') ?>  </span>
		    <span> <?php the_author() ?></span>
		    <?php the_category() ?>
		    </div>
		    <a class = "button small" href="<?php the_permalink() ?>">Continue</a>
	    </div>
</div>
	<?php
}else{
	if($nonprofit_counter == 1) {
		?>
		<div class="large-12 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter) .' '. $animation_classes; ?>" <?php echo esc_attr($data_animated); ?>>
			<div class="large-6 columns">
				<ul class="nonprofit_blog_post_gallery">
	  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
			if ($portfolio_image_gallery_val != '')
			 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
				if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
					foreach ($portfolio_image_gallery_array as $gimg_id) :
						$thumb = wp_get_attachment_image_src($gimg_id, 'full');
						if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, true );
									}
									echo '<li><img src="' . $image . '" alt="'.get_the_title().'"/></li>';
					endforeach;
				endif;
	  	?>
	  	</ul>
			</div>
			
				<div class="large-6 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>_info">
					<<?php echo esc_attr($nonprofit_blog_title_tag); ?> style="<?php echo esc_attr($nonprofit_custom_blog_name_inline_style); ?>">
			   		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			   	</<?php echo esc_attr($nonprofit_blog_title_tag); ?>>
					<div>
					<span style="<?php echo esc_attr($nonprofit_custom_blog_tags_date_inline_style) ?>"> <?php the_date('M, d, Y') ?></span>
			     	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
			     	<?php the_category() ?>
					</div>
			    	<div class="wd-redmore"><a href="<?php the_permalink() ?>">Continue</a><i class="ion-ios-arrow-thin-right"></i></div>
				</div>
			
		</div>
	<?php
	}elseif($nonprofit_counter == 4) {
		?>
	<div class="nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
			<div>
				<ul class="nonprofit_blog_post_gallery">
	  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
			if ($portfolio_image_gallery_val != '')
			 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
				if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
					foreach ($portfolio_image_gallery_array as $gimg_id) :
						$thumb = wp_get_attachment_image_src($gimg_id, 'full');
						if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, true );
									}
									echo '<li><img src="' . $image . '" alt="'.get_the_title().'" /></li>';
					endforeach;
				endif;
	  	?>
	  	</ul>
			</div>
			
				<div class="nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>_info">
					<<?php echo esc_attr($nonprofit_blog_title_tag); ?> style="<?php echo esc_attr($nonprofit_custom_blog_name_inline_style); ?>">
			   		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			   	</<?php echo esc_attr($nonprofit_blog_title_tag); ?>>
					<div>
					<span> <?php the_date('M, d, Y') ?></span>	
			     	<span> by :</span><?php the_author() ?>
			     	<span> in :</span><?php the_category() ?>
					</div>
			    	<div class="wd-redmore"><a href="<?php the_permalink() ?>">Continue</a><i class="ion-ios-arrow-thin-right"></i></div>
				</div>
			
		</div>
	<?php
	}else{
		?>
		<div class="large-6 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
				<ul class="nonprofit_blog_post_gallery">
	  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
			if ($portfolio_image_gallery_val != '')
			 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
				if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
					foreach ($portfolio_image_gallery_array as $gimg_id) :
						$thumb = wp_get_attachment_image_src($gimg_id, 'full');
						if($nonprofit_image_size_h != '') {
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, $nonprofit_image_size_h , true );
									}else{
										$image = nonprofit_resize( $thumb[0], $nonprofit_image_size_w, true );
									}
									echo '<li><img src="' . $image . '" alt="'.get_the_title().'"/></li>';
					endforeach;
				endif;
	  	?>
	  	</ul>
			</div>
	<?php
	}
}
