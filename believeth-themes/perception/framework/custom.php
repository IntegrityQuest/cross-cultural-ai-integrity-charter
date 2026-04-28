<?php
/*
dynamic css file. please don't edit it. it's update automatically when settins changed
*/
add_action('wp_head', 'perceptron_custom_colors', 160);
function perceptron_custom_colors() { 
global $perceptron_option;	
/***styling options
------------------*/
	if(!empty($perceptron_option['body_bg_color']))
	{
	 $body_bg          = $perceptron_option['body_bg_color'];
	}	
	$body_color       = $perceptron_option['body_text_color'];	
	$site_color       = $perceptron_option['primary_color'];
	$secondary_color  = $perceptron_option['secondary_color'];
	$link_color       = $perceptron_option['link_text_color'];	
	$link_hover_color = $perceptron_option['link_hover_text_color'];	
	$footer_bgcolor   = $perceptron_option['footer_bg_color'];

	if(!empty($perceptron_option['menu_text_color'])){		
	$menu_text_color         = $perceptron_option['menu_text_color'];
	}
	if(!empty($perceptron_option['menu_text_hover_color'])){		
	$menu_text_hover_color   = $perceptron_option['menu_text_hover_color'];
	}
	if(!empty($perceptron_option['menu_text_active_color'])){		
	$menu_active_color       = $perceptron_option['menu_text_active_color'];
	}	
	if(!empty($perceptron_option['menu_text_hover_bg'])){		
	$menu_text_hover_bg      = $perceptron_option['menu_text_hover_bg'];
	}
	if(!empty($perceptron_option['menu_text_active_bg'])){		
	$menu_text_active_bg     = $perceptron_option['menu_text_active_bg'];
	}
	
	if(!empty($perceptron_option['drop_text_color'])){		
	$dropdown_text_color     = $perceptron_option['drop_text_color'];
	}
	
	if(!empty($perceptron_option['drop_text_hover_color'])){		
	$drop_text_hover_color   = $perceptron_option['drop_text_hover_color'];
	}			
	
	if(!empty($perceptron_option['drop_text_hoverbg_color'])){		
	$drop_text_hoverbg_color = $perceptron_option['drop_text_hoverbg_color'];
	}
	
	if(!empty($perceptron_option['drop_down_bg_color'])){		
		$drop_down_bg_color = $perceptron_option['drop_down_bg_color'];
	}	
	
	$rs_top_style = get_post_meta(get_the_ID(), 'topbar-color', true);
    if($rs_top_style =='toplight' || $rs_top_style==''){
		$toolbar_bg    = $perceptron_option['toolbar_bg_color'];
		$toolbar_text  = $perceptron_option['toolbar_text_color'];
		$toolbar_link  = $perceptron_option['toolbar_link_color'];
		$toolbar_hover = $perceptron_option['toolbar_link_hover_color'];
	} else{
		$toolbar_bg    = $perceptron_option['toolbar_bg_color2'];
		$toolbar_text  = $perceptron_option['toolbar_text_color2'];
		$toolbar_link  = $perceptron_option['toolbar_link_color2'];
		$toolbar_hover = $perceptron_option['toolbar_link_hover_color2'];
    }

	//typography extract for body
	
	if(!empty($perceptron_option['opt-typography-body']['color']))
	{
		$body_typography_color=$perceptron_option['opt-typography-body']['color'];
	}
	if(!empty($perceptron_option['opt-typography-body']['line-height']))
	{
		$body_typography_lineheight=$perceptron_option['opt-typography-body']['line-height'];
	}
		
	$body_typography_font      =$perceptron_option['opt-typography-body']['font-family'];
	$body_typography_font_size =$perceptron_option['opt-typography-body']['font-size'];

	//typography extract for menu
	$menu_typography_color       =$perceptron_option['opt-typography-menu']['color'];	
	$menu_typography_weight      =$perceptron_option['opt-typography-menu']['font-weight'];	
	$menu_typography_font_family =$perceptron_option['opt-typography-menu']['font-family'];
	$menu_typography_font_fsize  =$perceptron_option['opt-typography-menu']['font-size'];
		
	if(!empty($perceptron_option['opt-typography-menu']['line-height']))
	{
		$menu_typography_line_height=$perceptron_option['opt-typography-menu']['line-height'];
	}
	
	//typography extract for heading
	
	$h1_typography_color=$perceptron_option['opt-typography-h1']['color'];		
	if(!empty($perceptron_option['opt-typography-h1']['font-weight']))
	{
		$h1_typography_weight=$perceptron_option['opt-typography-h1']['font-weight'];
	}
		
	$h1_typography_font_family=$perceptron_option['opt-typography-h1']['font-family'];
	$h1_typography_font_fsize=$perceptron_option['opt-typography-h1']['font-size'];	
	if(!empty($perceptron_option['opt-typography-h1']['line-height']))
	{
		$h1_typography_line_height=$perceptron_option['opt-typography-h1']['line-height'];
	}
	
	$h2_typography_color=$perceptron_option['opt-typography-h2']['color'];	

	$h2_typography_font_fsize=$perceptron_option['opt-typography-h2']['font-size'];	
	if(!empty($perceptron_option['opt-typography-h2']['font-weight']))
	{
		$h2_typography_font_weight=$perceptron_option['opt-typography-h2']['font-weight'];
	}	
	$h2_typography_font_family=$perceptron_option['opt-typography-h2']['font-family'];
	$h2_typography_font_fsize=$perceptron_option['opt-typography-h2']['font-size'];	
	if(!empty($perceptron_option['opt-typography-h2']['line-height']))
	{
		$h2_typography_line_height=$perceptron_option['opt-typography-h2']['line-height'];
	}
	
	$h3_typography_color=$perceptron_option['opt-typography-h3']['color'];	
	if(!empty($perceptron_option['opt-typography-h3']['font-weight']))
	{
		$h3_typography_font_weightt=$perceptron_option['opt-typography-h3']['font-weight'];
	}	
	$h3_typography_font_family=$perceptron_option['opt-typography-h3']['font-family'];
	$h3_typography_font_fsize=$perceptron_option['opt-typography-h3']['font-size'];	
	if(!empty($perceptron_option['opt-typography-h3']['line-height']))
	{
		$h3_typography_line_height=$perceptron_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color=$perceptron_option['opt-typography-h4']['color'];	
	if(!empty($perceptron_option['opt-typography-h4']['font-weight']))
	{
		$h4_typography_font_weight=$perceptron_option['opt-typography-h4']['font-weight'];
	}	
	$h4_typography_font_family=$perceptron_option['opt-typography-h4']['font-family'];
	$h4_typography_font_fsize=$perceptron_option['opt-typography-h4']['font-size'];	
	if(!empty($perceptron_option['opt-typography-h4']['line-height']))
	{
		$h4_typography_line_height=$perceptron_option['opt-typography-h4']['line-height'];
	}
	
	$h5_typography_color=$perceptron_option['opt-typography-h5']['color'];	
	if(!empty($perceptron_option['opt-typography-h5']['font-weight']))
	{
		$h5_typography_font_weight=$perceptron_option['opt-typography-h5']['font-weight'];
	}	
	$h5_typography_font_family=$perceptron_option['opt-typography-h5']['font-family'];
	$h5_typography_font_fsize=$perceptron_option['opt-typography-h5']['font-size'];	
	if(!empty($perceptron_option['opt-typography-h5']['line-height']))
	{
		$h5_typography_line_height=$perceptron_option['opt-typography-h5']['line-height'];
	}
	
	$h6_typography_color=$perceptron_option['opt-typography-6']['color'];	
	if(!empty($perceptron_option['opt-typography-6']['font-weight']))
	{
		$h6_typography_font_weight=$perceptron_option['opt-typography-6']['font-weight'];
	}
	$h6_typography_font_family=$perceptron_option['opt-typography-6']['font-family'];
	$h6_typography_font_fsize=$perceptron_option['opt-typography-6']['font-size'];	
	if(!empty($perceptron_option['opt-typography-6']['line-height']))
	{
		$h6_typography_line_height=$perceptron_option['opt-typography-6']['line-height'];
	}
	
?>

<!-- Typography -->
<?php if(!empty($body_color)){
	global $perceptron_option;
?>

<style>
	
	<?php if(!empty($perceptron_option['copyright_bg']))
		{
			$copyright_bg = $perceptron_option['copyright_bg'];
		?>
		.footer-bottom{
			background:<?php echo esc_attr($copyright_bg); ?> !important;
		}
	<?php } ?>
	
	body{
		background:<?php echo esc_attr($body_bg); ?>;
		color:<?php echo esc_attr($body_color); ?> !important;
		font-family: <?php echo esc_attr($body_typography_font);?> !important;    
	    font-size: <?php echo esc_attr($body_typography_font_size);?> !important;
	}

	<?php if(!empty($perceptron_option['team_single_bg_color']))
		{
			$team_single_bg_color = $perceptron_option['team_single_bg_color'];
		?>
		body.single-teams{
			background:<?php echo esc_attr($team_single_bg_color); ?>;
		}
	<?php } ?>
	

	.fullwidth-services-box .services-style-2{
		box-shadow: 0 0 20px <?php echo esc_attr( $secondary_color); ?>;
	}	



	h1{
		color:<?php echo esc_attr($h1_typography_color);?>;
		font-family:<?php echo esc_attr($h1_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h1_typography_font_fsize);?>!important;
		<?php if(!empty($h1_typography_weight)){
		?>
		font-weight:<?php echo esc_attr($h1_typography_weight);?>!important;
		<?php }?>
		
		<?php if(!empty($h1_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h1_typography_line_height);?>!important;
		<?php }?>		
	}

	h2{
		color:<?php echo esc_attr($h2_typography_color);?>; 
		font-family:<?php echo esc_attr($h2_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
		<?php if(!empty($h2_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h2_typography_font_weight);?>!important;
		<?php }?>
		
		<?php if(!empty($h2_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h2_typography_line_height);?>
		<?php }?>
	}

	h3{
		color:<?php echo esc_attr($h3_typography_color);?> ;
		font-family:<?php echo esc_attr($h3_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
		<?php if(!empty($h3_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h3_typography_font_weight);?>!important;
		<?php }?>
		
		<?php if(!empty($h3_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h3_typography_line_height);?>!important;
		<?php }?>
	}

	h4{
		color:<?php echo esc_attr($h4_typography_color);?>;
		font-family:<?php echo esc_attr($h4_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;
		<?php if(!empty($h4_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h4_typography_font_weight);?>!important;
		<?php }?>		
		<?php if(!empty($h4_typography_line_height)){		?>
			line-height:<?php echo esc_attr($h4_typography_line_height);?>!important;
		<?php }?>		
	}

	h5{
		color:<?php echo esc_attr($h5_typography_color);?>;
		font-family:<?php echo esc_attr($h5_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;
		<?php if(!empty($h5_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h5_typography_font_weight);?>!important;
		<?php }?>		
		<?php if(!empty($h5_typography_line_height)){
		?>
		line-height:<?php echo esc_attr($h5_typography_line_height);?>!important;
		<?php }?>
	}

	h6{
		color:<?php echo esc_attr($h6_typography_color);?> ;
		font-family:<?php echo esc_attr($h6_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;
		<?php if(!empty($h6_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h6_typography_font_weight);?>!important;
		<?php }?>		
		<?php if(!empty($h6_typography_line_height)){		?>
			line-height:<?php echo esc_attr($h6_typography_line_height);?>!important;
		<?php }?>
	}

	.menu-area .navbar ul li > a{
		font-weight:<?php echo esc_attr($menu_typography_weight); ?>;
		font-family:<?php echo esc_attr($menu_typography_font_family); ?>;
	}

	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li,
	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a, 
	#rs-header .toolbar-area .toolbar-contact ul li a,
	#rs-header .toolbar-area .toolbar-contact ul li, #rs-header .toolbar-area{
		color:<?php echo esc_attr($toolbar_text); ?>;
	}

	<?php
		if(!empty($perceptron_option['transparent_toolbar_text_color'])){?>
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li,
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li i,
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li a,
			#rs-header.header-style-4 .btn_quote .toolbar-sl-share ul li a
			{
				color: <?php echo esc_attr($perceptron_option['transparent_toolbar_text_color']);?>
			}
		<?php } 
	?>

	<?php
		if(!empty($perceptron_option['transparent_toolbar_link_hover_color'])){?>
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li:hover a,
			#rs-header.header-style-4 .btn_quote .toolbar-sl-share ul li a:hover{
			color: <?php echo esc_attr($perceptron_option['transparent_toolbar_link_hover_color']);?>
		}
		<?php } 
	?>	

	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a,
	#rs-header .toolbar-area .toolbar-contact ul li a,
	#rs-header .toolbar-area .toolbar-contact ul li i,
	#rs-header .toolbar-area .toolbar-sl-share ul li a i{
		color:<?php echo esc_attr($toolbar_link); ?>;
	}
	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a:hover,
	#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons:hover,
	#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons:before,
	#rs-header .toolbar-area .toolbar-contact ul li a:hover, 
	#rs-header .toolbar-area .toolbar-sl-share ul li a i:hover{
		color:<?php echo esc_attr($toolbar_hover); ?>;
	}
	#rs-header .toolbar-area{
		background:<?php echo esc_attr($toolbar_bg); ?>;
	}

	
	.mobile-menu-container div ul > li.current_page_parent > a,
	#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor a, 
	#rs-header.header-transparent .menu-area .navbar ul li.current_page_item a,
	.menu-area .navbar ul.menu > li.current_page_item > a,
		
	.menu-area .navbar ul li.current-menu-ancestor a, .menu-area .navbar ul li.current_page_item a,
	.menu-area .navbar ul li ul.sub-menu > li.menu-item-has-children > a:before
	{
		color: <?php echo esc_attr( $menu_active_color ); ?>
	}

	.menu-area .navbar ul li:hover a:before{
		color: <?php echo esc_attr( $menu_active_color ); ?>;
	}

	.menu-area .navbar ul li:hover > a,	
	.mobile-menu-container div ul li a:hover,	
	#rs-header.header-style5 .header-inner .menu-area .navbar ul li:hover > a,
	#rs-header.header-style5 .header-inner .menu-area .navbar ul li.current-menu-item a,
	#rs-header.header-style5 .header-inner.menu-sticky.sticky .menu-area .navbar ul li:hover > a,
	#rs-header.header-style-4 .menu-area .menu li:hover > a,
	#rs-header.header-style-3.header-style-2 .sticky-wrapper .menu-area .navbar ul li:hover > a
	{
		color: <?php echo esc_attr( $menu_text_hover_color ); ?>;
	}

	.menu-area .navbar ul li a,
	#rs-header .menu-responsive .sidebarmenu-search .sticky_search,	
	.menu-cart-area i, #rs-header.header-transparent .menu-area.dark .menu-cart-area i
	{
		color: <?php echo esc_attr( $menu_text_color ); ?>; 
	}

	.menu-area .navbar ul li:hover a:before,
	.menu-area .navbar ul li ul.sub-menu > li:hover a:before{
		text-shadow: 10px 0 <?php echo esc_attr( $menu_active_color );?>, -10px 0 <?php echo esc_attr( $menu_active_color );?>;
	}

	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li.current_page_item > a::before, 
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li.current_page_item > a::after, 
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li > a::before,
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li > a::after,
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li > a,	
	#rs-header.header-transparent .menu-area.dark .menu-responsive .sidebarmenu-search .sticky_search .fa
	{
		color: <?php echo esc_attr( $menu_text_color ); ?> !important;
	}
	
	#rs-header.header-transparent .menu-area.dark ul.offcanvas-icon .nav-link-container .nav-menu-link span{
		background: <?php echo esc_attr( $menu_text_color ); ?> !important;
	}

	#rs-header.header-transparent .menu-area.dark ul.sidenav.offcanvas-icon .nav-link-container .nav-menu-link span{
		background: #fff !important;
	}

	<?php if(!empty($perceptron_option['transparent_menu_text_color'])) : ?>
		#rs-header.header-transparent .menu-area .navbar ul li a, 
		#rs-header.header-transparent .menu-cart-area i,
		#rs-header.header-transparent .menu-responsive .sidebarmenu-search .sticky_search,
		#rs-header.header-transparent .menu-responsive .sidebarmenu-search .sticky_search .fa,
		#rs-header.header-transparent .menu-area.dark .navbar ul > li > a,
		#rs-header.header-style5 .header-inner .menu-area .navbar ul li a,
		#rs-header.header-transparent .menu-area .navbar ul li:hover > a,
		#rs-header.header-style5 .menu-responsive .sidebarmenu-search .sticky_search,
		#rs-header.header-style5 .menu-cart-area i,
		#rs-header.header-style-3.header-style-2 .sticky-wrapper .menu-area .navbar ul li > a{
			color:<?php echo esc_attr($perceptron_option['transparent_menu_text_color']); ?> 
	}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['transparent_menu_text_color'])) : ?> 
		.header-style-4 .menu-cart-area span.icon-num, 
		.header-style5 .menu-cart-area span.icon-num
		{
			background: <?php echo esc_attr($perceptron_option['transparent_menu_text_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['menu_area_bg_color'])) : ?>
		#rs-header.header-style5 .header-inner .menu-area, 
		#rs-header.header-style-3.header-style-2 .sticky-wrapper .header-inner .box-layout{
		background:<?php echo esc_attr($perceptron_option['menu_area_bg_color']); ?> 
	}
	<?php endif; ?>

	

	<?php if(!empty($perceptron_option['transparent_menu_text_color'])) : ?>
		#rs-header.header-transparent .menu-area.dark ul.offcanvas-icon .nav-link-container .nav-menu-link span{
			background:<?php echo esc_attr($perceptron_option['transparent_menu_text_color']); ?> 
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['transparent_menu_hover_color'])) : ?>
		#rs-header.header-transparent .menu-area .navbar ul > li > a:hover,
		#rs-header.header-transparent .menu-area .navbar ul li:hover > a,
		#rs-header.header-transparent .menu-area.dark .navbar ul > li:hover > a,
		#rs-header.header-style-4 .header-inner .menu-area .navbar ul li:hover a,
		#rs-header.header-style-4 .menu-area .navbar ul li:hover a:before,
		#rs-header.header-style5 .header-inner .menu-area .navbar ul > li:hover a,
		#rs-header.header-style5 .header-inner .menu-area .navbar ul > li.current-menu-ancestor > a{
			color:<?php echo esc_attr($perceptron_option['transparent_menu_hover_color']); ?> 
		}
	<?php endif; ?>
	<?php if( !empty( $body_color)) : ?>
		.rs-footer.footerdark .footer-bottom .copyright p a:hover,
		.rs-footer.footerdark .footer-top .fa-ul li a:hover,
		.rs-footer.footerdark .footer-top .widget.widget_nav_menu ul li a:hover{
			color: <?php echo esc_attr( $body_color);?>
		}
	<?php endif;?>

	<?php if(!empty($perceptron_option['transparent_menu_hover_color'])) : ?>		
		#rs-header.header-style-4 .menu-area .navbar ul li:hover a:before,
		#rs-header.header-transparent .menu-area .navbar ul li:hover a:before{
			color:<?php echo esc_attr($perceptron_option['transparent_menu_hover_color']); ?>;
			text-shadow:10px 0 <?php echo esc_attr($perceptron_option['transparent_menu_hover_color']); ?>, -10px 0 <?php echo esc_attr($perceptron_option['transparent_menu_hover_color']); ?>;		
		}
	<?php endif; ?>	


	<?php if(!empty($perceptron_option['sticky_menu_text_hover_color'])) : ?>		
		#rs-header.header-style-4 .header-inner.sticky .menu-area .navbar ul li:hover a:before,
		#rs-header.header-transparent .header-inner.sticky .menu-area .navbar ul li:hover a:before{
			color:<?php echo esc_attr($perceptron_option['sticky_menu_text_hover_color']); ?>;
			text-shadow:10px 0 <?php echo esc_attr($perceptron_option['sticky_menu_text_hover_color']); ?>, -10px 0 <?php echo esc_attr($perceptron_option['sticky_menu_text_hover_color']); ?>;		
		}
	<?php endif; ?>



	<?php if(!empty($perceptron_option['transparent_menu_active_color'])) : ?>
		#rs-header.header-transparent .menu-area .navbar ul > li.current_page_item > a,
		#rs-header.header-style-4 .menu-area .menu > li.current-menu-ancestor > a,
		#rs-header.header-transparent .menu-area .navbar ul > li.current-menu-ancestor > a,
		#rs-header.header-style-4 .menu-area .menu > li.current_page_item > a{
			color:<?php echo esc_attr($perceptron_option['transparent_menu_active_color']); ?> !important; 
		}
	<?php endif; ?>

	#rs-header.header-transparent .menu-area .navbar ul.menu > li.current_page_item > a::before,
	#rs-header.header-transparent .menu-area .navbar ul.menu > li.current_page_item > a::after, 
	#rs-header.header-transparent .menu-area .navbar ul.menu > li > a::after{
		color:<?php echo esc_attr($perceptron_option['transparent_menu_active_color']); ?> !important; 
	}

	<?php if(!empty($perceptron_option['transparent_menu_text_color'])) : ?>		
		#rs-header.header-transparent ul.offcanvas-icon .nav-link-container .nav-menu-link span,
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span{
			background:<?php echo esc_attr($perceptron_option['transparent_menu_text_color']); ?> 
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['drop_text_color'])) : ?>
		.menu-area .navbar ul li .sub-menu li a,
		#rs-header .menu-area .navbar ul li.mega ul li a,
		#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a,
		#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor li a{
			color:<?php echo esc_attr($perceptron_option['drop_text_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['drop_text_hover_color'])) : ?>
		.menu-area .navbar ul li ul.sub-menu li.current_page_item > a,
		.menu-area .navbar ul li .sub-menu li a:hover,
		#rs-header .menu-area .navbar ul li.mega ul li a:hover,
		.menu-area .navbar ul li ul.sub-menu li:hover > a,
		.menu-area .navbar ul li ul.sub-menu li.current-menu-item > a,
		#rs-header.header-style5 .header-inner.menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a,
		#rs-header.header-style5 .header-inner.menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current_page_item > a,
		#rs-header.header-style5 .header-inner .menu-area .navbar ul li .sub-menu li:hover > a,
		#rs-header.header-style5 .header-inner .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a,
		#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li:hover > a,
		#rs-header.header-style-4 .menu-area .menu .sub-menu li:hover > a,
		#rs-header.header-style3 .menu-area .navbar ul li .sub-menu li:hover > a,
		#rs-header .menu-area .navbar ul li.mega ul li.current-menu-item a,
		.menu-sticky.sticky .menu-area .navbar ul li ul li a:hover,
		#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a, #rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current_page_item > a,
		#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor li a:hover{
			color:<?php echo esc_attr($perceptron_option['drop_text_hover_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['drop_down_bg_color'])) : ?>
		.menu-area .navbar ul li .sub-menu{
			background:<?php echo esc_attr($perceptron_option['drop_down_bg_color']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['toolbar_text_size'])) : ?>
		#rs-header .toolbar-area .toolbar-contact ul li,
		#rs-header .toolbar-area .toolbar-sl-share ul li a i:before{
			font-size:<?php echo esc_attr($perceptron_option['toolbar_text_size']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['menu_text_trasform'])) : ?>
		.menu-area .navbar ul > li > a,
		#rs-header .menu-area .navbar ul > li.mega > ul > li > a{
			text-transform:uppercase;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['menu_text_trasform2'])) : ?>
		.menu-area .navbar ul.sub-menu  li  a{
			text-transform:uppercase !important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['copyright_bg_border'])) : ?>
		.footer-bottom .container{
			border-color:<?php echo esc_attr($perceptron_option['copyright_bg_border']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['copyright_text_color'])) : ?>
		.footer-bottom .copyright p{
			color:<?php echo esc_attr($perceptron_option['copyright_text_color']); ?>;
		}
	<?php endif; ?>
     

	<?php if(!empty($perceptron_option['footer_text_size'])) : ?>
		.rs-footer, .rs-footer h3, .rs-footer a, 
		.rs-footer .fa-ul li a, 
		.rs-footer .widget.widget_nav_menu ul li a{
			font-size:<?php echo esc_attr($perceptron_option['footer_text_size']); ?>;
		}
	<?php endif; ?>	

	<?php if(!empty($perceptron_option['footer_title_color'])) : ?>
		.rs-footer, .rs-footer h3{
			color: <?php echo esc_attr($perceptron_option['footer_title_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['footer_h3_size'])) : ?>
		.rs-footer h3, .rs-footer .footer-top h3.footer-title{
			font-size:<?php echo esc_attr($perceptron_option['footer_h3_size']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['footer_link_size'])) : ?>
		.rs-footer a{
			font-size:<?php echo esc_attr($perceptron_option['footer_link_size']); ?>;
		}
	<?php endif; ?>	

	<?php if(!empty($perceptron_option['footer_text_color'])) : ?>
		.rs-footer, .rs-footer a, .rs-footer .fa-ul li a,
		.rs-footer .widget.widget_nav_menu ul li a,
		.rs-footer .footer-top input[type="email"]::placeholder
		{
			color:<?php echo esc_attr($perceptron_option['footer_text_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['footer_link_color'])) : ?>
		.rs-footer .widget.widget_nav_menu ul li a:hover,
		.rs-footer .fa-ul li a:hover,		
		.rs-footer .widget.widget_nav_menu ul li a:before,
		.rs-footer .widget.widget_pages ul li a:before, .rs-footer .widget.widget_recent_comments ul li:before, .rs-footer .widget.widget_archive ul li a:before, .rs-footer .widget.widget_categories ul li a:before,
		.rs-footer .widget.widget_pages ul li a:hover, .rs-footer .widget.widget_recent_comments ul li:hover, .rs-footer .widget.widget_archive ul li a:hover, .rs-footer .widget.widget_categories ul li a:hover,
		.rs-footer .widget a:hover{
			color:<?php echo esc_attr($perceptron_option['footer_link_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['foot_social_color'])) : ?>	
		ul.footer_social > li > a{
			color:<?php echo esc_attr($perceptron_option['foot_social_color']); ?> !important;
		}
		ul.fa-ul i{
			color:<?php echo esc_attr($perceptron_option['foot_social_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['foot_social_hover'])) : ?>	
		ul.footer_social > li > a:hover{
			color:<?php echo esc_attr($perceptron_option['foot_social_hover']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['footer_input_bg_color'])) : ?>
		.rs-footer .footer-top .mc4wp-form-fields input[type="submit"], .footer-logo-box::after{
			background:<?php echo esc_attr($perceptron_option['footer_input_bg_color']); ?>!important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['footer_input_hover_color'])) : ?>
		.rs-footer .footer-top .mc4wp-form-fields input[type="submit"]:hover{
			background:<?php echo esc_attr($perceptron_option['footer_input_hover_color']); ?>!important;
		}
	<?php endif; ?>
	
	<?php if(!empty($perceptron_option['footer_input_border_color'])) : ?>
		.rs-footer .footer-top .mc4wp-form-fields input[type="email"]{
			border-color:<?php echo esc_attr($perceptron_option['footer_input_border_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['footer_input_text_color'])) : ?>
		.rs-footer .footer-top .mc4wp-form-fields input[type="submit"],
		.rs-footer .footer-top .mc4wp-form-fields i{
			color:<?php echo esc_attr($perceptron_option['footer_input_text_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['copyright_borders'])) : ?>
		.footer-bottom{
			border-color:<?php echo esc_attr($perceptron_option['copyright_borders']); ?> 
		}
	<?php endif; ?>

	<?php if(!empty($site_color) && !empty($link_hover_color)) { ?>

		.rs-heading.style2 .title:after,
		.rs-footer .footer-top h3.footer-title:after{
			background: linear-gradient(90deg, <?php echo esc_attr($site_color); ?> 45%, <?php echo esc_attr($link_hover_color); ?> 60%);
		}
		.rs-video-2 .popup-videos:hover:before{
			background-image: linear-gradient(-41deg, <?php echo esc_attr($site_color); ?> 45%, <?php echo esc_attr($link_hover_color); ?> 60%);
		}

		.newsletter-box button:after,
		.price-btn .readon:after,
		body.search .entry-summary .blog-button a:hover:before,
		.comments-area .comment-list li.comment .reply a:hover{
			background-image: linear-gradient(41deg, <?php echo esc_attr($site_color); ?> , <?php echo esc_attr($link_hover_color); ?>);
		}

		.rs-portfolio .portfolio-slider .portfolio-item .portfolio-img:before,
		.newsletter-box button:before,
		ul.footer_social li a:before,
		.perceptron-processing-work .perceptron-work .single-work .work-icon i:before,
		.perceptron-processing-work .hover-pulse:hover:before,
		.perceptron-processing-work .perceptron-work .single-work .round-shape:after,
		#what-we-do .vc_tta-tabs .vc_tta-tab.vc_active a,
		.team-grid-style1 .team-item:after, .team-slider-style1 .team-item:after,
		.team-grid-style1 .team-item .detail-part .social-links ul li a i, .team-slider-style1 .team-item .detail-part .social-links ul li a i,
		.rs-services1 .services-wrap .services-item:hover,
		.gradient-bg,
		.bs-sidebar .widget_categories ul li:after,
		.price-btn .readon:before,
		body.wpb-js-composer .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title a,
	    body.wpb-js-composer .vc_tta.vc_general .vc_tta-panel .vc_tta-panel-title:hover a,
		body.search .entry-summary .blog-button a:before,
		.comments-area .comment-list li.comment .reply a,
		#cl-testimonial .testimonialvertical .slidervertical .item i:before,
		.woocommerce #respond input#submit, .woocommerce #respond input#submit.alt, .woocommerce .wc-forward, .woocommerce a.button, .woocommerce a.button.alt, .woocommerce button.button, .woocommerce button.button.alt, .woocommerce input.button, .woocommerce input.button.alt{
			background-image: linear-gradient(-41deg, <?php echo esc_attr($link_hover_color); ?>, <?php echo esc_attr($site_color); ?>);
		}

		.rs-video-2 i:before{
			background-image: linear-gradient(0deg, <?php echo esc_attr($site_color); ?> 45%, <?php echo esc_attr($link_hover_color); ?> 60%);
		}
		.rs-services1 .services-wrap .services-item .services-icon .glyph-icon:before{
			background-image: linear-gradient(0deg, <?php echo esc_attr($site_color); ?>, <?php echo esc_attr($link_hover_color); ?>);
		}

		.rs-contact .contact-address .address-item .address-icon i:before{
			background-image: linear-gradient(0deg, <?php echo esc_attr($site_color); ?>, <?php echo esc_attr($link_hover_color); ?>);
		}
	<?php } ?>

	.rs-heading .title-inner .sub-text,
	.team-grid-style1 .team-item .team-content1 h3.team-name a, .team-slider-style1 .team-item .team-content1 h3.team-name a:hover,
	.rs-services-default .services-wrap .services-item .services-icon i,	
	.rs-blog .blog-item .blog-slidermeta span.category a:hover,
	.btm-cate li a:hover,
	a,
	.ps-navigation ul a:hover span,
	.rs-blog .blog-item .blog-meta .categories a:hover,
	.bs-sidebar ul a:hover,		
	.rs-galleys .galley-img .zoom-icon:hover,
	.sidenav .fa-ul li a:hover,
	#about-history-tabs ul.tabs-list_content li:before,
	#rs-header.header-style-3 .header-inner .logo-section .toolbar-contact-style4 ul li i,
	#sidebar-services .widget.widget_nav_menu ul li.current-menu-item a,
	#sidebar-services .widget.widget_nav_menu ul li a:hover,
	.single-teams .team-inner ul li i,
	#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a, 
	#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current_page_item > a,
	rs-heading .title-inner .title,
	.team-grid-style1 .team-item .team-content1 h3.team-name a, .team-slider-style1 .team-item .team-content1 h3.team-name a,
	.rs-team-grid.team-style5 .team-item .normal-text .person-name a,
	.rs-team-grid.team-style4 .team-wrapper .team_desc .name a,
	.rs-team-grid.team-style4 .team-wrapper .team_desc .name .designation,	
	.sidenav .widget_nav_menu ul li a:hover,
	.contact-page1 .form-button .submit-btn i:before,
	.bs-sidebar .recent-post-widget .post-desc a:hover,
	.woocommerce nav.woocommerce-pagination ul li span.current, 
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.full-blog-content .blog-title a:hover,
	.single-teams .ps-informations h2.single-title,
	.single-teams .ps-informations ul li.phone a:hover, .single-teams .ps-informations ul li.email a:hover,
	.single-teams .siderbar-title,
	.single-teams .team-detail-wrap-btm.team-inner .appointment-btn a,	
	 ul.check-icon li:before,
	.subscribe-text i, .subscribe-text .title, .subscribe-text span a:hover,
	.rs-blog .blog-meta .blog-title a:hover,
	.timeline-icon,
	.service-carousels .services-sliders3 span.num,
	.service-readons:before,
	.services-sliders4:hover .services-desc h4.services-title a,
	.single-teams .designation-info,
	ul.unorder-list li:before,
	button:hover, html input[type="button"]:hover, input[type="reset"]:hover,
	.bs-sidebar .bs-search button,
	.rs-footer.footerlight .footer_social li a .fa,
	.single-teams .ps-informations h4.single-title,
	ul.stylelisting li:before{
		color:<?php echo esc_attr($site_color); ?>;
	}

	.ps-navigation ul a:hover span,
	ul.chevron-right-icon li:before,
	.ps-navigation ul a:hover,
	.rs-breadcrumbs .breadcrumbs-inner .cate-single .post-categories a:hover,
	.woocommerce-message::before, .woocommerce-info::before,
	.pagination-area .nav-links span.current{
		color:<?php echo esc_attr($site_color); ?> !important;
	}

	
	.transparent-btn:hover,
	.testimonial-light #cl-testimonial .testimonial-slide7 .single-testimonial:after,
	.rs-portfolio-style2 .portfolio-item .portfolio-img .read_more:hover,
	.service-carousel .owl-dots .owl-dot.active,
	.service-carousel .owl-dots .owl-dot,
	.rs-footer.footerlight .footer-top .mc4wp-form-fields input[type="email"],
	.bs-sidebar .tagcloud a:hover,
	.rs-blog-details .bs-info.tags a:hover,
	.single-teams .team-skill .rs-progress,
	.perceptron-processing-work .perceptron-work .single-work:after
	{
		border-color:<?php echo esc_attr($site_color); ?> !important;
	}

	body #whychoose ul.vc_tta-tabs-list li:hover:after, body #whychoose ul.vc_tta-tabs-list li.vc_active:after,
	.service-home .services-wrap .services-item .services-icon:before{
		border-top-color:<?php echo esc_attr($site_color); ?> !important;
	}
	
	.service-home .services-wrap .services-item .services-icon:before{
		border-left-color:<?php echo esc_attr($site_color); ?> !important;
		border-bottom-color:<?php echo esc_attr($site_color); ?> !important;
	}
	
	html input[type="button"]:hover, input[type="reset"]:hover,
	.sidenav .widget-title:before,
	.rs-team-grid.team-style5 .team-item .team-content,
	.rs-team-grid.team-style4 .team-wrapper .team_desc::before,
	.rs-team .team-item .team-social .social-icon,
	.rs-services-style4:hover .services-icon i,
	.team-grid-style1 .team-item .social-icons1 a:hover i,
	.loader__bar,
	blockquote:before,
	.rs-blog-grid .blog-img a.float-cat,
	#sidebar-services .download-btn ul li,
	.transparent-btn:hover,
	.team-grid-style2 .team-item-wrap .team-img .normal-text, 
	.team-slider-style2 .team-item-wrap .team-img .normal-text,
	.rs-portfolio-style2 .portfolio-item .portfolio-img .read_more:hover,	
	.rs-blog-details .blog-item.style2 .category a, .rs-blog .blog-item.style2 .category a, .blog .blog-item.style2 .category a,
	.rs-blog-details .blog-item.style1 .category a, .rs-blog .blog-item.style1 .category a, .blog .blog-item.style1 .category a,	
	.icon-button a,
	.team-grid-style1 .team-item .image-wrap .social-icons1, .team-slider-style1 .team-item .image-wrap .social-icons1,
	.rs-heading.style8 .title-inner:after,
	.rs-heading.style8 .description:after,
	#slider-form-area .form-area input[type="submit"],
	#sidebar-services .rs-heading .title-inner h3:before,	
	#rs-contact .contact-address .address-item .address-icon::before,
	.team-slider-style4 .team-carousel .team-item:hover,
	#scrollUp i,
	#rs-header.header-transparent .btn_quote a:hover,
	body .whychoose ul.vc_tta-tabs-list li.vc_active:before,
	body .whychoose ul.vc_tta-tabs-list li:hover:before,
	.bs-sidebar .tagcloud a:hover,
	.rs-heading.style2:after,
	.rs-blog-details .bs-info.tags a:hover,
	.mfp-close-btn-in .mfp-close,
	.top-services-dark .rs-services .services-style-7.services-left .services-wrap .services-item,
	.single-teams .team-inner h3:before,
	.single-teams .team-detail-wrap-btm.team-inner,
	::selection,
	body #whychoose ul.vc_tta-tabs-list li:hover:before, body #whychoose ul.vc_tta-tabs-list li.vc_active:before,	
	.rs-blog-details #reply-title:before,
	.rs-cta .style2 .title-wrap .exp-title:after,
	.rs-project-section .project-item .project-content .p-icon,
	.proces-item.active:after, .proces-item:hover:after,
	.subscribe-text .mc4wp-form input[type="submit"],
	.rs-footer #wp-calendar th,
	.service-carousel.services-dark .services-sliders2 .services-desc:before, 
	.service-carousels.services-dark .services-sliders2 .services-desc:before,	
	.close-search,
	button:hover, html input[type="button"]:hover, input[type="reset"]:hover,
	.home1-contact input[type="submit"],
	.information-sidebar .serivce-brochure,
	.rs-team-grid.team-style4 .team-wrapper:hover .team_desc,
	.single-portfolios .ps-informations h3,
	.single-teams .team-skill .rs-progress .progress-bar	
	{
		background:<?php echo esc_attr($site_color); ?>;
	}

	body #cl-testimonial .testimonial-slide3.slider3 button.slick-arrow{
		background:<?php echo esc_attr($site_color); ?> !important;
	}

	#cl-testimonial .testimonial-slide7 .single-testimonial:after,
	#cl-testimonial .testimonial-slide7 .single-testimonial:before{
		border-right-color: <?php echo esc_attr($secondary_color); ?>;
		border-right: 30px solid <?php echo esc_attr($secondary_color); ?>;
	}
	#cl-testimonial .testimonial-slide7 .single-testimonial{
		border-left-color: <?php echo esc_attr($secondary_color); ?>;
	}
	

	.rs-service-grid .service-item .service-content .service-button .readon.rs_button:hover:before,	
	.service-readons:hover,
	.service-readons:before:hover{
		color:<?php echo esc_attr($secondary_color); ?> !important;
	}

	.rs-service-grid .service-item .service-content .service-button .readon.rs_button:hover{
		border-color: <?php echo esc_attr($secondary_color); ?>;;
		color: <?php echo esc_attr($secondary_color); ?>;
	}

	.woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce ul.products li.product .price ins,
	.woocommerce div.product p.price, .woocommerce div.product span.price,
	.cd-timeline__content .short-info h2, .cd-timeline__content .short-info h3{
		color: <?php echo esc_attr($site_color); ?> !important;
	}

	.team-grid-style3 .team-img .team-img-sec:before,
	#loading,	
	#sidebar-services .bs-search button:hover, 
	.team-slider-style3 .team-img .team-img-sec:before,
	.rs-blog-details .blog-item.style2 .category a:hover, 
	.rs-blog .blog-item.style2 .category a:hover, 
	.blog .blog-item.style2 .category a:hover,
	.icon-button a:hover,
	.rs-blog-details .blog-item.style1 .category a:hover, 
	.rs-blog .blog-item.style1 .category a:hover, 
	.blog .blog-item.style1 .category a:hover,
	.skew-style-slider .revslider-initialised::before,
	.top-services-dark .rs-services .services-style-7.services-left .services-wrap .services-item:hover,
	.icon-button a:hover,
	.fullwidth-services-box .services-style-2:hover,
	#rs-header.header-style-4 .logo-section:before,
	.post-meta-dates,
	.cd-timeline__img.cd-timeline__img--picture,
	.rs-portfolio-style4 .portfolio-item .portfolio-img:before,
	.rs-portfolio-style3 .portfolio-item .portfolio-img:before
	{
		background: <?php echo esc_attr($secondary_color); ?>;
	}

	html input[type="button"], input[type="reset"], input[type="submit"]{
		background: <?php echo esc_attr($secondary_color); ?>;
	}

	.round-shape:before{
		border-top-color: <?php echo esc_attr($site_color); ?>;
		border-left-color: <?php echo esc_attr($site_color); ?>;
	}
	.round-shape:after{
		border-bottom-color: <?php echo esc_attr($site_color); ?>;
		border-right-color: <?php echo esc_attr($site_color); ?>;
	}
	
	#sidebar-services .wpb_widgetised_column{
		border-color:<?php echo esc_attr($secondary_color); ?>;
	}
	#sidebar-services .download-btn,
	.rs-video-2 .overly-border,
	.single-teams .ps-informations ul li.social-icon i,
	.woocommerce-error, .woocommerce-info, .woocommerce-message,
	.perceptron-processing-work .perceptron-work .single-work .work-icon,
	.perceptron-processing-work .perceptron-work .single-work .round-shape{
		border-color:<?php echo esc_attr($site_color); ?> !important;
	}

	.testimonial-light #cl-testimonial .testimonial-slide7 .single-testimonial:before,	
	.testimonial-light #cl-testimonial .testimonial-slide7 .single-testimonial:after{
		border-right-color: <?php echo esc_attr($site_color); ?> !important;
		border-top-color: transparent !important;
	}

	.testimonial-light #cl-testimonial .testimonial-slide7 .single-testimonial{
		border-left-color:<?php echo esc_attr($site_color); ?> !important;
	}
	
	.team-grid-style1 .team-item .team-content1 h3.team-name a:hover,
	#cl-testimonial .testimonial-slide7 .right-content i,
	.testimonial-light #cl-testimonial .testimonial-slide7 .single-testimonial .cl-author-info li:first-child,
	.rs-blog-details .bs-img .blog-date span.date, .rs-blog .bs-img .blog-date span.date, .blog .bs-img .blog-date span.date, .rs-blog-details .blog-img .blog-date span.date, .rs-blog .blog-img .blog-date span.date, .blog .blog-img .blog-date span.date,	
	.rs-portfolio-style5 .portfolio-item .portfolio-content a,
	#cl-testimonial.cl-testimonial9 .single-testimonial .cl-author-info li,
	#cl-testimonial.cl-testimonial9 .single-testimonial .image-testimonial p i,
	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i,
	.rs-services1.services-right .services-wrap .services-item .services-icon i,
	#rs-skills .vc_progress_bar h2,
	#rs-services-slider .menu-carousel .heading-block h4 a:hover,
	.rs-team-grid.team-style5 .team-item .normal-text .person-name a:hover,
	body .vc_tta-container .tab-style-left .vc_tta-panel-body h3,
	body .vc_tta-container .tab-style-left .vc_tta-tabs-container .vc_tta-tabs-list li a i,
	.service-readons:hover, .service-readons:hover:before,
	.perceptron-processing-work .perceptron-work .single-work:before
	{
		color: <?php echo esc_attr($secondary_color); ?>;
	}
	.rs-team-grid.team-style4 .team-wrapper .team_desc:before,
	.rs-team-grid.team-style5 .team-item .normal-text .team-text:before,
	.rs-services3 .slick-arrow,
	.single-teams .ps-image .ps-informations,
	.slidervideo .slider-videos,
	.slidervideo .slider-videos:before,
	.service-readon,
	.service-carousel .owl-dots .owl-dot.active,	
	.rs-blog-details .bs-img .categories .category-name a, .rs-blog .bs-img .categories .category-name a, .blog .bs-img .categories .category-name a, .rs-blog-details .blog-img .categories .category-name a, .rs-blog .blog-img .categories .category-name a, .blog .blog-img .categories .category-name a{
		background: <?php echo esc_attr($secondary_color); ?>;
	}

	.rs-blog-details .bs-img .blog-date:before, .rs-blog .bs-img .blog-date:before, .blog .bs-img .blog-date:before, .rs-blog-details .blog-img .blog-date:before, .rs-blog .blog-img .blog-date:before, .blog .blog-img .blog-date:before{		
		border-bottom: 0 solid;
    	border-bottom-color: <?php echo esc_attr($secondary_color); ?>;
    	border-top: 80px solid transparent;
    	border-right-color: <?php echo esc_attr($secondary_color); ?>;
    }

    .border-image.small-border .vc_single_image-wrapper:before{
	    border-bottom: 250px solid <?php echo esc_attr($secondary_color); ?>;
	}

	.border-image.small-border .vc_single_image-wrapper:after{
		border-top: 250px solid <?php echo esc_attr($secondary_color); ?>;
	}

	.border-image .vc_single_image-wrapper:before,
	.team-grid-style3 .team-img:before, .team-slider-style3 .team-img:before{
		border-bottom-color: <?php echo esc_attr($secondary_color); ?>;   			
	}

	.border-image .vc_single_image-wrapper:after,
	.team-grid-style3 .team-img:after, .team-slider-style3 .team-img:after{
		border-top-color: <?php echo esc_attr($secondary_color); ?>;   	
	}

	.woocommerce-info,
	body.single-services blockquote,	
	.rs-porfolio-details.project-gallery .file-list-image .p-zoom:hover
	{
		border-color: <?php echo esc_attr($secondary_color); ?>;  
	}
	
	.slidervideo .slider-videos i,
	.list-style li::before,
	.woocommerce ul.products li .woocommerce-loop-product__title a:hover,
	.slidervideo .slider-videos i:before,
	#team-list-style .team-name a
	{
		color: <?php echo esc_attr($link_color); ?>;
	}

	.rs-blog .blog-meta .blog-title a:hover
	.about-award a:hover,
	#team-list-style .team-name a:hover,
	#team-list-style .team-social i:hover,
	#team-list-style .social-info .phone a:hover,
	#rs-contact .contact-address .address-item .address-text a:hover{
		color: <?php echo esc_attr($link_hover_color); ?>;
	}

	.about-award a:hover{
		border-color: <?php echo esc_attr($link_hover_color); ?>;
	}

	#cl-testimonial .slick-next, #cl-testimonial .slick-next:hover, 
	#cl-testimonial .slick-prev, #cl-testimonial .slick-prev:hover,
	.rs-heading.style6 .title-inner .sub-text:after,
	.rs-blog-details .bs-img .categories .category-name a:hover, .rs-blog .bs-img .categories .category-name a:hover, .blog .bs-img .categories .category-name a:hover, .rs-blog-details .blog-img .categories .category-name a:hover, .rs-blog .blog-img .categories .category-name a:hover, .blog .blog-img .categories .category-name a:hover,
	#rs-header.header-style-4 .logo-section .times-sec{
		background: <?php echo esc_attr($secondary_color); ?>;
	}

	.rs-heading.style3 .description:after,
	.team-grid-style1 .team-item .social-icons1 a i, .team-slider-style1 .team-item .social-icons1 a i,
	.owl-carousel .owl-nav [class*="owl-"]:hover,
	button, html input[type="button"], input[type="reset"],
	.rs-service-grid .service-item .service-img:before,
	.rs-service-grid .service-item .service-img:after,
	#rs-contact .contact-address .address-item .address-icon::after,
	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i:hover,
	.rs-services1.services-right .services-wrap .services-item .services-icon i:hover,
	.rs-service-grid .service-item .service-content::before,
	.rs-services-style4 .services-item .services-icon i,
	#rs-services-slider .img_wrap:before,
	#rs-services-slider .img_wrap:after,
	.rs-galleys .galley-img:before,
	.woocommerce-MyAccount-navigation ul li:hover,
	.woocommerce-MyAccount-navigation ul li.is-active,
	.rs-galleys .galley-img .zoom-icon,
	.team-grid-style2 .team-item-wrap .team-img .team-img-sec::before,
	#about-history-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list .vc_tta-tab .vc_active a, #about-history-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list .vc_tta-tab.vc_active a,
	.services-style-5 .services-item .icon_bg,
	#cl-testimonial.cl-testimonial10 .slick-arrow,
	.contact-sec .contact:before, .contact-sec .contact:after,
	.contact-sec .contact2:before,
	.team-grid-style2 .team-item-wrap .team-img .team-img-sec:before,
	.rs-porfolio-details.project-gallery .file-list-image:hover .p-zoom:hover,	
	.team-slider-style2 .team-item-wrap .team-img .team-img-sec:before,
	.rs-team-grid.team-style5 .team-item .normal-text .social-icons a i:hover
	{
		background: <?php echo esc_attr($secondary_color); ?>;
	}

	#rs-header.header-style-4 .logo-section .times-sec:after{
		border-bottom-color: <?php echo esc_attr($secondary_color); ?>;
	}
	


	#about-history-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list .vc_tta-tab a:hover,	
	body .vc_tta-container .tab-style-left .vc_tta-tabs-container .vc_tta-tabs-list li.vc_active a
	{
		background: <?php echo esc_attr($secondary_color); ?> !important;
	}

	.full-video .rs-services1.services-left .services-wrap .services-item .services-icon i,
	#cl-testimonial.cl-testimonial9 .single-testimonial .testimonial-image img,
	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i,
	.rs-services1.services-right .services-wrap .services-item .services-icon i,
	#cl-testimonial.cl-testimonial10 .slick-arrow,
	.team-grid-style2 .team-item-wrap .team-img img, .team-slider-style2 .team-item-wrap .team-img img,
	.contact-sec .wpcf7-form .wpcf7-text, .contact-sec .wpcf7-form .wpcf7-textarea{
		border-color: <?php echo esc_attr($secondary_color); ?> !important;
	}

	<?php 
		if(!empty($perceptron_option['link_hover_text_color'])){
			?>
			#rs-services-slider .item-thumb .owl-dot.service_icon_style.active .tile-content a, 
			#rs-services-slider .item-thumb .owl-dot.service_icon_style:hover .tile-content a,
			.team-grid-style2 .appointment-bottom-area .app_details:hover a, .team-slider-style2 .appointment-bottom-area .app_details:hover a{
				color: <?php echo esc_attr($perceptron_option['link_hover_text_color']); ?> !important;	
			}
		<?php
		}
	?>
	


	<?php 
		if(!empty($perceptron_option['stiky_menu_area_bg_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area,
			#rs-header.header-style-3.header-style-2 .sticky-wrapper .header-inner.sticky .box-layout{
				background: <?php echo esc_attr($perceptron_option['stiky_menu_area_bg_color']); ?> !important;	
			}
		<?php
		}
	?>


	<?php 
		if(!empty($perceptron_option['stikcy_menu_text_color'])){
			?>
			#rs-header.header-style-4 .header-inner.sticky .nav-link-container .nav-menu-link span{
				background: <?php echo esc_attr($perceptron_option['stikcy_menu_text_color']); ?>;	
			}
		<?php
		}
	?>


	<?php 
		if(!empty($perceptron_option['stikcy_menu_text_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li a,
			#rs-header.header-style-4 .header-inner.sticky .menu-cart-area i,
			#rs-header.header-style-4 .header-inner.sticky .sidebarmenu-search i,
			#rs-header.header-style-4 .header-inner.sticky .btn_quote .toolbar-sl-share ul li a{
				color: <?php echo esc_attr($perceptron_option['stikcy_menu_text_color']); ?>;
			}
		<?php
		}
	?>	

	<?php 
		if(!empty($perceptron_option['stikcy_menu_text_active_color'])){
			?>
			 #rs-header.header-transparent .menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current-menu-item page_item a,
			#rs-header.header-style-4 .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a,
			#rs-header.header-style-4 .menu-sticky.sticky .menu-area .menu > li.current-menu-ancestor > a{
				color: <?php echo esc_attr($perceptron_option['stikcy_menu_text_active_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php if(!empty($perceptron_option['sticky_drop_down_bg_color'])) : ?>
		.menu-sticky.sticky .menu-area .navbar ul li .sub-menu{
			background:<?php echo esc_attr($perceptron_option['sticky_drop_down_bg_color']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['sticky_menu_text_hover_color'])) : ?>
		#rs-header.header-style-4 .header-inner.sticky .nav-link-container .nav-menu-link:hover span{
			background:<?php echo esc_attr($perceptron_option['sticky_menu_text_hover_color']); ?>;
		}
	<?php endif; ?>

	<?php 
		if(!empty($perceptron_option['sticky_menu_text_hover_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li:hover > a,
			#rs-header.header-style-4 .header-inner.sticky .btn_quote .toolbar-sl-share ul li a:hover,
			#rs-header.header-style-4 .header-inner.sticky .menu-cart-area i:hover,
			#rs-header.header-style-4 .header-inner.sticky .sidebarmenu-search i:hover,			
			#rs-header.header-style1 .menu-sticky.sticky .menu-area .navbar ul li:hover > a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li ul.submenu> li.current-menu-ancestor > a{
				color: <?php echo esc_attr($perceptron_option['sticky_menu_text_hover_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php
		if(!empty($perceptron_option['toolbar_link_color'])){?>
			#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons{
			color: <?php echo esc_attr($perceptron_option['toolbar_link_color']);?>
		}
		<?php } 
	?>	

	<?php 
		if(!empty($perceptron_option['stikcy_drop_text_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li a{
				color: <?php echo esc_attr($perceptron_option['stikcy_drop_text_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php 
		if(!empty($perceptron_option['sticky_drop_text_hover_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li a:hover,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current-menu-item page_item a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul  li .sub-menu li.current_page_item > a
			{
				color: <?php echo esc_attr($perceptron_option['sticky_drop_text_hover_color']); ?> !important;	
			}
		<?php
		}
	?>	

	<?php 
		if(!empty($perceptron_option['footer_bg_color'])){?>
		.rs-footer{
			background: <?php echo esc_attr($perceptron_option['footer_bg_color']); ?>;
			background-size: cover;
		}
		<?php
	}
?>
	
	<?php if(!empty($perceptron_option['btn_bg_color']) && !empty($perceptron_option['btn_bg_color2'])) : ?>

		.price-btn .readon,
		.owl-carousel .owl-nav [class*="owl-"],		
		body #page .slick-prev, 
		body #page .slick-next,
		.woocommerce span.onsale,
		.perceptron-contact-form1 .form-button input,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before,		
		.woocommerce div.product .woocommerce-tabs ul.tabs li:hover:before,
		.woocommerce #respond input#submit:before, .woocommerce a.button:before, .woocommerce .wc-forward:before, .woocommerce button.button:before, .woocommerce input.button:before, .woocommerce #respond input#submit.alt:before, .woocommerce a.button.alt:before, .woocommerce button.button.alt:before, .woocommerce input.button.alt:before,
		.rs-blog .blog-item .blog-button a:before,
		button:hover, html input[type="button"], input[type="reset"], input[type="submit"]		

		{
			background: linear-gradient(to right,<?php echo esc_attr($perceptron_option['btn_bg_color']);?> 0,<?php echo esc_attr($perceptron_option['btn_bg_color2']);?> 51%,<?php echo esc_attr($perceptron_option['btn_bg_color']);?> 100%);

		}

		
	<?php endif; ?>	

	<?php if(!empty($perceptron_option['btn_text_color'])) : ?>
		.readon,
		.woocommerce button.button,
		.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce .wc-forward, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
		.woocommerce a.button,
		.woocommerce .wc-forward,
		.woocommerce button.button.alt,   
		.woocommerce ul.products li a.button,
		#rs-header.header-style1 .btn_quote a,
		.menu-sticky.sticky .quote-button:hover		
		{
			color:<?php echo esc_attr($perceptron_option['btn_text_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['btn_txt_hover_color'])) : ?>	
		.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce .wc-forward:hover, .woocommerce input.button, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover,
		.woocommerce .wc-forward:hover,
		.woocommerce a.button:hover,  
		.woocommerce ul.products li:hover a.button,
		.comment-respond .form-submit #submit:hover{
			color:<?php echo esc_attr($perceptron_option['btn_txt_hover_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['btn_bg_hover_color'])) : ?>
		.comments-area .comment-list li.comment .reply a:hover,
		.woocommerce a.button:hover,
		.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce .wc-forward:hover, .woocommerce button.button:hover, .woocommerce input.button, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, 
		.woocommerce button.button.alt:hover, 
		.comment-respond .form-submit #submit:hover, 
		.woocommerce button.button:hover,
		.woocommerce ul.products li:hover a.button,
		 #rs-header.header-style1 .btn_quote a:hover,
		 .menu-sticky.sticky .quote-button:hover,
		 #rs-header.header-transparent .btn_quote a:hover,
		 #rs-header.header-style-3 .btn_quote .quote-button:hover,		
		 .submit-btn:before,
		 .woocommerce #respond input#submit:before, .woocommerce a.button:before, .woocommerce .wc-forward:before, .woocommerce button.button:before, .woocommerce input.button:before, .woocommerce #respond input#submit.alt:before, .woocommerce a.button.alt:before, .woocommerce button.button.alt:before, .woocommerce input.button.alt:before{
			background:<?php echo esc_attr($perceptron_option['btn_bg_hover_color']); ?>;
			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['container_size'])) : ?>
		@media only screen and (min-width: 1500px) {
			.container{
				max-width:<?php echo esc_attr($perceptron_option['container_size']); ?>;
			}
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['logo-height-mobile'])) : ?>
		@media only screen and (max-width: 991px) {
			#rs-header .logo-area a img{
				max-height:<?php echo esc_attr($perceptron_option['logo-height-mobile']); ?> !important;
			}
		}
	<?php endif; ?>

		<?php if(!empty($perceptron_option['show-top-mobile'])) : ?>
		@media only screen and (max-width: 991px) {
			#rs-header .toolbar-area{
				display:none;
			}
		}
	<?php endif; ?>



	<?php if(!empty($perceptron_option['menu_item_gap'])) : ?>
		.menu-area .navbar ul li{
			padding-left:<?php echo esc_attr($perceptron_option['menu_item_gap']); ?>;
			padding-right:<?php echo esc_attr($perceptron_option['menu_item_gap']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['menu_item_gap2'])) : ?>
		.menu-area .navbar ul > li,
		.menu-cart-area,
		#rs-header .btn_quote,
		#rs-header .menu-responsive .sidebarmenu-search .sticky_search{
			padding-top:<?php echo esc_attr($perceptron_option['menu_item_gap2']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['menu_item_gap3'])) : ?>
		.menu-area .navbar ul > li,
		.menu-cart-area,
		#rs-header .btn_quote,
		#rs-header .menu-responsive .sidebarmenu-search .sticky_search{
			padding-bottom:<?php echo esc_attr($perceptron_option['menu_item_gap3']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['dropdown_menu_item_gap'])) : ?>
		.menu-area .navbar ul li ul.sub-menu li a{
			padding-left:<?php echo esc_attr($perceptron_option['dropdown_menu_item_gap']); ?>;
			padding-right:<?php echo esc_attr($perceptron_option['dropdown_menu_item_gap']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['dropdown_menu_item_gap2'])) : ?>
		.menu-area .navbar ul li ul.sub-menu{
			padding-top:<?php echo esc_attr($perceptron_option['dropdown_menu_item_gap2']); ?>;
			padding-bottom:<?php echo esc_attr($perceptron_option['dropdown_menu_item_gap2']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['dropdown_menu_item_separate'])) : ?>
		.menu-area .navbar ul li ul.sub-menu li a{
			padding-top:<?php echo esc_attr($perceptron_option['dropdown_menu_item_separate']); ?>;
			padding-bottom:<?php echo esc_attr($perceptron_option['dropdown_menu_item_separate']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['meaga_menu_item_gap'])) : ?>
		#rs-header .menu-area .navbar ul > li.mega > ul{
			padding-left:<?php echo esc_attr($perceptron_option['meaga_menu_item_gap']); ?>;
			padding-right:<?php echo esc_attr($perceptron_option['meaga_menu_item_gap']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['mega_menu_item_gap2'])) : ?>
		#rs-header .menu-area .navbar ul > li.mega > ul{
			padding-top:<?php echo esc_attr($perceptron_option['mega_menu_item_gap2']); ?>;
			padding-bottom:<?php echo esc_attr($perceptron_option['mega_menu_item_gap2']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['mega_menu_item_separate'])) : ?>
		#rs-header .menu-area .navbar ul li.mega ul.sub-menu li a{
			padding-top:<?php echo esc_attr($perceptron_option['mega_menu_item_separate']); ?>;
			padding-bottom:<?php echo esc_attr($perceptron_option['mega_menu_item_separate']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($perceptron_option['breadcrumb_bg_color'])) : ?>
		.rs-breadcrumbs{
			background:<?php echo esc_attr($perceptron_option['breadcrumb_bg_color']); ?>;			
		}
	<?php endif; ?>



	<?php if(!empty($perceptron_option['offcanvas_close_color'])) : ?>
		.sidenav li.nav-link-container a span{
			background:<?php echo esc_attr($perceptron_option['offcanvas_close_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcanvas_close_hover_color'])) : ?>
		.sidenav li.nav-link-container:hover a.close-button span{
			background:<?php echo esc_attr($perceptron_option['offcanvas_close_hover_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcan_bgs_color'])) : ?>
		.menu-wrap-off{
			background:<?php echo esc_attr($perceptron_option['offcan_bgs_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcan_txt_color'])) : ?>
		.sidenav p, .sidenav{
			color:<?php echo esc_attr($perceptron_option['offcan_txt_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcan_link_color'])) : ?>
		.sidenav .widget_nav_menu ul li a,
		.sidenav a{
			color:<?php echo esc_attr($perceptron_option['offcan_link_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcan_link_social_color'])) : ?>
		ul.sidenav .menu > li.menu-item-has-children:before, 
		.sidenav .offcanvas_social li a i{
			color:<?php echo esc_attr($perceptron_option['offcan_link_social_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcan_link_hovers_color'])) : ?>
		.sidenav .widget_nav_menu ul li a:hover, 
		.sidenav a:hover{
			color:<?php echo esc_attr($perceptron_option['offcan_link_hovers_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['offcan_link_bg_color'])) : ?>
		.sidenav .offcanvas_social li a i,
		ul.sidenav .menu > li.menu-item-has-children::before{
			background:<?php echo esc_attr($perceptron_option['offcan_link_bg_color']); ?>;			
		}
	<?php endif; ?>

	

	<?php if(!empty($perceptron_option['breadcrumb_text_color'])) : ?>
		.rs-breadcrumbs .page-title,
		.rs-breadcrumbs ul li *,
		.rs-breadcrumbs ul li.trail-begin a:before,
		.rs-breadcrumbs ul li{
			color:<?php echo esc_attr($perceptron_option['breadcrumb_text_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['breadcrumb_top_gap']) && !empty($perceptron_option['breadcrumb_bottom_gap'])) : ?>
		.rs-breadcrumbs .breadcrumbs-inner,
		#rs-header.header-style-3 .rs-breadcrumbs .breadcrumbs-inner,
		   body.error404, body.single-product .rs-breadcrumbs .breadcrumbs-inner{
			padding-top:<?php echo esc_attr($perceptron_option['breadcrumb_top_gap']); ?>;			
			padding-bottom:<?php echo esc_attr($perceptron_option['breadcrumb_bottom_gap']); ?>;			
	}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['blog_bg_color'])) : ?>
		body.single-post, body.blog, body.archive, body.single-services, body.single-mp-event{
			background:<?php echo esc_attr($perceptron_option['blog_bg_color']); ?>;					
		}
	<?php endif; ?>

		<?php if(!empty($perceptron_option['preloader_text_color'])) : ?>
		.perceptron-loader{
			color: <?php echo esc_attr($perceptron_option['preloader_text_color']); ?> !important; 
		}		
	<?php endif; ?>

	<?php if(!empty($perceptron_option['preloader_bg_color'])) : ?>
		#perceptron-load{
			background: <?php echo esc_attr($perceptron_option['preloader_bg_color']); ?> !important;  
		}
	<?php endif; ?>

	<?php if(!empty($perceptron_option['text_color'])) : ?>
		.page-error.coming-soon .countdown-inner .time_circles div,
		.page-error.coming-soon .content-area h3,
		.page-error.coming-soon .content-area h3 span,
		.page-error.coming-soon .follow-us-sbuscribe p,
		.page-error.coming-soon .countdown-inner .time_circles div h4,
		.page-error.coming-soon .countdown-inner .time_circles div span{
			color: <?php echo esc_attr($perceptron_option['text_color']); ?>
		}
		.page-error.coming-soon .countdown-inner .time_circles div{
			border-color: <?php echo esc_attr($perceptron_option['circle_border_color']); ?>
		}

	<?php endif; ?>

	<?php if(!empty($perceptron_option['circle_primary_color']) && !empty($perceptron_option['circle_secondary_color'])) : ?>

		
		.page-error.coming-soon .countdown-inner .time_circles div{
			background: linear-gradient(-41deg, <?php echo esc_attr($perceptron_option['circle_primary_color']);?>, <?php echo esc_attr($perceptron_option['circle_secondary_color']);?>);
		}		
		
	<?php endif; ?>	
	


</style>

<?php
	}
	 if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
	 	$perceptron_shop_id   = get_option( 'woocommerce_shop_page_id' ); 
		$padding_top    = get_post_meta($perceptron_shop_id, 'content_top', true);
		$padding_bottom = get_post_meta($perceptron_shop_id, 'content_bottom', true);
  		if($padding_top != '' || $padding_bottom != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}
	  	  </style>	
	  	  <?php
	 	}
	}
	elseif(is_home() && !is_front_page() || is_home() && is_front_page()){
		$padding_top    = get_post_meta(get_queried_object_id(), 'content_top', true);
		$padding_bottom = get_post_meta(get_queried_object_id(), 'content_bottom', true);
  		if($padding_top != '' || $padding_bottom != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}
	  	  </style>	
	  	<?php
	  }
  }
  	else{
		$padding_top    = get_post_meta(get_the_ID(), 'content_top', true);
		$padding_bottom = get_post_meta(get_the_ID(), 'content_bottom', true);
  		if($padding_top != '' || $padding_bottom != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}
	  	  </style>	
	  	<?php
	  }
  }

 $page_primary_color  = get_post_meta(get_the_ID(), 'page_primary_color', true);
 $page_secondary_color = get_post_meta(get_the_ID(), 'page_secondary_color', true);
 $page_footer_icon_color = get_post_meta(get_the_ID(), 'page_footer_icon_color', true);?>

	  	<style>
	  			<?php if(!empty($page_primary_color) && !empty($page_secondary_color)){ ?>
					input[type="submit"]{
						background:linear-gradient(to right,<?php echo esc_attr($page_secondary_color);?> 0,<?php echo esc_attr($page_primary_color);?> 51%,<?php echo esc_attr($page_secondary_color);?> 100%)
					}
					.rs-blog .blog-item .blog-button a:before,
					#rs-header .btn_quote a{
						background-image: linear-gradient(to right,<?php echo esc_attr($page_primary_color);?> 0,<?php echo esc_attr($page_secondary_color);?> 51%,<?php echo esc_attr($page_secondary_color);?> 100%) !important;
					}
					.newsletter-box button:before,
					.neuron-processing-work .neuron-work .single-work .work-icon.hover-pulse:hover i:before,
					.neuron-processing-work .neuron-work .single-work .work-icon.hover-pulse:hover:before {
						background: linear-gradient(-41deg,<?php echo esc_attr($page_secondary_color);?>,<?php echo esc_attr($page_primary_color);?>);
					}
					.newsletter-box button:after{
						background: linear-gradient(41deg,<?php echo esc_attr($page_secondary_color);?>,<?php echo esc_attr($page_primary_color);?>);
					}
					.rs-video-2 i:before {
						background-image: linear-gradient(0deg, <?php echo esc_attr($page_secondary_color);?> 45%, <?php echo esc_attr($page_primary_color);?> 60%);
					}
					.rs-video-2 .popup-videos:hover:before {
						background-image: linear-gradient(-41deg, <?php echo esc_attr($page_secondary_color);?> 45%, <?php echo esc_attr($page_primary_color);?> 60%);
					}
					
					
				<?php }?>  
				
				<?php if(!empty($page_primary_color)){ ?>
					#scrollUp i{
						background: <?php echo esc_attr($page_primary_color);?> !important;
					}
					ul.stylelisting li:before{
						color: <?php echo esc_attr($page_primary_color);?>;
					}
					
				<?php }?> 

				<?php if(!empty($page_footer_icon_color)){ ?>

					.rs-footer .footer-top h3.footer-title:after{
						background: <?php echo esc_attr($page_footer_icon_color);?> !important;
					}
					#footer-menu-wrap li a:before,
					.rs-footer .widget.widget_nav_menu ul li a:before{
						color: <?php echo esc_attr($page_footer_icon_color);?>;
					}
					
					.rs-footer .fa-ul li i, 
					ul.footer_social li a i {
						color: <?php echo esc_attr($page_footer_icon_color);?>;
						background: -moz-linear-gradient(-41deg,<?php echo esc_attr($page_footer_icon_color);?>,<?php echo esc_attr($page_footer_icon_color);?>);
						background: linear-gradient(-41deg,<?php echo esc_attr($page_footer_icon_color);?>,<?php echo esc_attr($page_footer_icon_color);?>);
						-webkit-background-clip: text;
						-moz-background-clip: text;
						background-clip: text;
						-webkit-text-fill-color: transparent;
					}
				<?php }?> 
				

	  	</style>
<?php }
?>