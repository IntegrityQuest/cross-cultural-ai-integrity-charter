<?php 

global $perceptron_option;
$preloader_img = "";

if(!empty($perceptron_option['show_preloader']))
  {
    $loading = $perceptron_option['show_preloader'];
    if(!empty($perceptron_option['preloader_img'])){
      $preloader_img = $perceptron_option['preloader_img'];
    }
    if($loading == 1){
      if(empty($preloader_img['url'])):
      ?>  
      <!-- Preloader area start here -->
      <div id="perceptron-load">
          <div class="perceptron-loader"></div>
      </div>
      <!--End preloader here -->
        
      <?php else: ?>
            <div id="perceptron-load">
                <img src="<?php echo esc_url($preloader_img['url']);?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            </div>
      <?php endif; ?>
  <?php }
}?>

<?php if(!empty($perceptron_option['off_sticky'])):   
    $sticky = $perceptron_option['off_sticky'];         
    if($sticky == 1):
     $sticky_menu ='menu-sticky';        
    endif;
   else:
   $sticky_menu ='';
endif;

if( is_page() ){
 $post_meta_header = get_post_meta($post->ID, 'trans_header', true);  

     if($post_meta_header == 'Default Header'){       
        $header_style = 'default_header';             
     }
     else{
        $header_style = 'transparent_header';
    }
 }
 else{
    $header_style = 'transparent_header';
 }

 ?>   