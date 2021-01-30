<?php

/*
* @package wc-recently viwed product
*/
if(! defined('ABSPATH')){
	exit;
}



if(!class_exists('Rvps_save_settings')){
	class Rvps_save_settings{
		public function rvps_save_admin_field_settings(){
                check_admin_referer('rvps_save_seetings_fields_verify');
                 if(!current_user_can('manage_options')){
                	wp_die('you are not allowed to settings');
                 }

                 $subha_label = sanitize_text_field($_POST['subha_label']);
                 $subha_numb_products = sanitize_text_field($_POST['subha_numb_products']);
                 $subha_in_shop_page =sanitize_text_field($_POST['subha_in_shop_page']);
                 $subha_in_cart_page=sanitize_text_field($_POST['subha_in_cart_page']);
                 $subha_position = sanitize_text_field($_POST['subha_position']);
                 
                 $values=array(
                    'subha_label'=>$subha_label,
                    'subha_numb_products'=>$subha_numb_products,
                    'subha_in_shop_page' =>$subha_in_shop_page,
                    'subha_in_cart_page' => $subha_in_cart_page,
                    'subha_position'=> $subha_position
                 );
                  update_option('subha_settings',$values);
                 if (!isset($subha_label) || empty($subha_label) || $subha_label=='') {
                    wp_redirect(get_admin_url().'admin.php?page=subha_settings&error='.urlencode('settings error'));
                    exit();
                 }
                 wp_redirect(get_admin_url().'admin.php?page=subha_settings&success='.urlencode('settings saved'));
                 exit();
		}
	}
}