<?php 
add_filter('wp_title', 'wss_wp_title', 10, 2);


function wss_wp_title($title){
	global $post;
	$config = get_option('wss_options'); 
	
	if( is_single() || is_page() ){
		if( get_post_meta( $post->ID, 'local_title', true ) != '' ){
			$title = get_post_meta( $post->ID, 'local_title', true );
		}else{
			$title = $config['glob_title'];
		}
	}
	return $title;
	
}


add_action('wp_head', 'wss_wp_descr' );


function wss_wp_descr($title){
	global $post;
	$config = get_option('wss_options'); 
	
	if( is_single() || is_page() ){
		if( get_post_meta( $post->ID, 'local_descr', true ) != '' ){
			$descr = '<meta name="description" content="'.esc_html( get_post_meta( $post->ID, 'local_descr', true ) ).'" />';
		}else{
			$descr = '<meta name="description" content="'.esc_html( $config['glob_descr'] ).'" />';

		}
	}
	echo $descr;
	
}

?>