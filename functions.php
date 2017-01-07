<?php
/* Funciones para el sitio web */

/**
 * Entradas de tipo diapositiva para la portada
 */
// 
add_action( 'init', 'loadMetaBoxes', 9999 );
function loadMetaBoxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta/init.php' );
    }
} 

add_theme_support( 'post-thumbnails' ); 

function sliderPostType() {
	$labels = array(
		'name'                => _x( 'Diapositivas', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Diapositiva', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Diapositivas', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'Todos las Diapositivas', 'text_domain' ),
		'view_item'           => __( 'Ver Diapositiva', 'text_domain' ),
		'add_new_item'        => __( 'Agregar nueva Diapositiva', 'text_domain' ),
		'add_new'             => __( 'Añadir nueva', 'text_domain' ),
		'edit_item'           => __( 'Editar Diapositiva', 'text_domain' ),
		'update_item'         => __( 'Actualizar Diapositiva', 'text_domain' ),
		'search_items'        => __( 'Buscar Diapositivas', 'text_domain' ),
		'not_found'           => __( 'No se encontro', 'text_domain' ),
		'not_found_in_trash'  => __( 'No se encuentra en la Papelera', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'slides', 'text_domain' ),
		'description'         => __( 'Agregar una diapositiva a su horario.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-format-image',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );
}

// Hook into the 'init' action
add_action( 'init', 'sliderPostType', 0 );

function sliderMetaBoxes( $meta_boxes ) {
    $prefix = 'slider_'; // Prefix for all fields
    $list =  array(
        1 => 'Imagen y texto',
        2 => 'Solo imagen'
    );
    $meta_boxes['slider_metabox'] = array(
        'id' => 'slider_metabox',
        'title' => 'Opciones de publicación',
        'pages' => array('slider'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
				
			array(
    			'name' => 'Texto Superior',
    			'desc' => 'Linea superior sobre el título.',
    			'id' => $prefix . 'textSuperior',
    			'type' => 'text'
				),
				
			array(
    			'name' => 'Texto Inferior',
                'desc' => 'El titulo o palabra a resaltar.',
    			'id' => $prefix . 'textInferior',
    			'type' => 'text'
				),
				
			array(
   				'name' => __( 'Enlace a vincular', 'cmb' ),
    			'desc' => 'Ingresar la url para el vinculo.',
    			'id'   => $prefix . 'url',
    			'type' => 'text_url',
    			'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
				),
            /* array(
   				'name' => __( 'URL Video', 'cmb' ),
    			'desc' => 'Colocar la URL del video de youtube',
    			'id'   => $prefix . 'slider_video',
    			'type' => 'text' // Array of allowed protocols
				), */
            array(
                'name' => 'Tipo de banner',
                'id' => $prefix . 'banner',
                'type' => 'select',
                'options' => $list,
                'placeholder' => 'Seleccionar'
                )
        ),
    );

    return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'sliderMetaBoxes' );

function getMetaBox($metabox){
    global $post;
    $meta = get_post_meta( $post->ID, $metabox, true );
    return $meta;
}

/**
 * Entrada de tipo Servicios, para los servicios de la empresa
 */

// Hook into the 'init' action
add_action( 'init', 'servicesPostType', 0 );

function servicesPostType() {

    $labels = array(
        'name'                => _x( 'Servicios', 'Tipo de publicación general', 'text_domain' ),
        'singular_name'       => _x( 'Servicio', 'Tipo de publicación', 'text_domain' ),
        'menu_name'           => __( 'Lista de servicios', 'text_domain' ),
        'parent_item_colon'   => __( 'Articulo principal', 'text_domain' ),
        'all_items'           => __( 'Todos los servicios', 'text_domain' ),
        'view_item'           => __( 'Ver servicios', 'text_domain' ),
        'add_new_item'        => __( 'Añadir nuevo servicio', 'text_domain' ),
        'add_new'             => __( 'Añadir nuevo', 'text_domain' ),
        'edit_item'           => __( 'Editar servicio', 'text_domain' ),
        'update_item'         => __( 'Actualizar servicio', 'text_domain' ),
        'search_items'        => __( 'Buscar servicios', 'text_domain' ),
        'not_found'           => __( 'No encontrado', 'text_domain' ),
        'not_found_in_trash'  => __( 'No se encuentra en la papelera', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Servicios', 'text_domain' ),
        'description'         => __( 'Agregar lista de servicios.', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array('title','editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'menu_icon'           => 'dashicons-nametag',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'services', $args );
}

/*
 * Función para imprimir la ruta de la imagen destacada.
 * Ejemplo de utilización: echo atrib_imagen_destacada();
 */
function getImgPost($size = 'thumbnail') {
    global $post;
    $thumbID = get_post_thumbnail_id( $post->ID );
    $imgDestacada = wp_get_attachment_image_src( $thumbID, $size ); // Sustituir por thumbnail, medium, large o full
    return $imgDestacada[0]; // 0 = ruta, 1 = altura, 2 = anchura, 3 = boolean
}

/*
*Funcion widgets para editar en pie de pagina de la direccion.
*Ejemplo de utilizacion: 
*/
function registrarWidget () {

    register_sidebar( array(
        'name'          => 'Footer derecha',
        'id'            => 'footer_derecha',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="rounded">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Titulo principal',
        'id'            => 'titulo_principal',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h1 class="rounded">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => 'Parrafo principal',
        'id'            => 'parrafo_principal',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h1 class="rounded">',
        'after_title'   => '</h1>',
    ) );

}
add_action( 'widgets_init', 'registrarWidget' );
?>


