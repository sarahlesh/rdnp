<?php 

if($nonprofit_blog_type == 'nonprofit_multi_post') {
//_____________multi post  ________________________	
	//----------- masonry Posts ---------------
	if($nonprofit_blog_style != 'nonprofit_grid_blog') {
		//var_dump('masonry');
		$nonprofit_class_name = nonprofit_get_post_category ();
			$nonprofit_class_name .= " nonprofit_multi_post_isotop_item all ".$animation_classes;
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> <?php echo esc_attr($data_animated); ?>>
			<div class="nonprofit_one_post_quote">
				<div>
					<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
				        <div  class="nonprofit_author">
				        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				        </div>     
					<i class="fa fa-quote-right"></i>
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
			$nonprofit_class_name .= " nonprofit_multi_post_isotop_item all ".$animation_classes;
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> <?php echo esc_attr($data_animated); ?>>
			<div class="nonprofit_one_post_quote">
				<div>
					<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
				        <div  class="nonprofit_author">
				        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				        </div>     
					<i class="fa fa-quote-right"></i>
				</div>
				
			</div>
			</li>
			<?php
			
		//----------------post image top -------------------
		}else{
			//var_dump('grid image top');
			$nonprofit_class_name = nonprofit_get_post_category ();
			$nonprofit_class_name .= " nonprofit_multi_post_isotop_item all ".$animation_classes;
		?>
		<li id="post-<?php the_ID(); ?>" <?php post_class($nonprofit_class_name); ?> <?php echo esc_attr($data_animated); ?>>
				<div class="nonprofit_one_post_quote">
				<div>
					<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
				        <div  class="nonprofit_author">
				        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				        </div>     
					<i class="fa fa-quote-right"></i>
				</div>
				
			</div>
			</li>
			<?php
			
		}
		
	}
		
   
//__________________one post___________________________
}elseif($nonprofit_blog_type == 'nonprofit_one_post') {
	
	?>
	<div class="nonprofit_one_post_quote <?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
		<div>
			<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
		        <div  class="nonprofit_author">
		        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
		        </div>     
			<i class="fa fa-quote-right"></i>
		</div>
		
	</div>
<?php 
}else{
	if($nonprofit_counter == 1) {
		?>
		<div class="large-12 columns nonprofit_freestyle_quote_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
			<div class="nonprofit_one_post_quote">
				<i class="fa fa-quote-right"></i>
				<div>
					<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
				        <div  class="nonprofit_author">
				        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				        </div>     
					
				</div>
			</div>
		</div>
	<?php
	}elseif($nonprofit_counter == 4) {
		?>
	<div class="nonprofit_freestyle_quote_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
			<div class="nonprofit_one_post_quote">
				<i class="fa fa-quote-right"></i>
				<div>
					<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
				        <div  class="nonprofit_author">
				        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				        </div>
				</div>
				
			</div>
			
		</div>
	<?php
	}else{
		?>
		<div class="large-6 columns nonprofit_freestyle_quote_position_<?php echo esc_attr($nonprofit_counter) .' '. esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
				<div class="nonprofit_one_post_quote">
					<i class="fa fa-quote-right"></i>
				<div>
					<blockquote style="<?php echo esc_attr($nonprofit_custom_blog_text_inline_style) ?>"><?php the_content() ?></blockquote>
				        <div  class="nonprofit_author">
				        	<span style="<?php echo esc_attr($nonprofit_custom_blog_author_inline_style) ?>"><?php the_author() ?></span>
				        </div>     
					
				</div>
				
			</div>
			</div>
	<?php
	}
}
 
