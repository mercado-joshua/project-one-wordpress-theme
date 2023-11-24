<?php 
/**
 * @package projectone
 */

get_header(); 
?>
  <!-- Add your site or application content here -->
  <div class="news-blog-wrapper container-fluid vh-100 py-5">
    <div class="news-blog-section container">
      <nav class="navbar-section d-flex justify-content-between align-items-center">
        <div class="logobox">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>" alt="img-fluid">
        </div><!-- // .logobox -->

        <button class="menu-btn btn d-lg-none">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-menu.svg'; ?>" alt="">
        </button><!-- // .menu-btn -->

        <?php
          if ( has_nav_menu( 'header' ) ) {
            wp_nav_menu( array(
              'menu' => 'header',
              'theme_location' => 'header',
              'container' => '',
              'items_wrap' => '<ul class="navbar">%3$s</ul>'
            ) );
          }
        ?><!-- // .navbar -->

        <div class="overlay d-lg-none"></div><!-- // .overlay -->
      </nav><!-- // .navbar-section -->

      <div class="hero-section py-4 d-flex flex-column gap-5 py-lg-5">
        <div class="herobox d-flex flex-column gap-3">
          <div class="imagebox">
            <picture>
              <?php
                if ( get_theme_mod( 'hero-image-desktop' ) ) { 
              ?>
                <source srcset="<?php echo esc_url( get_theme_mod( 'hero-image-desktop' ) ); ?>"  media="( min-width: 992px )">
              <?php
                }
              ?>

              <?php
                if ( get_theme_mod( 'hero-image-mobile' ) ) { 
              ?>
                <source srcset="<?php echo esc_url( get_theme_mod( 'hero-image-mobile' ) ); ?>">
              <?php
                }
              ?>

              <?php
                if ( get_theme_mod( 'hero-image-mobile' ) ) { 
              ?>
                <img class="img-fluid" src="<?php echo esc_url( get_theme_mod( 'hero-image-mobile' ) ); ?>" alt="">
              <?php
                }
              ?>
            </picture>
          </div>

          <div class="contentbox">
            <h2 class="title">
              <?php
                if ( get_theme_mod( 'hero-title' ) ) { echo get_theme_mod( 'hero-title' ); }
              ?>
            </h2>

            <div class="descriptionbox">
              <p class="description">
                <?php
                  if ( get_theme_mod( 'hero-textarea' ) ) { echo get_theme_mod( 'hero-textarea' ); }
                ?>
              </p>

              <a class="link" href="<?php if ( get_theme_mod( 'hero-textarea' ) ) { echo esc_url( get_theme_mod( 'hero-url' ) ); } ?>">
                <button class="readmore-btn btn">Read more</button>
              </a>
            </div>
          </div>
        </div><!-- // herobox -->

        <div class="newsbox p-4">
          <h2 class="title mb-2">New</h2>
          
          <div class="news d-flex flex-column gap-3">
            <?php
              $date = array(
                'after' => '-30 days',
                'column' => 'post_date'
              );

              $args = array(
                'post_type' => 'post',
                'order' => 'DESC',
                'posts_per_page' => 3,
                'date_query' => $date
              );

              $loop = new Wp_Query( $args );

              if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) {
                  $loop->the_post();
            ?>
              <div class="news-card pb-1" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <a href="<?php echo esc_url( get_permalink() ); ?>" class="link">
                    <h2 class="title text-white my-3"><?php echo get_the_title(); ?></h2>
                  </a>

                  <p class="description text-white opacity-75">
                    <?php echo strip_tags( get_the_content() ); ?>
                  </p>
              </div><!-- // .news-card -->
            <?php
                }
              }

              else {
                echo wpautop( 'Sorry, no posts where found.' );
              }

              wp_reset_query();
              wp_reset_postdata();
            ?>

          </div><!-- // .news -->
        </div><!-- // .newsbox -->
      </div><!-- // .hero-section -->

      <div class="news-section d-flex flex-column gap-3 pb-5">
        <?php
          $args = array(
            'post_type' => 'news-post-type',
            'order' => 'ASC',
            'posts_per_page' => 3
          );

          $posts = new Wp_Query( $args );

          if ( $posts->have_posts() ) {
            while ( $posts->have_posts() ) {
              $posts->the_post();
        ?>
          <div class="post-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="imagebox">
              <?php
                if ( has_post_thumbnail() ) {
              ?> 
                <img class="img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $posts->ID ) ); ?>" alt="">
              <?php
                }
              ?>
            </div>

            <div class="contentbox">
              <span class="counter"></span>

              <a href="<?php echo esc_url( get_permalink() ); ?>" class="link">
                <h2 class="title my-2"><?php echo get_the_title(); ?></h2>
              </a>
              
              <p class="description opacity-75">
                <?php echo strip_tags( get_the_content() ); ?>
              </p>
            </div>
          </div><!-- // .post-card -->
        <?php
            }
          }

          else {
            echo wpautop( 'Sorry, no posts where found.' );
          }
        ?>
      </div><!-- // .news-section -->
    </div><!-- // .news-blog-section -->
  </div><!-- // .news-blog-wrapper -->


<?php get_footer(); ?>