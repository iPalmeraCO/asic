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

        <div id="chatmobile" class="col-xs-12">
            <a href='<?php echo site_url(); ?>/chat'><img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/chatmobile.png"></a>
        </div>
		
						<?php //the_content(); ?>
						
	 <center>
	 	<?php
	 	$tit1 =  get_field('titulo1',get_the_ID());
		$tit2  = get_field('titulo2',get_the_ID());
		?>

           <p id="text2"><?php echo $tit1; ?></p></center>    
            
            
            <div class="row servicioshome">
                    <div class="col-md-12"> <p id="text3">Servicios</p> </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 serviciohome">
                        <a href="servicios/la-nube/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio1.png" class="img-responsive image" alt="Imagen responsive"/></a>
                    </div>
                     <div class="col-md-6  col-sm-6 col-xs-12 serviciohome">
                        <a href="servicios/sts/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio2.png" class="img-responsive image" alt="Imagen responsive" /></a>
                    </div>
                     <div class="col-md-4  col-sm-6 col-xs-12 serviciohome">
                        <a href="servicios/sertic/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio3.png" class="img-responsive image" alt="Imagen responsive"/></a>
                    </div>
                      <div class="col-md-4  col-sm-6 col-xs-12 serviciohome">
                        <a href="servicios/optim/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio4.png" class="img-responsive image" alt="Imagen responsive"/></a>
                    </div>
                      <div class="col-md-4 col-sm-6 col-xs-12 serviciohome">
                        <a href="servicios/open/"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2016/07/servicio5.png" class="img-responsive image" alt="Imagen responsive" /></a>
                    </div>
                    
                    
                    
             </div>
        </div>
        
            <div class="row cuadro12 pr">
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
                                     <div class="col-md-3  col-sm-3 image">
                                         <?php echo get_the_post_thumbnail( $_post->ID, 'thumbnail' ); ?>
                                    </div>
                                    <div class="col-md-9 col-sm-9 titleblog">
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

<!-- Version móvil -->
<div id="mobilehome">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                
                 <div class="servicios">
                    <?php
                    $args = array('category_name'=>'servicios','post_type'=>'servicios','post__not_in'=>array(get_the_ID()),'orderby'=>'date','order'=>'ASC');
                    $the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    $cont=1;
    $class="";
    while ( $the_query->have_posts() ) {
        if ($cont==1){
            $class="col-xs-12";
            $cont=2;
        }else {
            $class="col-xs-6";            
        }
        $the_query->the_post();     
        $text =  get_post_field('introtext',get_the_ID());
        $img  = get_post_field('imglist',get_the_ID());
        $rutimg = get_site_url().$img;

        ?>
         
            <div class="<?php echo $class;?> img serhome">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $rutimg; ?>" class="img-responsive image" alt="Imagen responsive" ></a>
            </div>
           
            
        
        <?php
        
    }
    
    /* Restore original Post Data */
    wp_reset_postdata();
}

?>

               

 </div>

       
                 <div class="servicios">
                    <div class="contentservicios col-xs-12">
                        <p class="titmov">Unidades de apoyo</p>
                    <?php
                    $args = array('category_name'=>'unidadesdeapoyo','post_type'=>'unidadesdeapoyo','orderby'=>'date','order'=>'ASC');
                    $the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    
    while ( $the_query->have_posts() ) {
        $the_query->the_post();     
        $text =  get_field('textominiatura',get_the_ID());
        $img  = get_field('miniatura',get_the_ID());
        $rutimg =$img["url"];

        ?>
         
            <div class="col-xs-6">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $rutimg; ?>" class="img-responsive image" alt="Imagen responsive" ></a>
            </div>
            
            
       
        
    <?php } ?>
     </div>
        <?php
    
    /* Restore original Post Data */
    wp_reset_postdata();
}

?>

               

 </div>

 </div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="cuadro12">
                    <p id="text42">Creamos una fórmula de visión de negocio exclusiva para cada empresa</p>
                </div>
                <p class="titmov">Productos</p>
                 <div class="productos">
                    <?php
                    $args = array('category_name'=>'productos','post_type'=>'productos','post__not_in'=>array(get_the_ID()), 'orderby'=>'date','order'=>'ASC');
                    $the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    $cont=0;
    while ( $the_query->have_posts() ) {
        $cont= $cont+1;        
        $the_query->the_post();     
        $text =  get_field('textominiatura',get_the_ID());
        $img  = get_field('miniatura',get_the_ID());
        $rutimg =$img["url"];
        if ($cont==5){
            $classpro="col-xs-12 cien";
        } else {
            $classpro="col-xs-6";
        }
        ?>
         
           
            <div class="<?php echo $classpro; ?> text proho">

                <h6 class="titprod tipmo "> <?php the_title(); ?> </h6>
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $rutimg; ?>" class="img-responsive image" alt="Imagen responsive" ></a>
                
            </div>
            
        
        <?php
        
    }
    
    /* Restore original Post Data */
    wp_reset_postdata();
}

?>

               

 </div>
 </div>
</div>
 <!--End movil -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>