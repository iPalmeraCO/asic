<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Tu blog
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
<div class="container">
	<div class="col-md-8 blogs">
<?php 
 	$args = array('orderby'=>'date','order'=>'DESC');
                 	$the_query = new WP_Query( $args ); 
                 	if ( $the_query->have_posts() ) {

                 		while ( $the_query->have_posts() ) : $the_query->the_post(); 
						?>
							
							  <div class="col-md-12 blogcontainer">
							  		<div class="col-md-12 dateblog">
							  			<?php echo get_the_date(); ?>
							  		</div>
           							<div class="col-md-12 titleblog">
										<a href="<?php echo get_permalink(); ?>"><h2 class="titconta"><?php echo the_title(); ?></h2></a>
           							</div>
           							<div class="col-md-12 titleblog">
										<?php echo the_content(); ?>
           							</div>
           							<div class="col-md-12 autor">
           								<p>Publicado por : <?php  echo get_the_author();  echo " ".get_the_time(); ?> </p>
										
           							</div>


           						</div>
					<?php	endwhile;

					} else {

                 		echo "No se encontaron articulos";
                 	}
 ?>
 	</div>
 	<div class="col-md-4 listadopost">
 		<h3 class="titconta"> ARCHIVOS DE BLOG </h3>
 		<?php
    $args=array(
     'tag'   		   		=> 'tag1',
     'posts_per_page' 		=> -1,
     'post_status' 		        => 'publish',
     'orderby' 			=> 'date',
     'order' 				=> 'DESC',
     'caller_get_posts'	        =>1
    );

    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      $ymdate = '';
       while ($my_query->have_posts()) : $my_query->the_post();
         $ympost = mysql2date("M Y", $post->post_date);
         if ( $ympost != $ymdate) {
           $ymdate = $ympost;
           echo '<h2>Artigos do mes: ' . $ymdate . '</h2>';
         }
         ?>
        <p>
			<small><?php the_time('F jS, Y') ?></small>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="link para < ?php the_title_attribute(); ?>">< ?php the_title(); ?></a>
		</p>
       <?php 
		endwhile; 
		} wp_reset_query();  
?>
	
	<?php
	$args=array(
	  'cat'     		     => '',
	  'posts_per_page'     => -1,
	  'post_status' 	     => 'publish',
	  'orderby' 		     => 'date',
	  'order' 	             => 'ASC',
	  'caller_get_posts'    =>1
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
	  $ymdate = '';
	   while ($my_query->have_posts()) : $my_query->the_post();
		 $ympost = mysql2date("F Y", $post->post_date);
		 if ( $ympost != $ymdate) {
		   $ymdate = $ympost;
		   echo '<br /><h1>'.$ymdate.'</h1>';
		   echo '<ul>';
		 }?>
<div id="faq">
  <dl>
    <dt><a href="<?php echo the_permalink(); ?> "><?php the_title(); ?></a></dt>
    <dd>
      <ul>
        <li><?php //the_content(); ?></li>
      </ul>
    </dd>
  </dl>
</div>            
	   <?php
	 endwhile;
	  echo '</ul>';
	} wp_reset_query(); 
?>

 	</div>

</div>

	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<!--<h1 class="entry-title"><?php// the_title(); ?></h1>-->
					</header><!-- .entry-header -->

					<!--<div class="entry-content">-->
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					<!--</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>