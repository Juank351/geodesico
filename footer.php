<?php
/**
 * Display Footer
 *
 * @package WordPress
 * @subpackage Servicios_Generales_Geodesicos
 * @since Servicios_Generales_Geodesicos 1.0
 */
?>
<footer>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
            <?php if ( is_active_sidebar( 'footer_derecha' ) ) : ?>
            <div class="widget-footer-derecha" role="complementary">
            <?php dynamic_sidebar( 'footer_derecha' ); ?>
            </div><!-- #primary-sidebar -->
            <?php endif; ?>
              </div>
            <div class="col-md-6 text-right">
                <div href="#" class="social-icon text-right">

                  <a class="icon border-round" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a class="icon border-round" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
               <p>Copyright © Todos los Derechos Reservados.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
