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

        <button class="menu-btn btn">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-menu.svg'; ?>" alt="">
        </button><!-- // .menu-btn -->

        <!-- <ul class="navbar">
        </ul>// .navbar -->
      </nav><!-- // .navbar-section -->
    </div><!-- // .news-blog-section -->
  </div><!-- // .news-blog-wrapper -->


<?php get_footer(); ?>