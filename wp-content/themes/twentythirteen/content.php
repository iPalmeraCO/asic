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
?>

<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
if (get_post_type( get_the_ID() ) == 'servicios' ){?>
<div class="container">
	<div class="row">	
		<div class="imgservicios">
			<?php the_post_thumbnail(); ?>
		</div>		
	</div>
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">	
	<?php the_content(); ?>
</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p id="text7">Otros Servicios</p>
                 <div class="servicios">
                 	<?php
                 	$args = array('category_name'=>'servicios','post_type'=>'servicios','post__not_in'=>array(get_the_ID()));
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
		 	<div class="col-md-4 img">
            	<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $rutimg; ?>" class="img-responsive image" alt="Imagen responsive" ></a>
            </div>
            <div class="col-md-8 text">
            	<h6> <?php echo  $text; ?> </h6>
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
 <?php 

   
$ncolumnas = get_field("numerocolumnas");
$imagen  = get_field("imagen");
$imagen  = $imagen["url"];
$titulo  = get_field("titulo");
$contenido  = get_field("contenido");
$color     = get_field("fondo");

if ($ncolumnas == 1 ){ ?>
<div class="cuadro11"  style="background-color: <?php echo $color; ?>">
<img src="<?php echo $imagen; ?>" class="img-responsive image" alt="Imagen responsive" align="left" style="margin-right: 15px;">
<p id="text4"><?php echo $titulo; ?></p>
<p id="text13"><?php echo $contenido; ?></p>
</div>

<?php
} else {
$imagen2 = get_field("imagen2");
$imagen2 = $imagen2["url"];
$titulo2 = get_field("titulo2");
$contenido2  = get_field("contenido2");


?>

   <div class="cuadro10" style="background-color: <?php echo $color; ?>">
            <section class="main row">





            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <img src="<?php echo $imagen; ?>" class="img-responsive image" alt="Imagen responsive"/>
            <p id="text4"><?php echo $titulo; ?><p>
            <p id="text13"><?php echo $contenido; ?> </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <img src="<?php echo $imagen2; ?>" class="img-responsive image" alt="Imagen responsive" />
                <p class="text30"><?php echo $titulo2; ?></p>
                <p id="text13"> <?php echo $contenido2; ?> </p>
            </div>
                </section>
                    </div>

                    <?php  } ?>
</div> <!--END CONTAINER -->
<?php 
} else {
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php twentythirteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
<?php } ?>