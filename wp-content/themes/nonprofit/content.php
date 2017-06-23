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
		 <div class="nonprofit_multi_post_masonry">
				<?php
			if ( has_post_thumbnail() ) {
				$thumb = get_post_thumbnail_id(); 
			$img_url = wp_get_attachment_url( $thumb,'full' ); 
			if($nonprofit_image_size_h != '') {
				$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
			}else{
				$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
			}
			
		  ?>
		  <img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
		  <?php 
			}
		   ?>
		   <div class="nonprofit_multi_post_masonry_info">
			   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			   <div>
				   <span><?php the_author() ?></span>
				   <span>  <?php the_date('M, d, Y') ?>  </span>
				   <?php the_category() ?>
				   <p><?php echo wp_trim_words(get_the_content(),25); ?></p>
			   </div>
			  <div class="wd-redmore"><a href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a><i class="ion-ios-arrow-thin-right"></i></div>
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
	   <div class="large-12 columns nonprofit_multi_post_left_image">
	   	<?php if ( has_post_thumbnail() ) { ?>
			<div class="columns large-4">
			<?php 
			$thumb = get_post_thumbnail_id(); 
			$img_url = wp_get_attachment_url( $thumb,'full' ); 
			if($nonprofit_image_size_h != '') {
				$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
			}else{
				$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
			}
		  ?>
		  <img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
		  	</div>
		  	<?php } ?>
		  	<div class="large-8 columns nonprofit_multi_post_left_image_info">
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
			<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> >
				<div class="nonprofit_multi_post_top_image">
					<?php if ( has_post_thumbnail() ) { 
					 $thumb = get_post_thumbnail_id(); 
					 $img_url = wp_get_attachment_url( $thumb,'full' ); 
					 if($nonprofit_image_size_h != '') {
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
						}else{
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
						} 
					?>
					<img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
				   <?php } ?>
				   <div class="nonprofit_multi_post_top_image_info">
					   <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					   <div>
						   <span><?php the_author() ?></span>
						   <span> <?php the_date('M, d, Y') ?>  </span>
						   <?php the_category() ?>
						   <p><?php echo wp_trim_words(get_the_content(),25); ?></p>
					   </div>
					   <div class="wd-redmore"><a href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a><i class="ion-ios-arrow-thin-right"></i></div>
				   </div>
			   </div>
		   </li>
		<?php	
		}
		
	}
		
   
//__________________one post___________________________
}elseif($nonprofit_blog_type == 'nonprofit_one_post') {
?>
<div class="nonprofit_one_post_standar">
	<?php 
    if ( has_post_thumbnail() ) {
		 $thumb = get_post_thumbnail_id(); 
		 $img_url = wp_get_attachment_url( $thumb,'full' ); 
		 if($nonprofit_image_size_h != '') {
				$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
			}else{
				$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
			} 
		 ?>
		 <img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
		 <?php
	} ?>
	<div class="nonprofit_one_post_standar_info">
		<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
		<div>
		<span> <?php the_date('M, d, Y') ?></span>	
     	<span> by :</span><?php the_author() ?>
     	<span> in :</span><?php the_category() ?>
		</div>
    <a class="button small" href="<?php the_permalink() ?>"><?php echo esc_html__("Continue", 'nonprofit') ?></a>
	</div>
	
</div>
	
	<?php
	//__________________freestyle
}else{
	
	if($nonprofit_counter == 1) {
		?>
		<div class="large-12 columns nonprofit_freestyle_content_position_<?php echo esc_attr($nonprofit_counter); ?>">
			<div class="large-6 columns">
				<?php if ( has_post_thumbnail() ) { 
					 $thumb = get_post_thumbnail_id(); 
					 $img_url = wp_get_attachment_url( $thumb,'full' ); 
					 if($nonprofit_image_size_h != '') {
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
						}else{
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
						} 
					?>
					<img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
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
				<?php if ( has_post_thumbnail() ) { 
					 $thumb = get_post_thumbnail_id(); 
					 $img_url = wp_get_attachment_url( $thumb,'full' ); 
					 if($nonprofit_image_size_h != '') {
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
						}else{
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
						} 
					?>
					<img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
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
				<?php if ( has_post_thumbnail() ) { 
					 $thumb = get_post_thumbnail_id(); 
					 $img_url = wp_get_attachment_url( $thumb,'full' ); 
					 if($nonprofit_image_size_h != '') {
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, $nonprofit_image_size_h , true );
						}else{
							$image = nonprofit_resize( $img_url, $nonprofit_image_size_w, true );
						} 
					?>
					<img src="<?php echo esc_attr($image); ?>" alt="<?php the_title(); ?>"/>
				   <?php } ?>
			</div>
	<?php
	}
	
}
