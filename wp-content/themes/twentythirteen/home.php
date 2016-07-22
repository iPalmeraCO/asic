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
            
            <center>
            <div class="cuadro1">
            <p id="text3">Servicios</p><br><br><br>
                    <a href="servicios-nube.html"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio1.png" class="img-responsive image" alt="Imagen responsive" align="left"/></a>
                    <a href="servicios-sts.html"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio2.png" class="img-responsive image" alt="Imagen responsive" align="right"/><br></a>
                    <a href="servicios-sertic.html"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio3.png" class="img-responsive image" alt="Imagen responsive" align="left" style="margin-top:10px;"/></a><center>
                    <a href="servicios-optim.html"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio4.png" class="img-responsive image" alt="Imagen responsive" align="left" style="margin-top:10px;"/></a></center>
                    <a href="servicios-open.html"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio5.png" class="img-responsive image" alt="Imagen responsive" /></a>
                </div>
        </center><br>
            <div class="cuadro12">
            <center><p id="text4"><?php echo $tit2; ?></p></center>
                <h4 id="text4">Productos</h4><center>
                <section class="main row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <p id="text5">Punto de venta</p>
                <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto1.png" class="img-responsive image" alt="Imagen responsive"/>
                <p id="text5">Soluciones de auto servicio</p>
            <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto3.png" class="img-responsive image" alt="Imagen responsive" />
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p id="text5">Continuidad de negocio</p>
                <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto2.png" class="img-responsive image" alt="Imagen responsive" />
                <p id="text5">Licenciamiento</p>
                <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto4.png" class="img-responsive image" alt="Imagen responsive"/>
                <p id="text5">Infraestructura</p>
                <img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/producto5.png" class="img-responsive image" alt="Imagen responsive" />
            </div></div></section></center>

		</div><!-- #content -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>