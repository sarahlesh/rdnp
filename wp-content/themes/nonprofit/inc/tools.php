<?php 

if(! function_exists('nonprofit_dsm')){

  function nonprofit_dsm($var){

    print "<pre>" . print_r($var, true) . "</pre>";

  }

}



function nonprofit_is_blog() {

	global  $post;

	$posttype = get_post_type($post );

	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;

}

function nonprofit_get_post_category () {
  	$cat_name = get_the_terms( get_the_ID(), 'category' );
		$nonprofit_class_name = '';
			if( isset($cat_name) && $cat_name != null ) {          
            foreach ($cat_name as $cat) {
              $nonprofit_class_name .= ' ' . $cat->slug;
            }
		}
			return $nonprofit_class_name;
  }

