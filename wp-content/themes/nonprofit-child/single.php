<?php get_header(); ?>

            <div class="wd-title-bar">
		    	<div class="row">
			  		<div class="large-12 columns wd-title-section_l">
			        	<h2><?php the_title(); ?></h2>
		      		</div>
		      	</div>
			</div>

			<main id="l-main" class="row single-post">
            <div class="main">
            	<?php if (have_posts()) : 
            		  while (have_posts()) : the_post();
            		?>
	            <div class="blog-page">
	            	
	            	<div class="blog-page-info">
						  </span>
						   <span> <?php the_date('M, d, Y') ?> | </span>
						   <?php the_category() ?>
					</div>
					
					<?php switch (get_post_format())
					{
						case "gallery" :
							?>
							 <ul class="nonprofit_blog_post_gallery_masonry">
								  	<?php $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'nonprofit_portfolio-image-gallery', true);
										if ($portfolio_image_gallery_val != '')
										 $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
											if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
												foreach ($portfolio_image_gallery_array as $gimg_id) :
													$thumb = wp_get_attachment_image_src($gimg_id, 'full');
														$image = nonprofit_resize( $thumb[0],840, 420 , true );
													
													echo '<li><img src="' . $image . '"/></li>';
												endforeach;
											endif;
								  	?>
							   </ul>
							<?php
						 break;
						case "video" :
							 $_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
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
										
								<?php } 
						break;
						default;
						the_post_thumbnail('nonprofit_blog-thumb');
						 break; 
					}
					
					 ?>
		          
		           
		            <div class="blog-body clearfix p-t-20">
			           <?php the_content() ?>
		            </div>
		            <div class="wd-tages">
		            	<span>TAGS :</span>
		            <span><?php $nonprofit_posttags = get_the_tags();
					if ($nonprofit_posttags) {
					  foreach($nonprofit_posttags as $tag) {
					    echo   $tag->name . ' ';
					  }
					} ?></span>
					<div class="share-icons">
						<span>share : </span>
							<ul>
								<li><a id="twitter" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweet" href="#"><i class="ion-social-twitter"></i></a></li>
								<li><a id="facebook" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Like" href="#"><i class="ion-social-facebook"></i></a></li>
								<li><a id="pinterest" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Like" href="#"><i class="ion-social-pinterest"></i></a></li>
								<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
								<li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
							</ul>
						</div>
		            </div>
		            <?php if (comments_open()){ ?>
		             <div class="post-infos clearfix">
			            <h4 class="comment-count"><?php comments_number( '0 Comment', '1 Comment', '% Responses' ); ?></h4>
			           
		            </div>
		            <?php } ?>
	            </div>
	            
	            <?php if (comments_open()){
		              comments_template( '', true );
		            } 
				endwhile;
				endif; ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nonprofit' ), 'after' => '</div>' ) ); ?>
            </div>
        </main>

<?php get_footer(); ?>