<?php
require( get_template_directory() . '/framework/functions.php' );

/**
 * Set the format for the more in excerpt, return ... instead of [...]
 */ 
function wellthemes_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'wellthemes_excerpt_more');

// custom excerpt length
function wellthemes_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wellthemes_excerpt_length');

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
   }
   return $count;
}
 
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

?>