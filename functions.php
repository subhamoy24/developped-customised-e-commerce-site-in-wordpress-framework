<?php

//display title and tag in header

add_theme_support("title-tag");


//wp_enqueue scripts

function ecmom_scripts(){
	//for syle
	wp_enqueue_style('bootstrap_css',get_theme_file_uri('/assets/css/bootstrap.min.css'),array(),'v3.2.0');
	wp_enqueue_style('main_css',get_theme_file_uri('/assets/css/main.css'),array(),'v3.2.0');
	wp_enqueue_style('blue',get_theme_file_uri('/assets/css/blue.css'),array(),'v3.2.0');
	wp_enqueue_style('owl.carousel',get_theme_file_uri('/assets/css/owl.carousel.css'),array(),'v3.2.0');
	wp_enqueue_style('animate',get_theme_file_uri('/assets/css/animate.min.css'),array(),'v3.2.0');
	wp_enqueue_style('rateit',get_theme_file_uri('/assets/css/rateit.css'),array(),'v3.2.0');
	wp_enqueue_style('bootstrap_select',get_theme_file_uri('/assets/css/bootstrap-select.min.css'),array(),'v3.2.0');
	wp_enqueue_style('font_awesome',get_theme_file_uri('/assets/css/font-awesome.css'),array(),'v3.2.0');
	wp_enqueue_style('font_awesome',get_theme_file_uri('/assets/css/font-awesome.css'),array(),'v3.2.0');
		wp_enqueue_style('woocommece',get_theme_file_uri('/assets/css/woocommece.css'),array(),'v3.2.0');
	wp_enqueue_style('stylesheet',get_stylesheet_uri());


	//for scripts
	//
	wp_enqueue_script('main_js',get_theme_file_uri('/assets/js/jquery-1.11.1.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('bootstrap',get_theme_file_uri('/assets/js/bootstrap.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('dropdown',get_theme_file_uri('/assets/js//bootstrap-hover-dropdown.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('carousel',get_theme_file_uri('/assets/js/owl.carousel.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('echo',get_theme_file_uri('/assets/js/echo.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('easing',get_theme_file_uri('/assets/js/jquery.easing-1.3.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('slider',get_theme_file_uri('/assets/js/bootstrap-slider.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('rateit',get_theme_file_uri('/assets/js/jquery.rateit.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('lightbox',get_theme_file_uri('/assets/js/lightbox.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('select',get_theme_file_uri('/assets/js/bootstrap-select.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('wow',get_theme_file_uri('/assets/js/wow.min.js'),array(),' v1.11.1',true);
	wp_enqueue_script('scripts',get_theme_file_uri('/assets/js/scripts.js'),array(),' v1.11.1',true);

}
add_action('wp_enqueue_scripts','ecmom_scripts');





/*
Register Menu support
 */ 

  function new_theme_default_function(){
     	

     		add_theme_support("post-thumbnails");
       //menu register
       register_nav_menus(array('top-menu' =>'Top Menu' , 'main-menu'=>'Main Menu'));

     }
     add_action('after_setup_theme','new_theme_default_function');

/*Image support*/

// add_theme_support('post-thumbnails',array('post','page'));
// set_post_thumbnail_size(300,200,true);
// add_image_size('myFeatureImage',1360,768,true);

/**
 * Widget Support
 */

function ecom_widgets(){
	register_sidebar(array(
		'name'          => esc_html__('Footer Widget one','ecom'),
		'description'   => esc_html__('This is description area for footer widget','ecom'),
		'id'            => 'footer_widget_one',
		'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3">',
		'after_widget' => '</div>',
		'before_title' => '<div class="module-heading"><h4 class="module-title">',
		'after_title'  => '</h4></div>',

	));
	register_sidebar(array(
		'name'          => esc_html__('Footer Widget two','ecom'),
		'description'   => esc_html__('This is description area for footer widget','ecom'),
		'id'            => 'footer_widget_two',
		'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3">',
		'after_widget' => '</div>',
		'before_title' => '<div class="module-heading"><h4 class="module-title">',
		'after_title'  => '</h4></div>',

	));


	register_sidebar(array(
		'name'          => esc_html__('Siderbar Widget','ecom'),
		'description'   => esc_html__('This is description area for footer widget','ecom'),
		'id'            => 'sideber_widget',
		'before_widget' => '<div class="side-menu animate-dropdown outer-bottom-xs">',
		'after_widget' => '</div>',
		'before_title' => '<div class="head"><i class="icon fa fa-align-justify fa-fw"></i>',
		'after_title'  => '</div>',

	));
}
add_action('widgets_init','ecom_widgets');

//woocommerce theme support

function ecmom_woocommerce_support(){
	add_theme_support('woocommerce');
}
add_action("after_setup_theme","ecmom_woocommerce_support");

/**
 * Remove the breadcrumbs 
 */
 
 function woo_remove_breadcurms(){
     remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20,0);
 }
add_action('init','woo_remove_breadcurms');

/**
 * Change number or products per row to 3
 */

if(!function_exists('loop_columns_3')){
	function loop_columns_3(){
		return 3;// return 3 pruducts
	}

}
add_filter('loop_shop_columns','loop_columns_3');
function ecom_woocommerce_breadcrum(){
	return array( 
     'delimiter'=>'&#47;',
     'wrap_before'=>'<div class="breadcrumb-inner"><ul class+"list-inline list-unstyled">',
     'wrap_after'=>'</ul></div>',
     'before'=>'   ',
     'after'=>'   ',
     'home'=>_x('Home','breadcrum','woocommerce'),
	);
}
add_filter('woocommerce_breadcrumb_defaults','ecom_woocommerce_breadcrum');

 function ecom_remove_show_results(){
     remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
 }
add_action('init','ecom_remove_show_results');

 function ecom_remove_ordering(){
     remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
 }
add_action('init','ecom_remove_ordering');

 function ecom_remove_pagination(){
     remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);
 }
add_action('init','ecom_remove_pagination');

function ecom_pagination(){
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) return; 

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
	    'base'    	=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format'  	=> '?paged=%#%',
	    'current' 	=> max( 1, get_query_var('paged') ),
	    'total'   	=> $wp_query->max_num_pages,
	    'type'    	=> 'array',
	    'prev_next' => true,
		'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
		'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
	) );
	
	if( is_array( $pages ) ) {
	    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	    echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
	    foreach ( $pages as $page ) {
	            echo "<li>$page</li>";
	    }
	   echo '</ul></div>';
    }
}
function ecom_woocommerce_catalog_page_ordering() {
?>
<?php echo '<div class="lbl-cnt"> <span class="lbl">Show' ?>
    <form action="" method="POST" name="results" class="woocommerce-ordering">
    <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
<?php
 
//Get products on page reload
if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
          } else {
        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
          }
 
//  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.
			$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
			//Add as many of these as you like, -1 shows all products per page
			  //  ''       => __('Results per page', 'woocommerce'),
				'20' 		=> __('20', 'woocommerce'),
				'-1' 		=> __('All', 'woocommerce'),
			));

		foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
			echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
?>
</select>
</form>

<?php echo ' </span></div>' ?>
<?php
}
 
// now we set our cookie if we need to
function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}
 
add_filter('loop_shop_per_page','dl_sort_by_page');
function ecom_add_remove_funtion(){
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
	add_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',50);
	add_action('woocommerce_single_product_summary',array( new Rvps_view(),'rvps_show_after_related_product',50));
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
	add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',45);
}
add_action('init' ,'ecom_add_remove_funtion');
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);