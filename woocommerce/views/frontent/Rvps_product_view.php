<?php

/*
* @package wc-recently viwed product
*/
if(! defined('ABSPATH')){
	exit;
}

if (!function_exists('rvps_products_view')) {
	function rvps_products_view($col_num =0,$products_num =0){
		$products=new Rvps();
		$products_ids=$products->rvps_get_products();
		if(!$products_ids){
			return false;
		}
		if(count($products_ids)<=0){
			return false;
		}
		$rvps_settings=get_option('subha_settings');

		if ($products_num==0) {
			$num_of_display_products=isset($rvps_settings['subha_numb_products'])? $rvps_settings['subha_numb_products']:4;
		}else{
			$num_of_display_products=$products_num;
		}
		if(count($products_ids)>$num_of_display_products){
               $ids=array_slice($products_ids,-1*$num_of_display_products, $num_of_display_products, true);
		}else{
			$ids=$products_ids;
		}

		$the_query= new WP_Query(array(
             'post_type'=>'product',
             'post_status'=>'publish',
             'post__in'=> array_reverse($ids),
             'orderby'=>'post__in'
		));

		if ($the_query->have_posts()) {
	            echo '<div class="ptoducts">';
	            echo '<h2>'.(isset($rvps_settings['subha_label'])?$rvps_settings['subha_label']:''). '</h2>';
	            if ($col_num==0) {
	            	$col=4;
	            }else{
	            	$col=$col_num;
	            }

	            echo '<ul class="products columns-'.$col.'">';
	            while($the_query->have_posts()){
                       $the_query->the_post();
                       wc_get_template_part('content','product');
	            }
	            echo '</ul>';
	            echo '</div>';
	            wp_reset_postdata();
		}else{
			return false;
		}
	}
}