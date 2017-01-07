<?php get_header(); ?>
      <section id="content">
        <div id="slider-top">

        <?php 
            $temp = $wp_query; 
            $wp_query = null; 
            $wp_query = new WP_Query(); 
            $wp_query->query('post_type=slider&posts_per_page=3');
            $count = 0;
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators 
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol> -->
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post();  
                    $count++;
                    $textoSuperior= get_post_meta($post->ID, 'slider_textSuperior', $single = true); 
                    $textoInferior = get_post_meta($post->ID, 'slider_textInferior', $single = true); 
                   
            ?>
            <div class="item <?php echo ($count==1) ? 'active' : ' ' ; ?>">
              <?php the_post_thumbnail(''); ?>
              <!-- <img src="images/slider01.png" alt="..."> -->
              <div class="carousel-caption">
                <?php 
                if ($textoSuperior != ('') && $textoSuperior != ('') ){ 
                    echo '<p>'. stripslashes($textoSuperior) . '</p>';
                    echo '<h1>'. stripslashes($textoInferior) . '</h1>'; 
                }
                ?>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div> 

      <?php $wp_query = null; $wp_query = $temp;  // Reset ?>


      </div>
      <div class="text-home"><h1>Servicios Geodesicos Generales S.A.C</h1></div>
      <div class="welcome">
        <div class="row">
          <div class="col-md-6 col-sm-5">
            <div class="section-title">Bienvenidos</div>
            <div class="parrafo">
              <p>SERVICIOS GEODESICO GENERALES S.A.C es una Empresa de Ingeniería en el área de geofísica, geología, geodesia y computación. Desde sus inicios ha estado otorgando asistencia técnica y servicios en el área de prospección minera y en obras de Ingeniería Civil a las más diversas empresas privadas y estatales.</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-7">
            <div class="divisor-lateral">
            <div class="section-title">Noticias</div>
            <div class="notes">
              <div class="item">
                <h4 class="title"><a href="#">Trabajo en Apurmac-Cuzco</a></h4>
                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias..</p>
                <div class="date pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> 15 Abril, 2016</div>
                <div class="more pull-right"><a class="btn btn-primary" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Ver más</a></div>
              </div>
              <div class="item">
                <h4 class="title"><a href="#">Trabajo en Apurmac-Cuzco</a></h4>
                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias..</p>
                <div class="date pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> 15 Abril, 2016</div>
                <div class="more pull-right"><a class="btn btn-primary" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Ver más</a></div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="services">
        <div class="section-title">Servicios</div>
        <div class="galery">
        <div class="row">
          <div class="col-md-12">
              <div class="owl-carousel owl-theme">
              <?php 
                  $temp = $wp_query; 
                  $wp_query = null; 
                  $wp_query = new WP_Query(); 
                  $wp_query->query('post_type=services&posts_per_page=8');
                  $count = 0;
              ?>
              <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="item">
                  <a class="grayscale" href="<?php the_permalink (); ?>">
                    <img src="<?php the_post_thumbnail_url(); ?>">
                  </a>
                </div>
                <?php endwhile; ?>
                <?php $wp_query = null; $wp_query = $temp;  // Reset ?>
              </div>
          </div>
        </div>
      </div>
      </div>
      </section>
    </div>
<?php get_footer(); ?>
   