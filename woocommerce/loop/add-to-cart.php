<?php
/**
 * Loop Add to Cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( ' <div class="cart clearfix animate-effect">
       <div class="action">
               <ul class="list-unstyled">                                              
                  <li class="add-cart-button btn-group">
                       <a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>       
                   </li>

                                                    <li class="lnk wishlist">
                                                                    <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                                                </li>
                                                                <li class="lnk">
                                                                    <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a>
                                                                </li>
                              
              </ul>
       </div>
                                       <!-- /.action -->
</div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->product_type ),
		esc_html( $product->add_to_cart_text() )
	),
$product );
