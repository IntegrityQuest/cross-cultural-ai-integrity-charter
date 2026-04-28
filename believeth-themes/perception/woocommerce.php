<?php
get_header();
global $perceptron_option;

// Layout class

if ( $perceptron_option['shop-layout'] == 'full' ) {
	$perceptron_layout_class = 'col-sm-12 col-xs-12';
}
elseif( $perceptron_option['shop-layout'] == 'left-col' || $perceptron_option['shop-layout'] == 'right-col'){
	$perceptron_layout_class = 'col-md-9 col-xs-12';
}
else{
	$perceptron_layout_class = 'col-sm-12 col-xs-12';
}
?>
<div class="container">
	<div id="content" class="site-content">		
		<div class="row">
			<?php
				if(!empty($perceptron_option['disable-sidebar']) && is_product()){
					?>
					<div class="col-sm-12 col-xs-12">
					    <?php					
							woocommerce_content();						
						?>
					</div>
					<?php
				}else{				
					if ( $perceptron_option['shop-layout'] == 'left-col'  ) {
						get_sidebar('woocommerce');
					}
					?>    			
				    <div class="<?php echo esc_attr($perceptron_layout_class);?>">
					    <?php					
							woocommerce_content();						
		   				 ?>
				    </div>
					<?php
					if ( $perceptron_option['shop-layout'] == 'right-col'  ) {
						get_sidebar('woocommerce');
					}	
				}
			?>
		</div>
	</div>
</div>
<?php
get_footer();