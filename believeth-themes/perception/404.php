
 <!DOCTYPE html>
<html lang="en-US">
<?php
wp_head();  
global $perceptron_option;
$error_bg = !empty($perceptron_option['error_bg']) ? 'style="background:url('.$perceptron_option['error_bg']['url'].')"': '';
?>

<div class="page-error <?php if($perceptron_option){
    echo 'not-found-bg';
}?>" <?php echo wp_kses_post( $error_bg ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <h3>
                                <span>                                    
                                    <?php
                                        if(!empty($perceptron_option['title_404'])){
                                            echo wp_kses_post($perceptron_option['title_404']);
                                        }
                                        else{
                                            echo esc_html__( '404', 'perceptron' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($perceptron_option['text_404'])){
                                      echo wp_kses_post($perceptron_option['text_404']);
                                 }
                                 else{
                                  echo esc_html__( 'Page Not Found', 'perceptron' ); }
                                 ?>
                            </h3>
                            <a href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php
                                 if(!empty($perceptron_option['back_home'])){
                                     echo esc_html($perceptron_option['back_home']);
                                 }
                                 else{
                                     esc_html_e('OR BACK TO HOMEPAGE', 'perceptron'); 
                                  }
                                ?>
                            </a>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
wp_footer();?>
</html>
