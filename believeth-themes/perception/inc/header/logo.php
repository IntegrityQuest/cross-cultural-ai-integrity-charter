<?php 

global $perceptron_option;

$post_meta_header = '';

$header_style = '';

$logo_height = !empty($perceptron_option['logo-height']) ? 'style = "max-height: '.$perceptron_option['logo-height'].'"' : '';

$sticky_logo_height =!empty($perceptron_option['sticky_logo_height']) ? 'style = "max-height: '.$perceptron_option['sticky_logo_height'].'"' : '';



if(!empty($perceptron_option['header_layout'])){ 

  $header_style = $perceptron_option['header_layout'];

} 



if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {



        $perceptron_shop_id = get_option( 'woocommerce_shop_page_id' ); 

        $post_meta_header = get_post_meta($perceptron_shop_id, 'select-logo', true); 



} elseif (is_home() && !is_front_page() || is_home() && is_front_page()){



        $post_meta_header = get_post_meta(get_queried_object_id(), 'select-logo', true); 

        

} else {

    $post_meta_header = get_post_meta(get_queried_object_id(), 'select-logo', true); 

} 





if( $post_meta_header == 'light' || $post_meta_header == '') {?>

<div class="logo-area">

    <?php

       if (!empty( $perceptron_option['logo_light']['url'] ) ) { ?>

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses_post($logo_height);?> src="<?php echo esc_url( $perceptron_option['logo_light']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>

    <?php } else{?>

        

          <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   

       

       <?php  } 

    ?>     

  </div>

  

<?php 

}

 elseif($post_meta_header == 'dark' ){ ?>
  <div class="logo-area">

    <?php

       if (!empty( $perceptron_option['logo']['url'] ) ) { ?>

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses_post($logo_height);?> src="<?php echo esc_url( $perceptron_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>

    <?php } else{?>

      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>         

       <?php  } 

    ?>

  </div>
  

<?php }else{

  ?>

  <div class="logo-area">

      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>  

   </div>

  <?php

}



 if (!empty( $perceptron_option['rswplogo_sticky']['url'] ) ) { ?>

    <div class="logo-area sticky-logo">

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses_post($sticky_logo_height);?> src="<?php echo esc_url( $perceptron_option['rswplogo_sticky']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>

       </div>

    <?php } 



     else{?>

      <div class="logo-area sticky-logo">

     <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

         

    </div>

<?php }



