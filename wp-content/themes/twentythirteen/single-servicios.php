<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<?php get_header(); ?>
<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
?>

	
		<div class="imgservicios">
			<img src="<?php echo $feat_image; ?>">
		</div>		

		<div id="chatmobile" class="col-xs-12">
            <a href='<?php echo site_url(); ?>/chat'><img src="<?php echo site_url(); ?>/wp-content/uploads/2016/07/chatmobile.png"></a>
        </div>
	
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">	
	<?php the_content(); ?>
</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <p id="text7">Otros Servicios</p>
                 <div class="servicios">
                 	<?php
                 	$args = array('category_name'=>'servicios','post_type'=>'servicios','post__not_in'=>array(get_the_ID()),'orderby'=>'date','order'=>'ASC');
                 	$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();		
		$text =  get_post_field('introtext',get_the_ID());
		$img  = get_post_field('imglist',get_the_ID());
		$rutimg = get_site_url().$img;

		?>
		 <div class="contentservicios">
		 	<div class="col-md-4 img col-sm-3 col-xs-3">
            	<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $rutimg; ?>" class="img-responsive image" alt="Imagen responsive" ></a>
            </div>
            <div class="col-md-8 text col-xs-9">
            	<p> <?php echo  $text; ?> </p>
            </div>
            
        </div>
		<?php
		
	}
	
	/* Restore original Post Data */
	wp_reset_postdata();
}

?>

               

 </div>
 </div>

 <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <p id="text7">Productos</p>
                 <div class="productos">
                 	<?php
                 	$args = array('category_name'=>'productos','post_type'=>'productos','post__not_in'=>array(get_the_ID()), 'orderby'=>'date','order'=>'ASC');
                 	$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();		
		$text =  get_field('textominiatura',get_the_ID());
		$img  = get_field('miniatura',get_the_ID());
		$rutimg =$img["url"];

		?>
		 <div class="contentservicios">
		 	<div class="col-md-4 col-sm-3 img col-xs-3">
            	<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $rutimg; ?>" class="img-responsive image" alt="Imagen responsive" ></a>
            </div>
            <div class="col-md-8 col-sm-9  text col-xs-9">
            	<h6 class="titprod"> <?php the_title(); ?> </h6>
            	<p> <?php echo  $text; ?> </p>
            </div>
            
        </div>
		<?php
		
	}
	
	/* Restore original Post Data */
	wp_reset_postdata();
}

?>

               

 </div>
</div>
<div class="col-md-8"></div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
     <p id="text7">Unidades de apoyo</p>
                 <div class="servicios">
                 	<div class="contentservicios">
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
		 
		 	<div class="col-md-4 col-sm-6  col-xs-6 img">
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
 </div> <!--END CONTAINER -->
 <?php 

   
$ncolumnas = get_field("numerocolumnas");
$imagen  = get_field("imagen");
$imagen  = $imagen["url"];
$titulo  = get_field("titulo");
$contenido  = get_field("contenido");
$color     = get_field("fondo");

if ($ncolumnas == 1 ){ ?>
<div class="cuadro11"  style="background-color: <?php echo $color; ?>">
	<div class="container row">
		<img src="<?php echo $imagen; ?>" class="img-responsive image" alt="Imagen responsive" align="left" style="margin-right: 15px;">
		<p id="text4"><?php echo $titulo; ?></p>
		<p id="text13"><?php echo $contenido; ?></p>
	</div>
</div>

<?php
} else {
$imagen2 = get_field("imagen2");
$imagen2 = $imagen2["url"];
$titulo2 = get_field("titulo2");
$contenido2  = get_field("contenido2");


?>

   <div class="cuadro10" style="background-color: <?php echo $color; ?>">
   		<div class="container">
            <section class="main container row">





            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 elfo">
            <img src="<?php echo $imagen; ?>" class="img-responsive image" alt="Imagen responsive"/>
            <p class="text30"><?php echo $titulo; ?><p>
            <p id="text13"><?php echo $contenido; ?> </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 elfo">
                <img src="<?php echo $imagen2; ?>" class="img-responsive image" alt="Imagen responsive" />
                <p class="text30"><?php echo $titulo2; ?></p>
                <p id="text13"> <?php echo $contenido2; ?> </p>
            </div>
                </section>
        </div>

                    </div>

                    <?php  } ?>

<?php 
get_footer(); ?>