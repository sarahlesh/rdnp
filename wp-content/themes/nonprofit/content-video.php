<?php
if(is_home() || is_archive()) {
	$nonprofit_blog_type ='nonprofit_multi_post';
	$nonprofit_blog_style = 'nonprofit_blog_image_top';
	$nonprofit_image_size_w = 924;
	$nonprofit_image_size_h = 477;
}

if($nonprofit_blog_type == 'nonprofit_multi_post') {
//_____________multi post  ________________________	
	//----------- masonry Posts ---------------
	if($nonprofit_blog_style != 'nonprofit_grid_blog') {
		//var_dump('masonry');
		$nonprofit_class_name = nonprofit_get_post_category ();
		$nonprofit_class_name .= " nonprofit_multi_post_isotop_item all";
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?>>
		 <div class="nonprofit_multi_post_video_masonry">
		 	
									<?php $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($_video_type == "youtube") { ?>
										<iframe width="100%" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "nonprofit_youtube_link", true);  ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
										
									<?php } else if ($_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "nonprofit_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="<?php echo esc_attr($nonprofit_image_size_w); ?>" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
										
		 	<div class="nonprofit_multi_post_video_masonry_info">
			   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			   <div>
				   <span><?php the_author() ?></span>
				   <span>  <?php the_date('M, d, Y') ?>  </span>
				   <?php the_category() ?>
				   <p><?php echo wp_trim_words(get_the_content(),25); ?></p>
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
	   $nonprofit_class_name .= " nonprofit_multi_post_isotop_item all";
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?>>
	   	<div class="nonprofit_multi_post_video_left clearfix">
	   		<div class="large-4 columns">
	   			<?php $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($_video_type == "youtube") { ?>
										
										<iframe width="100%" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "nonprofit_youtube_link", true);  ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
									
									<?php } else if ($_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "nonprofit_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="<?php echo esc_attr($nonprofit_image_size_w); ?>" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
	   		</div>
	   		<div class="large-8 columns nonprofit_multi_post_video_left_info">
			   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			  	<div>
			    <span><?php the_date('M, d, Y') ?>  </span>
			    by : <span><?php the_author() ?></span>
			    in : <?php the_category() ?>
			    <?php if($nonprofit_blog_display_content == 'yes') { ?>
			    <p><?php echo wp_trim_words(get_the_content(),20); ?></p>
			    <?php } ?>
			    </div>
			   <div class="wd-redmore"><a href="<?php the_permalink() ?>"><?php echo esc_html__("Read More", 'nonprofit') ?></a><i class="ion-ios-arrow-thin-right"></i></div>
		   </div>
		</div>
	   </li>
		<?php
		//----------------post image top -------------------
		}else{
		$nonprofit_class_name = nonprofit_get_post_category ();
			$nonprofit_class_name .= " nonprofit_multi_post_isotop_item all";
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?>>
				<div class="nonprofit_multi_post_video_top">
					<?php $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($_video_type == "youtube") { ?>
										
										<iframe width="100%" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "nonprofit_youtube_link", true);  ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
									
									<?php } else if ($_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "nonprofit_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="<?php echo esc_attr($nonprofit_image_size_w); ?>" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
					<div class="nonprofit_multi_post_video_top_info">
					   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					   <div>
						   <span><?php the_author() ?></span>
						   <span>  <?php the_date('M, d, Y') ?>  </span>
						   <?php the_category() ?>
						   <p><?php echo wp_trim_words(get_the_content(),25); ?></p>
					   </div>
					  <div class="wd-redmore"><a  href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a><i class="ion-ios-arrow-thin-right"></i></div>
				   </div>
				</div>
		   </li>
		<?php	
		}
		
	}
		
   
//__________________one post___________________________
}elseif($nonprofit_blog_type == 'nonprofit_one_post') {
?>
<div class="nonprofit_one_post_video">
	
	
	
</div>
	
	<?php
}else{
	if($nonprofit_counter == 1) {
		?>
		<div class="large-12 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter) ?>">
			<div class="large-6 columns">
				<?php $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($_video_type == "youtube") { ?>
										
										<iframe width="100%" height="<?php echo esc_attr($nonprofit_image_size_h) ?>" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "nonprofit_youtube_link", true);  ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
									
									<?php } else if ($_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "nonprofit_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="<?php echo esc_attr($nonprofit_image_size_w); ?>" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
			</div>
			
				<div class="large-6 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter); ?>_info">
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<div>
					<span> <?php the_date('M, d, Y') ?></span>	
			     	<span> by :</span><?php the_author() ?>
			     	<span> in :</span><?php the_category() ?>
					</div>
			    	<div class="wd-redmore"><a href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a><i class="ion-ios-arrow-thin-right"></i></div>
				</div>
			
		</div>
	<?php
	}elseif($nonprofit_counter == 4) {
		?>
	<div class="nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter); ?>">
			<div>
				<?php $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($_video_type == "youtube") { ?>
										
										<iframe width="100%" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "nonprofit_youtube_link", true);  ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
									
									<?php } else if ($_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "nonprofit_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="<?php echo esc_attr($nonprofit_image_size_w); ?>" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
			</div>
			
				<div class="nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter); ?>_info">
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<div>
					<span> <?php the_date('M, d, Y') ?></span>	
			     	<span> by :</span><?php the_author() ?>
			     	<span> in :</span><?php the_category() ?>
					</div>
			    	<div class="wd-redmore"><a href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a><i class="ion-ios-arrow-thin-right"></i></div>
				</div>
			
		</div>
	<?php
	}else{
		?>
		<div class="large-6 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter); ?>">
				<?php $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($_video_type == "youtube") { ?>
										
										<iframe width="100%" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "nonprofit_youtube_link", true);  ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
									
									<?php } else if ($_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "nonprofit_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="<?php echo esc_attr($nonprofit_image_size_w); ?>" height="<?php echo esc_attr($nonprofit_image_size_h); ?>" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "nonprofit_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
			</div>
	<?php
	}
	
}
