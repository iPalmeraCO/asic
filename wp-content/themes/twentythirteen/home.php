<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * Template Name: Home
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
?>

<?php echo do_shortcode("[metaslider id=176]"); ?>
	<div  class="container">
		
						<?php //the_content(); ?>
						
	 <center>
	 	<?php
	 	$tit1 =  get_field('titulo1',get_the_ID());
		$tit2  = get_field('titulo2',get_the_ID());
		?>

           <p id="text2"><?php echo $tit1; ?></p></center>    
            
            
            <div class="row servicioshome">
                    <div class="col-md-12"> <p id="text3">Servicios</p> </div>
                    <div class="col-md-6 col-xs-12 serviciohome">
                        <a href="servicios/la-nube/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio1.png" class="img-responsive image" alt="Imagen responsive"/></a>
                    </div>
                     <div class="col-md-6 col-xs-12 serviciohome">
                        <a href="servicios/sts/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio2.png" class="img-responsive image" alt="Imagen responsive" /></a>
                    </div>
                     <div class="col-md-4 col-xs-12 serviciohome">
                        <a href="servicios/sertic/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio3.png" class="img-responsive image" alt="Imagen responsive"/></a>
                    </div>
                      <div class="col-md-4 col-xs-12 serviciohome">
                        <a href="servicios/optim/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio4.png" class="img-responsive image" alt="Imagen responsive"/></a>
                    </div>
                      <div class="col-md-4 col-xs-12 serviciohome">
                        <a href="servicios/open/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio5.png" class="img-responsive image" alt="Imagen responsive" /></a>
                    </div>
                    
                    
                    
             </div>
        </div>
        
            <div class="row cuadro12">
                <div class="container">
                    <div class="col-md-12">
                         <p id="text42"><?php echo $tit2; ?></p>            
                        <h4 id="text4">Productos</h4>
                    </div>
                    <section class="main row">
                        
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 producol">
                                    <div class="col-md-12">
                                        <p id="text5">Punto de venta</p>
                                        <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto1.png" class="img-responsive image" alt="Imagen responsive"/>
                                    </div>
                                    <div class="col-md-12">
                                        <p id="text5">Soluciones de auto servicio</p>
                                        <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto3.png" class="img-responsive image" alt="Imagen responsive" />
                                     </div>           
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 producol">
                                    <div class="col-md-12">
                                        <p id="text5">Continuidad de negocio</p>
                                        <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto2.png" class="img-responsive image" alt="Imagen responsive" />
                                    </div>

                                    <div class="col-md-12 prod2">
                                        <p id="text5">Licenciamiento</p>
                                        <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto4.png" class="img-responsive image" alt="Imagen responsive"/>
                                    </div>
                                    <div class="col-md-12 prod2">
                                        <p id="text5">Infraestructura</p>
                                        <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto5.png" class="img-responsive image" alt="Imagen responsive" />
                                    </div>
                                </div>                        
                        
                </section>
            </div>
		</div> 
            <div  class="container">
                
                    <div class="col-md-12 blogs">

                        <div class="row">
                            <div class="col-md-12">
                                <p id="text3">Blog</p>
                            </div>
                    

                </div>
<?php 
    $args = array('orderby'=>'date','order'=>'DESC','posts_per_page' => '2',);
                    $the_query = new WP_Query( $args ); 
                    if ( $the_query->have_posts() ) {

                        while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        ?>
                            
                              <div class="row blogshome">
                                     <div class="col-md-2 image">
                                         <?php echo get_the_post_thumbnail( $_post->ID, 'thumbnail' ); ?>
                                    </div>
                                    <div class="col-md-10 titleblog">
                                        <a href="<?php echo get_permalink(); ?>"><h3 class="titbloghome"><?php echo the_title(); ?></h3></a>
                                         <?php echo print_excerpt(500);?>

                                         <a  class="verblogs" href="<?php echo get_permalink();?>">Ver más</a>
                                    </div>                                  
                                </div>
                    <?php   endwhile;

                    } else {

                        echo "No se encontaron articulos";
                    }
 ?>
    </div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>