<?php

/*
* @package wc-recently viwed product
*/
if(! defined('ABSPATH')){
	exit;
}

if (! function_exists('subha_activation')) {
	function subha_activation(){
		//check
		if(get_option('subha_settings')){
               add_option('subha_settings', array(
               'subha_label'=>'Recently viewed products',
               'subha_numb_products'=> 4,
               'subha_in_shop_page' =>'',
               'subha_position'=>'after_related_product',
               'subha_in_cart_page' =>'enable'
             ));
		}
	}
}