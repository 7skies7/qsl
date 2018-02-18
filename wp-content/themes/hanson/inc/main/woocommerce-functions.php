<?php

//show pruducts per page
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20);
function new_loop_shop_per_page(){
	return 4;
}

//remove result count on archieve page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
