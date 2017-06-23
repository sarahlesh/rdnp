<?php
if($nonprofit_blog_category != '' && $nonprofit_blog_display_filter != 'nonprofit_blog_show_filter') {
	$nonprofit_blog_category = $nonprofit_blog_category;
}
if($nonprofit_blog_item_perpage != '') {
	$nonprofit_blog_item_perpage = $nonprofit_blog_item_perpage;
}
if($nonprofit_blog_columns != '') {
	$nonprofit_blog_columns = $nonprofit_blog_columns;
}
if($nonprofit_blog_style == 'nonprofit_grid_blog') {
	$nonprofit_blog_grid_style = 'fitRows';
}else{
	
	$nonprofit_blog_grid_style = 'masonry';
}
if ($nonprofit_blog_display_filter == 'nonprofit_blog_show_filter' ) {
		$terms = get_terms( array('category'), array('hide_empty' => FALSE) );
	
?>
			<div class="filters">
  			   <a href="#" data-filter=".all">All</a> 
    		<?php foreach ($terms as $key => $term) { ?>
               <a href="#" class="<?php echo esc_attr($term->slug) ?>" data-filter=".<?php echo esc_attr($term->slug) ?>"> <?php echo esc_attr($term->name); ?> </a> 
            <?php } ?>
    		</div>
    	<?php }
		?><ul class="nonprofit_isotop large-block-grid-<?php echo esc_attr($nonprofit_blog_columns) ?>" data-wdgrid = "<?php echo esc_attr($nonprofit_blog_grid_style) ?>">

		<?php

		global $wp_query;
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $wp_query -> query(array( 
                          'post_type' => 'post', 
                          'posts_per_page' => $nonprofit_blog_item_perpage,
                          'paged'          => $paged,
                          'category_name' => $nonprofit_blog_category
                        ) );


      while ($wp_query->have_posts()) : $wp_query->the_post();


		$nonprofit_one_post_format = get_post_format();
		switch ($nonprofit_one_post_format) {
         case 'gallery':
			
             include( plugin_dir_path( __FILE__ ).'wd-content-gallery.php');
             break;
			 
         case 'video':
            include( plugin_dir_path( __FILE__ ).'wd-content-video.php');
             break;
		case 'quote':
			
             include( plugin_dir_path( __FILE__ ).'wd-content-quote.php');
        	break;
			case 'audio':
             include( plugin_dir_path( __FILE__ ).'wd-content-sound.php');
        	 break;
         default:
             include( plugin_dir_path( __FILE__ ).'wd-content.php');
             break;
     }
		endwhile; 
		
		?></ul>
		<?php 


    $wp_query = null; $wp_query = $temp;
    wp_reset_query();
		 ?>