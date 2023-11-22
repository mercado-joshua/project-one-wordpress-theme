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

        <div class="overlay"></div><!-- // .overlay -->
      </nav><!-- // .navbar-section -->
    </div><!-- // .news-blog-section -->
  </div><!-- // .news-blog-wrapper -->


<?php get_footer(); ?>