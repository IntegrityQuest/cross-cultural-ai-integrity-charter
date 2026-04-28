<?php
/* Top Header part for perceptron Theme
*/
global $perceptron_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
  if(!empty($perceptron_option['show-top']) || ($rs_top_bar == 'show')){
       if( !empty($perceptron_option['top-email']) || !empty($perceptron_option['phone']) || !empty($perceptron_option['show-social'])){?> 

          <div class="toolbar-area">
            <div class="container2 <?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-lg-8">
                  <div class="toolbar-contact">
                    <ul class="rs-contact-info">                        

                        <?php if(!empty($perceptron_option['top-email'])) { ?>
                        <li class="rs-contact-email">
                            <i class="glyph-icon flaticon-mail"></i>                  
                                  <a href="mailto:<?php echo esc_attr($perceptron_option['top-email'])?>"><?php echo esc_html($perceptron_option['top-email'])?></a>                   
                        </li>
                        <?php } ?>

                        <?php if(!empty($perceptron_option['phone'])) { ?>
                        <li class="rs-contact-phone">
                          <i class="glyph-icon flaticon-phone-call"></i>                                      
                              <a href="tel:+<?php echo esc_attr(str_replace(" ","",($perceptron_option['phone'])))?>"> <?php echo esc_html($perceptron_option['phone']); ?></a>                   
                        </li>
                        <?php } ?> 
                  </ul>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                      <?php
                      if(!empty($perceptron_option['show-social'])){
                        $top_social = $perceptron_option['show-social']; 
                    
                          if($top_social == '1'){ 

                            if(!empty($perceptron_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($perceptron_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($perceptron_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($perceptron_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($perceptron_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($perceptron_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($perceptron_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($perceptron_option['google'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($perceptron_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($perceptron_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($perceptron_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($perceptron_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($perceptron_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                            <?php } ?>
                                    <?php if($rs_show_quote != 'hide'){
                                    if(!empty($perceptron_option['quote'])){?>
                                        <li class="btn_quotes"><a href="<?php echo esc_url($perceptron_option['quote_link']); ?>" class="quote-buttons"><?php  echo esc_html($perceptron_option['quote']); ?></a>
                                        </li>
                                <?php } } ?> 
                            <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>