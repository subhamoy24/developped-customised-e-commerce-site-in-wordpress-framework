<?php

/*
* @package wc-recently viwed product
*/
if(! defined('ABSPATH')){
	exit;
}

if(!class_exists('Rvps_view')){
  class Rvps_view{
       public function rvps_show_after_related_product(){
       	$rvps_settings=get_option('subha_settings');
         
         if (!isset($rvps_settings['subha_position'])) {

         	return;
         }
          if ($rvps_settings['subha_position']!='after_related_products') {
         	return;
         }
         if(rvps_products_view()){
         	rvps_products_view();
         }
       }
        public function rvps_show_before_related_product(){
       	$rvps_settings=get_option('subha_settings');
         
         if (!isset($rvps_settings['subha_position'])) {
         	return;
         }
          if ($rvps_settings['subha_position']!='before_related_products') {
         	return;
         }
         if(rvps_products_view()){
         	rvps_products_view();
         }
     }
     public function rvps_show_in_shop_page(){
     	$rvps_settings=get_option('subha_settings');
         
         if (!isset($rvps_settings['subha_in_shop_page'])) {
         	return;
         }
          if ($rvps_settings['subha_in_shop_page']!=='enabled') {
         	return;

     }
     if(rvps_products_view()){
         	rvps_products_view();
         }
}
 public function rvps_show_in_cart_page(){
     	$rvps_settings=get_option('subha_settings');
         
         if (!isset($rvps_settings['subha_in_cart_page'])) {
         	return;
         }
          if ($rvps_settings['subha_in_cart_page']!=='enabled') {
         	return;

     }
     if(rvps_products_view()){
         	rvps_products_view();
         }
}
}
}