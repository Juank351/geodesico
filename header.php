<?php
/**
 * Display Header
 *
 * @package WordPress
 * @subpackage Servicios_Generales_Geodesicos
 * @since Servicios_Generales_Geodesicos 1.0
 */
$themeUrl = esc_url(get_template_directory_uri());
$siteUrl = esc_url( home_url( '/' ) ); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Servicios Geodesicos Generales S.A.C</title>
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <!-- Bootstrap -->
    <link href="<?php echo $themeUrl ?>/images/favicon.png" rel=apple-touch-icon> <link href="<?php echo $themeUrl ?>/images/favicon.ico" rel=icon>
    <link href="<?php echo $themeUrl ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $themeUrl ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $themeUrl ?>/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $themeUrl ?>/plugins/owl-carousel/assets/owl.theme.default.css">
   <link rel="stylesheet" href="<?php echo $themeUrl ?>/style.css">
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $themeUrl ?>/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $themeUrl ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $themeUrl ?>/plugins/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: false,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
    </script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="page">
      <div class="container">
        <header>
          <div id="top-bar">
            <div href="#" class="social-icon text-right">
              <a class="icon border-round facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a class="icon border-round twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
          </div>
          <nav id="nav-menu" class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="logo pull-left" href="<?php echo $siteUrl; ?>">
                  <img src="<?php echo $themeUrl; ?>/images/logo-sgg.png">
                </a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="menu">

                <ul id="top-menu" class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
                  <li><a href="interior.html">Nosotros</a></li>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Clientes</a></li>
                  <li><a href="#">Contactenos</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
      </header>