
<?php
    global $perceptron_option; 
    require get_parent_theme_file_path('inc/footer/footer-options.php');
    $header_grid2 = "";
    $hide_foot_widgets='';

    if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {

       $perceptron_shop_id = get_option( 'woocommerce_shop_page_id' ); 
       $header_width_meta = get_post_meta($perceptron_shop_id, 'header_width_custom2', true);
       $hide_foot_widgets =  get_post_meta($perceptron_shop_id, 'hide_foot_widgets', true);

    } elseif (is_home() && !is_front_page() || is_home() && is_front_page()){

        $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom2', true);
        $hide_foot_widgets =  get_post_meta(get_queried_object_id(), 'hide_foot_widgets', true);
    } else {
       $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom2', true);
       $hide_foot_widgets =  get_post_meta(get_queried_object_id(), 'hide_foot_widgets', true);
    }  
    
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = $perceptron_option['header_grid2'];
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
    if($hide_foot_widgets !== 'yes'){
?>


<?php

    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'footer1'  )
        && ! is_active_sidebar( 'footer2' )
        && ! is_active_sidebar( 'footer3'  )
        && ! is_active_sidebar( 'footer4' )
    ){
      
    } 
?>

<?php if(is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && is_active_sidebar('footer4'))
  {?>
  <div class="footer-top">
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
            <div class="col-lg-3 footer1"> 

                <?php   
                    $footer_logo_size = !empty($perceptron_option['footer-logo-height']) ? 'style="height: '.$perceptron_option['footer-logo-height'].'"' : '';        
                    if($footer_type == 'footerlight'){
                        if(!empty($perceptron_option['footer_dark_logo']['url'])) { ?>
                        <div class="footer-logo-wrap">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                            <img <?php echo wp_kses_post($footer_logo_size);?> src="<?php  echo esc_url($perceptron_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                            </a>
                        </div>
                <?php } } ?>

                <?php if($footer_type != 'footerlight'){
                    if(!empty($perceptron_option['footer_logo']['url'])) { ?>
                        <div class="footer-logo-wrap">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                <img <?php echo wp_kses_post($footer_logo_size);?> src="<?php  echo esc_url($perceptron_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                            </a>
                        </div>
                <?php } } ?> 

            <?php dynamic_sidebar('footer_top');?>       
            <?php dynamic_sidebar('footer1');?>                       
          </div>              
          <div class="col-lg-3 footer2">
            <?php dynamic_sidebar('footer2'); 
            
            ?>                             
          </div>
          <div class="col-lg-3 footer3">
              <?php dynamic_sidebar('footer3'); ?>
             
          </div>
          <div class="col-lg-3 footer4">
             <?php dynamic_sidebar('footer4'); ?>   
          </div>
      </div>
    </div>
  </div>
  <?php }
 elseif(is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  {?>
  <div class="footer-top">
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
            <div class="col-lg-4">                                          
                <div class="about-widget widget"> 
                        <?php
                          if($footer_type == 'footerlight'){
                              if(!empty($perceptron_option['footer_dark_logo']['url'])) { ?>
                              <div class="footer-logo-wrap">
                                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                  <img src="<?php  echo esc_url($perceptron_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                  </a>
                              </div>
                      <?php }} ?>

                      <?php if($footer_type != 'footerlight'){
                          if(!empty($perceptron_option['footer_logo']['url'])) { ?>
                              <div class="footer-logo-wrap">
                                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                      <img src="<?php  echo esc_url($perceptron_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                  </a>
                              </div>
                      <?php }} ?>       
                  <?php dynamic_sidebar('footer_top');?> 
                    <?php dynamic_sidebar('footer1');?>                  
                </div>                       
            </div>              
            <div class="col-lg-5">
                <?php dynamic_sidebar('footer2'); ?>                            
            </div>
            <div class="col-lg-3">
                <?php dynamic_sidebar('footer3'); ?> 
            </div>         
      </div>
    </div>
  </div>
<?php } 
 elseif(is_active_sidebar('footer1') && is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6"> 
                  <?php
                    if($footer_type == 'footerlight'){
                        if(!empty($perceptron_option['footer_dark_logo']['url'])) { ?>
                        <div class="footer-logo-wrap">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                            <img src="<?php  echo esc_url($perceptron_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                            </a>
                        </div>
                <?php }} ?>

                <?php if($footer_type != 'footerlight'){
                    if(!empty($perceptron_option['footer_logo']['url'])) { ?>
                        <div class="footer-logo-wrap">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                <img src="<?php  echo esc_url($perceptron_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                            </a>
                        </div>
                <?php } } ?>  
                     
            <?php dynamic_sidebar('footer_top');?> 
                   
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer2'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
  }

elseif(is_active_sidebar('footer1') && !is_active_sidebar('footer2') && !is_active_sidebar('footer3') && is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">  
                <?php
                  if($footer_type == 'footerlight'){
                      if(!empty($perceptron_option['footer_dark_logo']['url'])) { ?>
                      <div class="footer-logo-wrap">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                          <img src="<?php  echo esc_url($perceptron_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                          </a>
                      </div>
              <?php }} ?>

              <?php if($footer_type != 'footerlight'){
                  if(!empty($perceptron_option['footer_logo']['url'])) { ?>
                      <div class="footer-logo-wrap">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                              <img src="<?php  echo esc_url($perceptron_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                          </a>
                      </div>
              <?php }} ?>       
          <?php dynamic_sidebar('footer_top');?>       
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer4'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
}

elseif(is_active_sidebar('footer1') && !is_active_sidebar('footer2') && is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">           
                <?php
                  if($footer_type == 'footerlight'){
                      if(!empty($perceptron_option['footer_dark_logo']['url'])) { ?>
                      <div class="footer-logo-wrap">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                          <img src="<?php  echo esc_url($perceptron_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                          </a>
                      </div>
              <?php }} ?>

              <?php if($footer_type != 'footerlight'){
                  if(!empty($perceptron_option['footer_logo']['url'])) { ?>
                      <div class="footer-logo-wrap">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                              <img src="<?php  echo esc_url($perceptron_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                          </a>
                      </div>
              <?php }} ?>       
          <?php dynamic_sidebar('footer_top');?>             
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer3'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
}


elseif(!is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">   
                <?php
                  if($footer_type == 'footerlight'){
                      if(!empty($perceptron_option['footer_dark_logo']['url'])) { ?>
                      <div class="footer-logo-wrap">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                          <img src="<?php  echo esc_url($perceptron_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                          </a>
                      </div>
              <?php }} ?>

              <?php if($footer_type != 'footerlight'){
                  if(!empty($perceptron_option['footer_logo']['url'])) { ?>
                      <div class="footer-logo-wrap">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                              <img src="<?php  echo esc_url($perceptron_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                          </a>
                      </div>
              <?php }} ?>       
          <?php dynamic_sidebar('footer_top');?>          
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer3'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
}

 elseif(is_active_sidebar('footer1') && !is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4')) {
?>
<div class="footer-top"> 
<div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
          <div class="col-lg-12">                                          
              <div class="about-widget widget">
                
                  <?php dynamic_sidebar('footer1'); ?>
              </div>                  
          </div>                  
      </div>
  </div>
</div>
<?php } 

 elseif(!is_active_sidebar('footer1') && is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4')) {
?>
<div class="footer-top"> 
<div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
          <div class="col-md-12">
           <?php dynamic_sidebar('footer2'); ?>       
          </div>                  
      </div>
  </div>
</div>
<?php } 
}
?>