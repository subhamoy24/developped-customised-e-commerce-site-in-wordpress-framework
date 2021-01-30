<?php
/*
plugin name:Wc-recently-viewed-products
version:1.0.1
author:ser
Text Domain:subha
*/
//make sure we dont exposew any info directly
if (!function_exists('add_action') ) 
{
	echo 'Not allowed to call directly';
	exit;
}
/*========================
cheack wordpress versioon
===========================
*/
if (version_compare(get_bloginfo('version'),'4.0','<')) {
	$mesagge='Need wordpress version higer';
	die($mesagge);
}
/****
CONSTANTS
****/
define('SUBHA_PATH', plugin_dir_path(__FILE__));
define('SUBHA_URI', plugin_dir_url(__FILE__));

if(in_array('woocommerce/woocommerce.php',apply_filters('active_plugins',get_option('active_plugins'))))
{
   if(!class_exists('SUBHA_CORE'))
   {
   	   class SUBHA_CORE{
   	   	public function __construct(){

           require(SUBHA_PATH.'/includes/activation.php');


           require(SUBHA_PATH.'/views/admin/setting_page.php');


           require(SUBHA_PATH.'/classes/Rvps_setting_page.php');
           
           require(SUBHA_PATH.'/classes/Rvps_save_settings.php');
           require(SUBHA_PATH.'/classes/Rvps.php');
           require(SUBHA_PATH.'/classes/Rvps_view.php');
           require(SUBHA_PATH.'/views/frontent/Rvps_product_view.php');


           register_activation_hook(__FILE__,'subha_activation');
           add_action('init', array( new Rvps(),'rvps_start_session'),10);
           add_action('init', array( new Rvps(),'rvps_init_session'),15);
           add_action('wp', array( new Rvps(),'rvps_update_products'));
           add_action('admin_menu', array( new Rvps_setting_page(),'rvps_create_setting_page'));
           add_action('admin_post_rvps_save_seetings_fields', array( new Rvps_save_settings(),'rvps_save_admin_field_settings'));
           add_action('woocommerce_after_single_product_summary',array( new Rvps_view(),'rvps_show_after_related_product'),25);
           add_action('woocommerce_after_single_product_summary',array( new Rvps_view(),'rvps_show_before_related_product'),19);
            add_action('woocommerce_after_shop_loop',array( new Rvps_view(),'rvps_show_in_shop_page'),23);
            add_action('woocommerce_after_cart_collaterals',array( new Rvps_view(),'rvps_show_in_cart_page'),23);





   	   	}

   	   }
   	   $SUBHA_CORE= new SUBHA_CORE();
   }
}
/*function test_test(){
        rvps_products_view();
}add_action('wp_footer','test_test');
