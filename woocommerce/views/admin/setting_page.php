<?php

/*
* @package wc-recently viwed product
*/
if(! defined('ABSPATH')){
	exit;
}
function rvps_setting_page_callback(){
	?>
<div id="wpbody" role="main">

  <div id="wpbody-content" aria-label="Main content" tabindex="0">
		
   <div class="wrap">
     <h1><?php _e('Wc Recently viewed products','subha');?></h1>
     <?php
        if (isset($_GET['success'])) {
        	echo urldecode($_GET['success']);
        }
        if (isset($_GET['error'])) {
        	echo urldecode($_GET['error']);
        }
        
     ?>
<table class="form-table">
	<tbody>
    <form method="post" action="admin-post.php" novalidate="novalidate">
    	<input type="hidden" name="action" value="rvps_save_seetings_fields"/>
    	<?php wp_nonce_field('rvps_save_seetings_fields_verify');
                   $settings=get_option('subha_settings');
    	?>
    	<tr>
    		<th>
    			<label for="subha_label"><?php _e('recently viewed product lable','subha')?></label>
    		</th>
    		<td>
    			<input id="subha_label" name="subha_label" value="<?php if(isset($settings['subha_label'])){ echo $settings['subha_label'];}?>" type="text" required="">
    		</td>
    	</tr>
    	<tr>
    		<th>
    			<label for="subha_numb_products"><?php _e('numb of recently viewed product lable','subha')?></label>
    		</th>
    		<td>
    			<input id="subha_numb_products" name="subha_numb_products" value="<?php if(isset($settings['subha_numb_products'])){ echo $settings['subha_numb_products'];}?>" type="number" required="">
    		</td>
    	</tr>
    	<tr>
    		<th>
    			<label for="subha_in_shop_page"><?php _e('in shop page recently viewed product lable','subha');?></label>
    		</th>
    		<td>
    			<input <?php if(isset($settings['subha_in_shop_page'])){if($settings['subha_in_shop_page']=='enabled'){ echo 'checked';}}?> id="subha_in_shop_page" name="subha_in_shop_page" value="enabled" type="checkbox" required=""/>
    		</td>
    	</tr>
    	<tr>
    		<th>
    			<label for="subha_in_cart_page"><?php _e('in cart page recently viewed product lable','subha');?></label>
    		</th>
    		<td>
    			<input <?php if(isset($settings['subha_in_cart_page'])){if($settings['subha_in_cart_page']=='enabled'){ echo 'checked';}}?> id="subha_in_cart_page" name="subha_in_cart_page" value="enabled" type="checkbox" required=""/>
    		</td>
    	</tr>
    	<tr>
    		<th>
    			<label for="subha_position"><?php _e('possition of recently viewed product lable','subha')?></label>
    		</th>
    		<td>
    			<input <?php if(isset($settings['subha_position'])){ if($settings['subha_position']=='before_related_products'){echo 'checked';}}?> id="subha_position" name="subha_position" value="before_related_products" type="radio" required=""/><span><?php _e('Before related product','subha');?></span>
    			<input <?php if(isset($settings['subha_position'])){ if($settings['subha_position']=='after_related_products'){echo 'checked';}}?> id="subha_position" name="subha_position" value="after_related_products" type="radio" required=""/><span><?php _e('Aeter related product','subha');?></span>
    			
    		</td>
    	</tr>
    	<tr>
    		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="save change"></p>
    	</tr>

    </form>
</tbody>
</table>

</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div>
	<?php
}