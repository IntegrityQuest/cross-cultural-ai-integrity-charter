<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
    <header class="entry-header">
        <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
    </header>
    <!-- .entry-header -->
    
    <div class="entry-summary">
        <p>   <?php echo perceptron_custom_excerpt(50);?>   </p>
        <div class="blog-button">
            <a href="<?php the_permalink()?>"><?php echo esc_html__('Read More','perceptron');?></a>
        </div>
    </div>
    <!-- .entry-summary -->
    
   
    <!-- .entry-footer --> 
</article>
