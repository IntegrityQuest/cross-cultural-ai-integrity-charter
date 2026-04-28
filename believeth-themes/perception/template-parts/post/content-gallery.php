<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if ( is_sticky() && is_home() ) {
		echo perceptron_get_svg( array( 'icon' => 'thumb-tack' ) );
	}
?>
<div class="single-content-full">
    <div class="bs-desc">
    <?php
        the_content( sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'perceptron' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ) );

        wp_link_pages( array(
          'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'perceptron' ),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>',
        ) );
      ?>
    </div>
     <?php 
        if(has_tag()){ ?>
        <div class="bs-info single-page-info tags">
        <?php
          //tag add
          $seperator = ''; // blank instead of comma
          $after = '';
          echo esc_html__( 'Tags: ', 'perceptron' );
          the_tags( '', $seperator, $after );
        ?>             
         </div> 
       <?php } ?> 
</div>
</article><!-- #post-## -->
