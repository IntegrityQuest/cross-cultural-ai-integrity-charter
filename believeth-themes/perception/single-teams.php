<?php
get_header();
global $perceptron_option;?>

<!-- Main content Start -->
<div class="main-content">  
  <!-- Team Detail Start -->  
    <div class="rs-porfolio-detail">
        <div class="container">
            <div id="content">
                <?php while ( have_posts() ) : the_post();
                //take metafield value           
              
                $phone           = get_post_meta(  get_the_ID(), 'phone', true );
                $email           = get_post_meta(  get_the_ID(), 'email', true );
                $website         = get_post_meta(  get_the_ID(), 'website', true );
                $facebook        = get_post_meta( get_the_ID(), 'facebook', true );
                $twitter         = get_post_meta( get_the_ID(), 'twitter', true );
                $google_plus     = get_post_meta( get_the_ID(), 'google_plus', true );
                $linkedin        = get_post_meta( get_the_ID(), 'linkedin', true );
                $team_desination = get_post_meta( get_the_ID(), 'team_desination', true );  
                $short_desc = get_post_meta( get_the_ID(), 'description', true );                      
                ?>
                <div class="row btm-row">
                    <div class="col-lg-4">
                        <div class="inner-images">
                            <div class="ps-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="ps-informations">
                                
                                <h4 class="single-title"><?php esc_html_e( 'Quick Contact','perceptron' );?></h4>
                                <ul class="personal-info">

                                  <?php if($email):?>
                                      <li class="email">                                        
                                        <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php  echo esc_html( $email ); ?></a>
                                      </li>
                                  <?php endif;?>

                                  <?php if($phone):?>
                                    <li class="phone">
                                      <?php echo esc_html( $phone ); ?>
                                </li>
                              <?php endif; ?>

                            </ul>

                            <ul class="social-info">
                                   <?php if($facebook):?>
                                <li class="social-icon">
                                  <a href="<?php  echo esc_url( $facebook ); ?>" target="_blank"> 
                                    <i class="fa fa-facebook"></i>
                                  </a>
                                </li>
                              <?php endif;?>
                              <?php if($twitter):?>
                                <li class="social-icon">
                                  <a href="<?php  echo esc_url( $twitter ); ?>" target="_blank"> 
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                  </a>
                                </li>
                              <?php endif;?>
                              <?php if($google_plus):?>
                                <li class="social-icon">
                                  <a href="<?php  echo esc_url( $google_plus ); ?>" target="_blank">
                                    <i class="fa fa-google-plus"></i>
                                  </a>
                                </li>
                              <?php endif; ?>
                              <?php if($linkedin):?>
                              <li class="social-icon"><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"> <i class="fa fa-linkedin"></i></a></li>
                              <?php endif; ?>
                              </ul>
                       
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 pl-left-50">
                        <div class="designation-info">
                            <?php echo esc_html($team_desination); ?>
                        </div>
                        <h3 class="title-bg-gray"><?php the_title(); ?></h3> 
                       
                        <?php if(!empty($short_desc)): ?>
                            <div class="short-desc">
                                <?php echo wp_kses_post($short_desc); ?>
                            </div>
                        <?php endif; ?>

                        <?php $team_member_skill = get_post_meta( get_the_ID(), 'member_skill', true );

                        if(!empty($team_member_skill)){
                        ?>
                            <h3 class="title-bg-gray padding-top"><?php esc_html_e( 'Professional Skills','perceptron' );?></h3> 
                            <div class="team-skill"> 
                                <div class="row">       
                                    <?php foreach ( $team_member_skill as $value ) { ?>
                                      <div class="col-md-6">
                                          <div class="progress rs-progress">
                                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo wp_kses_post($value['skill_level']); ?>">

                                                  <span class="pb-label"><?php echo wp_kses_post($value['skill_title']); ?></span>
                                                  <span class="pb-percent"><?php echo wp_kses_post($value['skill_level']); ?></span>

                                              </div>
                                          </div>
                                      </div>
                                    <?php } ?>         
                                </div>
                            </div>
                        <?php } ?>
                         
                        <div class="project-desc"> 
                                    
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
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'perceptron' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div> 
                    </div>       
                </div>
                <?php endwhile; ?>
            </div>    
        </div>
    </div>
</div>
<!-- Single Team End -->
<?php
get_footer();