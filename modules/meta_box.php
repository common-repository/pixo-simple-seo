<?php 
		

add_action( 'add_meta_boxes', 'wss_add_custom_box' );
function wss_add_custom_box() {
	global $post;
	global $current_user;
	
	$post_types = get_post_types( '', 'names' ); 
	foreach ( $post_types as $post_type ) {
		add_meta_box( 
			'wss_reactor_editor',
			__( 'Simple SEO', 'apr' ),
			'wss_reactor_editor',
			$post_type, 'advanced', 'high'
		);
	}
	add_meta_box( 
			'wss_reactor_editor',
			__( 'Simple SEO', 'apr' ),
			'wss_reactor_editor',
			'page', 'advanced', 'high'
		);

}


function wss_reactor_editor(){
	global $post;
	echo '
	<div class="tw-bs">
		<div class="form-horizontal ">
			<div class="control-group">  
				<label class="control-label" for="local_title">Title</label>  
				<div class="controls">  
				  <input type="text" class="input-xlarge inputlimit" data-limit="55" id="local_title" name="local_title" value="'.esc_html( get_post_meta( $post->ID, 'local_title', true ) ).'">  
				  <p class="help-block"></p>  
				</div>  
			  </div>   
			
			<div class="control-group">  
				<label class="control-label" for="local_descr">Description</label>  
				<div class="controls">  
				  <textarea class="input-xlarge inputlimit" data-limit="155" id="local_descr" name="local_descr" rows="3">'.esc_html( get_post_meta( $post->ID, 'local_descr', true ) ).'</textarea>  
				  <p class="help-block"></p> 
				</div>  
			  </div>  

			
		</div>	

	
	</div>
	';	

}

add_action( 'save_post', 'wss_save_postdata' );
function wss_save_postdata( $post_id ) {
global $current_user; 
 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }
  /// User editotions
#var_dump(  $_POST  );
	if( isset( $_POST['local_title'] ) ){
		update_post_meta( $post_id, 'local_title', $_POST['local_title'] );
	}
	if( isset( $_POST['local_descr'] ) ){
		update_post_meta( $post_id, 'local_descr', $_POST['local_descr'] );
	}

	
}

?>