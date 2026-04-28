 <!DOCTYPE html>
<html lang="en-US">
<?php
    /*Template Name: Coming Soon
    */
    wp_head();  
    global $perceptron_option;
    $page_bg    = !empty($perceptron_option['coming_bg']) ? 'style="background:url('.$perceptron_option['coming_bg']['url'].')"': '';

    $day_text   = !empty($perceptron_option['coming_day']) ? $perceptron_option['coming_day'] : 'Days';
    $hour_text  = !empty($perceptron_option['coming_min']) ? $perceptron_option['coming_hour'] : 'Minutes';
    $sec_text   = !empty($perceptron_option['coming_sec']) ? $perceptron_option['coming_sec'] : 'Seconds';
    $min_text   = !empty($perceptron_option['coming_hour']) ? $perceptron_option['coming_min'] : 'Hours';

    $text_color  = !empty($perceptron_option['text_color']) ? $perceptron_option['text_color'] : '#ffffff';
  

    $countdown_localize_data = array(
        'day_text'   => $day_text,
        'hour_text'  => $hour_text,
        'sec_text'   => $sec_text,
        'min_text'   => $min_text,
        'text_color'  => $text_color,        
    );
        
    wp_localize_script( 'perceptron-main', 'countdown_data', $countdown_localize_data );
 
?>
<div class="page-error coming-soon" <?php echo wp_kses_post( $page_bg ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <?php   if (!empty( $perceptron_option['coming_logo']['url'] ) ) { ?>
                                <div class="logo">
                                    <img src="<?php echo esc_url( $perceptron_option['coming_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </div>
                            <?php } ?>
                            <h3>
                                <span>                                    
                                    <?php
                                        if(!empty($perceptron_option['coming_title'])){
                                            echo wp_kses_post($perceptron_option['coming_title']);
                                        }
                                        else{
                                            echo esc_html__( 'Coming Soon', 'perceptron' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($perceptron_option['coming_text'])){
                                      echo wp_kses_post($perceptron_option['coming_text']);
                                 }
                                 else{
                                  echo esc_html__( 'Our Exciting Website Is Coming Soon! Check Back Later', 'perceptron' ); }
                                 ?>
                            </h3>
                            <?php 
                                if(!empty($perceptron_option['opt-date-time'])) : 
                                $timeformat =  $perceptron_option['opt-date-time'];
                            ?>
                                <div class="countdown-inner">
                                     <div data-animation-in="slideInLeft" data-animation-out="animate-out fadeOut" class="CountDownTimer" data-date="<?php echo wp_kses_post($timeformat);?>"></div>
                                </div>
                            <?php endif; ?>
                            <div class="follow-us-sbuscribe"> 
                                <div class="follow-us-main">
                                    <?php if (!empty($perceptron_option['fllow_title'])) : ?>
                                        <p class="follow-us">
                                            <?php echo esc_html($perceptron_option['fllow_title']) ?>                                            
                                        </p>        
                                    <?php endif;
                                        if(!empty($perceptron_option['show-social'])){ ?>
                                            <ul class="clearfix">
                                                <?php $top_social = $perceptron_option['show-social'];                                    
                                                    if($top_social == '1'){              
                                                    if(!empty($perceptron_option['facebook'])) { ?>
                                                        <li> <a href="<?php echo esc_url($perceptron_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                <?php }
                                                    if(!empty($perceptron_option['twitter'])) { ?>
                                                     <li> <a href="<?php echo esc_url($perceptron_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                                <?php } 
                                                     if(!empty($perceptron_option['rss'])) { ?>
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
                                                    <?php if(is_active_sidebar('language-widget')){?>                                 
                                                        <?php dynamic_sidebar('language-widget');?>                             
                                                    <?php }?>
                                                <?php } ?>
                                            </ul>
                                        <?php }
                                    ?>
                                </div>                                    
                             
                            </div>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
wp_footer(); ?>
</html>
