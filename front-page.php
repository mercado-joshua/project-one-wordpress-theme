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

    <div class="hero-section py-4">
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
          <!-- <h2 class="title">The Bright Future of Web 3.0?</h2> -->

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

      <div class="newsbox">

      </div><!-- // .newsbox -->
    </div><!-- // .hero-section -->
    </div><!-- // .news-blog-section -->
  </div><!-- // .news-blog-wrapper -->


<?php get_footer(); ?>