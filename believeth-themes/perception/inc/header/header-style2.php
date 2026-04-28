<?php

/*
Header Style 1
*/

global $perceptron_option;
$sticky = $perceptron_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');


if(!empty($perceptron_option['off_canvas']) || ($rs_offcanvas == 'show') ): ?>
    <?php 
        //off convas here
        get_template_part('inc/header/off-canvas');
    ?> 
<?php endif; ?>

<!-- Mobile Menu Start -->
    <div class="responsive-menus"><?php require get_parent_theme_file_path('inc/header/responsive-menu.php');?></div>
<!-- Mobile Menu End -->
<header id="rs-header" class="single-header header-style5 mainsmenu<?php echo esc_attr($main_menu_hides);?>">
    <?php 
      //include sticky search here
      get_template_part('inc/header/search');
    ?>
    <div class="header-inner <?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php       
           get_template_part('inc/header/top-head/top-head','two');
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <?php
        
        //check individual header 
        $menu_bg_color = !empty($menu_bg) ? 'style=background:'.$menu_bg.'' : '';
        ?>
        <div class="menu-area menu_type_<?php echo esc_attr($main_menu_type);?>" <?php echo wp_kses_post($menu_bg_color);?>>
            <div class="<?php echo esc_attr($header_width);?>">
                <div class="row-table">
                    <div class="col-cell header-logo">
                    <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="col-cell menu-responsive">  
                        <?php 
                        $offborder ="";
                        if(!empty($perceptron_option['off_canvas']) && !empty($perceptron_option['off_search'])):
                             $offborder="off-border-left"; 
                        endif;
                            if($rs_show_quote != 'hide'){
                                if(!empty($perceptron_option['quote'])){ ?>
                                <div class="btn_quote"><a href="<?php echo esc_url($perceptron_option['quote_link']); ?>" class="quote-button"><?php  echo esc_html($perceptron_option['quote']); ?></a></div>
                        <?php } }

                        if($rs_offcanvas != 'hide'):
                              if(!empty($perceptron_option['off_canvas']) || ($rs_offcanvas == 'show') ): ?>
                              <div class="sidebarmenu-area text-right">
                                <?php if(!empty($perceptron_option['off_canvas']) || ($rs_offcanvas == 'show') ){
                                        $off = $perceptron_option['off_canvas'];
                                        if( ($off == 1) || ($rs_offcanvas == 'show') ){
                                   ?>
                                    <ul class="offcanvas-icon">
                                      <li class="nav-link-container"> 
                                        <a href='#' class="nav-menu-link menu-button" id="open-button2">
                                          <span class="hamburger1"></span>
                                          <span class="hamburger2"></span>
                                          <span class="hamburger3"></span>
                                        </a> 
                                      </li>
                                    </ul>
                                    <?php } 
                                }?> 
                              </div>
                            <?php endif; endif; ?>

                            <div class="sidebarmenu-area text-right mobilehum">                                    
                                <ul class="offcanvas-icon">
                                  <li class="nav-link-container"> 
                                    <a href='#' class="nav-menu-link menu-button">
                                      <span class="hamburger1"></span>
                                      <span class="hamburger2"></span>
                                      <span class="hamburger3"></span>
                                    </a> 
                                  </li>
                                </ul>                                       
                            </div>


                        <?php if($rs_phoneicon != 'hide'){
                            if(!empty($perceptron_option['phone-icons'])): ?>
                            <div class="sidebarmenu-search text-right phone-calls">
                                <div class="sidebarmenu-search">
                                    <div class="phone_call">
                                        <i class="flaticon-call"></i> 
                                    </div>
                                    <?php if(!empty($perceptron_option['phone'])) { ?>
                                        <div class="rs-contact-phone phone_num_call">                                   
                                        <a href="tel:+<?php echo esc_attr(str_replace(" ","",($perceptron_option['phone'])))?>"> <?php echo esc_html($perceptron_option['phone']); ?></a>                   
                                        </div>
                                    <?php } ?>
                                </div>
                            </div> 
                            <?php endif; 
                        }?>

                        <?php
                        if(!empty($perceptron_option['off_search']) || ($rs_top_search == 'show') ){ ?>
                                <div class="sidebarmenu-search text-right">
                                    <div class="sidebarmenu-search">
                                        <div class="sticky_search"> 
                                          <i class="flaticon-search"></i> 
                                        </div>
                                    </div>
                                </div>                        
                            <?php
                        }


                        //include Cart here
                        if(!empty($perceptron_option['wc_cart_icon']) || ($rs_show_cart == 'show') ){ ?>
                            <?php  get_template_part('inc/header/cart'); ?>
                        <?php }


                        if(!empty($perceptron_option['off_canvas']) || !empty($perceptron_option['off_search'])):
                          $menu_right='nav-right-bar';
                        else:
                          $menu_right=''; 
                        endif;
                                           
                        if(is_page_template('page-single.php')){
                            require get_parent_theme_file_path('inc/header/menu-single.php'); 
                        }else{
                            require get_parent_theme_file_path('inc/header/menu.php'); 
                        }               
                        ?>               
                    </div>
                </div>
            </div> 
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>

<?php  
    get_template_part('inc/header/slider/slider');
?>
