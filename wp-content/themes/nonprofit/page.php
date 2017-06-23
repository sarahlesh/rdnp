<?php
//// Get include the header
get_header();

if(get_post_meta(get_queried_object_id(), "show_titlebar", true) != "no" && !is_front_page()) {
	get_template_part( 'parts/titlebar/titlebar', '1' );
} ?>
  
  <!-- content  -->
	<main class="l-main" id="content">
		<div class="main row">	
		  <?php if (have_posts()) :
       while (have_posts()) : the_post(); 
       global $more;
				$more = 0;
       ?>    
  			<article>
  				<div class="body field">
  					<?php the_content(); ?>
  				</div>
  			</article>
  			
  			<?php 
  			if (comments_open() ){
        comments_template( '', true );
      } ?>
      
      <?php endwhile;
      endif; 
	  
      ?>
			
		</div>  
	</main>
	<!-- /content  -->
		
	<?php get_footer(); ?>