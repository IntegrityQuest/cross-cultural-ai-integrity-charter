<?php

	if(is_page()){
		 get_template_part( 'inc/page-header/breadcrumbs' );
	}
	if(is_singular('teams')){
		get_template_part( 'inc/page-header/breadcrumbs-team' );
	}
	if(is_singular('portfolios')){
		get_template_part( 'inc/page-header/breadcrumbs-portfolio' );
	}
	
	if(is_singular('services')){
		get_template_part( 'inc/page-header/breadcrumbs-service' );
	}

	if(is_singular('post')){
		get_template_part( 'inc/page-header/breadcrumbs-single' );
	}

	if(is_home() && !is_front_page() || is_home() && is_front_page()){
		get_template_part( 'inc/page-header/breadcrumbs-blog' );
	}
	if(is_archive()){		
		if((class_exists( 'WooCommerce' ) && is_shop()) || (class_exists( 'WooCommerce' ) && is_product_category()) || (class_exists( 'WooCommerce' ) && is_product_tag()) ) {		
			get_template_part( 'inc/page-header/breadcrumbs-shop');		
		}
		else{
			get_template_part( 'inc/page-header/breadcrumbs-archive');
		}		
	}	
	if(is_search()){
		get_template_part( 'inc/page-header/breadcrumbs-search');
	}
	if ( class_exists( 'WooCommerce' ) ) {		
		if(is_product('product')){
			get_template_part( 'inc/page-header/breadcrumbs-shop-single' );
		}	
	}	
?>