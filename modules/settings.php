<?php 
	
add_action('admin_menu', 'wss_item_menu');

function wss_item_menu() {

	add_options_page(  __('Pixo Simple SEO', 'sc'), __('Pixo Simple SEO', 'sc'), 'edit_published_posts', 'wss_config', 'wss_config');
}

function wss_config(){

?>
<div class="wrap tw-bs">
<h2><?php _e('Settings', 'sc'); ?></h2>
<hr/>
 <?php if(  wp_verify_nonce($_POST['_wpnonce']) ): ?>
  <div id="message" class="updated" ><?php _e('Settings saved successfully', 'sc'); ?></div>  
  <?php 
  $config = get_option('wss_options'); 

	foreach( $_POST as $key=>$value ){
		$wss_options[$key] = $value;
	}
  update_option('wss_options', $wss_options );
  ?>
  <?php else:  ?>

  <?php //exit; ?>
  
  <?php endif; ?> 
<form class="form-horizontal" method="post" action="">
<?php wp_nonce_field();  
$config = get_option('wss_options'); 

#var_dump( $config );
?>  
<fieldset>

		 <div class="control-group">  
            <label class="control-label" for="glob_title">Title</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge inputlimit" data-limit="55" id="glob_title" name="glob_title" value="<?php  echo esc_html( $config['glob_title'] ); ?>">  
              <p class="help-block"></p>  
            </div>  
          </div>   
		
		<div class="control-group">  
            <label class="control-label" for="glob_descr">Description</label>  
            <div class="controls">  
              <textarea class="input-xlarge inputlimit" data-limit="155" id="glob_descr" name="glob_descr" rows="3"><?php echo esc_html( $config['glob_descr'] ); ?></textarea>  
			  <p class="help-block"></p> 
            </div>  
          </div>   
		
          <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Save Settings</button>  
          </div>  
        </fieldset>  

</form>

</div>


<?php 
}
?>