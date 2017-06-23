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
		 	
		 	<iframe width="100%" height="190" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/142466873&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
									
		 	<div class="nonprofit_multi_post_video_masonry_info">
			   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			   <div>
				   <span><?php the_author() ?></span>
				   <span>  <?php the_date('M, d, Y') ?>  </span>
				   <?php the_category() ?>
				   <p><?php echo wp_trim_words(get_the_content(),60); ?></p>
			   </div>
			   <a href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a>
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
	   	<div class="nonprofit_multi_post_video_left">
	   		<div class="large-4 columns">
	   			
	   		</div>
	   		<div class="large-8 columns nonprofit_multi_post_video_left_info">
			   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			  	<div>
			    <span><?php the_date('M, d, Y') ?>  </span>
			    <span>by :</span> <?php the_author() ?>
			    <span> in :</span> <?php the_category() ?>
			    <?php if($nonprofit_blog_display_content == 'yes') { ?>
			    <p><?php echo wp_trim_words(get_the_content(),60); ?></p>
			    <?php } ?>
			    </div>
			   <a href="<?php the_permalink() ?>"><?php echo esc_html__("Read More", 'nonprofit') ?></a>
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
					
					<div class="nonprofit_multi_post_video_top_info">
					   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					   <div>
						   <span><?php the_author() ?></span>
						   <span>  <?php the_date('M, d, Y') ?>  </span>
						   <?php the_category() ?>
						   <p><?php echo wp_trim_words(get_the_content(),60); ?></p>
					   </div>
					   <a href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a>
				   </div>
				</div>
		   </li>
		<?php	
		}
		
	}
		
   
//__________________one post___________________________
}else {
?>
<div class="nonprofit_one_post_video">
	
	
	
</div>
	
	<?php
}
