<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Flint\Compass
 * @since 0.9
 */
?><!DOCTYPE html>
<!--[if lt IE 9]><html <?php language_attributes(); ?> class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php steel_head(); ?>
<?php wp_head(); ?>
</head>

<?php $sparks_options = get_option('sparks_options'); ?>
<body <?php body_class(); ?>>
<?php if (isset($sparks_options['fb_app_id'])) {
    $fb_app_id = $sparks_options["fb_app_id"];
  }
  else {
    $fb_app_id = '';
  } ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $fb_app_id; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="hfeed site container">
  <?php do_action( 'before' ); ?>
  <header id="masthead" class="site-header" role="banner">

    <?php if (current_theme_supports('custom-header')) { ?>


        <hgroup class="row">

          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <?php $header_image = get_header_image();
    if ( ! empty( $header_image ) ) { ?>
            <img class="header col-lg-2 visible-lg-block" src="<?php header_image(); ?>" alt="" />
        <?php } // if ( ! empty( $header_image ) ) ?>
            </a>

        <?php if (display_header_text()) { ?>
          <div class="bastard-title col-lg-10">
                <h1 class="site-title hidden-sm"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" ><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description visible-lg-block"><?php bloginfo( 'description' ); ?></h2>
            </div>
        <?php } ?>

        </hgroup>

    <?php } else { ?>

        <hgroup>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
            </a>
          <div class="bastard-title">
                <h1 class="site-title hidden-sm"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" ><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description visible-lg-block"><?php bloginfo( 'description' ); ?></h2>
            </div>
    </hgroup>

     <?php } ?>

  <nav role="navigation" class="navbar">
            <h1 class="assistive-text"><?php _e( 'Menu', 'flint' ); ?></h1>
            <div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'flint' ); ?>"><?php _e( 'Skip to content', 'flint' ); ?></a></div>
            <div class="navbar-inner">
              <div class="container">

                  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <!-- Be sure to leave the brand out there if you want it shown -->
              <a class="brand hidden-desktop" href="#"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>

                    <div class="nav-collapse collapse">
      <?php wp_nav_menu( array( 'menu_class' => 'nav', 'container' => false, 'theme_location' => 'primary', 'walker' => new Flint_Bootstrap_Menu ) ); ?>
                        <form method="get" class="navbar-search dropdown-menu-right visible-lg-block" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                            <input type="text" class="search-query" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search">
                        </form>
                    </div><!-- .nav-collapse -->
                </div><!-- .container -->
            </div><!-- .navbar-inner -->
        </nav><!-- .navbar -->
  </header><!-- #masthead .site-header -->

  <div id="main" class="site-main row">
