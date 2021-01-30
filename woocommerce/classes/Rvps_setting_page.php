<?php

/*
* @package wc-recently viwed product
*/
if(! defined('ABSPATH')){
	exit;
}

if(!class_exists('Rvps_setting_page')){
	class Rvps_setting_page{
		public function rvps_create_setting_page(){
		       add_submenu_page('woocommerce',__('Wc Recently viewed products','subha'),__('Wc Recently viewed products','subha'),'manage_options','subha_settings','rvps_setting_page_callback');
		}
	}
}