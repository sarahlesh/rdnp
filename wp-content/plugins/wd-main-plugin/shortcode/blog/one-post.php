<?php 
$nonprofit_post_by_id = '';
if($nonprofit_blog_affichage_one_post == 'nonprofit_blog_Post_from_list') {
	$nonprofit_post_by_id = $nonprofit_blog_post_list ;
}

$loop = new WP_Query( array( 'post_type' => 'post' ,'posts_per_page'=>1,'page_id' => $nonprofit_post_by_id) );
    while ( $loop->have_posts() ) : $loop->the_post(); 
	
	$nonprofit_one_post_format = get_post_format();
	
     switch ($nonprofit_one_post_format) {
     	
         case 'gallery':
              include( plugin_dir_path( __FILE__ ).'wd-content-gallery.php');
             break;
			 
         case 'video':
             ?>
             
             <?php
             break;
		case 'quote':
			
             include( plugin_dir_path( __FILE__ ).'wd-content-quote.php');
        break;
			case 'sound':
             ?>
             
             <?php
        break;
         default:
             include( plugin_dir_path( __FILE__ ).'wd-content.php');
             break;
     }
    ?>
		
		 <?php endwhile;
		 ?>
		<?php wp_reset_query(); 	
?>